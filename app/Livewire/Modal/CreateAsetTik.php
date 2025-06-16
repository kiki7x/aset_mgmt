<?php

namespace App\Livewire\Modal;

use Livewire\Component;
use App\Models\AssetsModel;
use App\Livewire\Forms\AsetForm;
use App\Models\User;
use App\Notifications\CreateAsetTik as NotificationsCreateAsetTik;
use Carbon\Carbon;
use Livewire\Attributes\On;


class CreateAsetTik extends Component
{
    public AsetForm $form;

    // isian default prefill
    public $prefix = "tik";
    public $classification = "2";

    // bawa relasi
    public $categories;
    public $admins;
    public $users;
    public $manufacturers;
    public $models;
    public $suppliers;
    public $statuses;
    public $locations;

    public function mount()
    {
        // ambil user_id dari session auth
        $this->form->adminaset = auth()->user()->id;

        // looping seleksi
        $this->categories = \App\Models\AssetcategoriesModel::where('classification_id', 2)->get();
        $this->users = \App\Models\User::get();
        $this->manufacturers = \App\Models\ManufacturersModel::get();
        $this->models = \App\Models\ModelsModel::get();
        $this->suppliers = \App\Models\SuppliersModel::get();
        $this->locations = \App\Models\LocationsModel::get();
        $this->statuses = \App\Models\LabelsModel::get();
    }

    public function render()
    {
        return view('livewire.modal.create-aset-tik');
    }

    public function store()
    {
        // dd($this->form->adminaset);
        // Cek kondisi inputan classification baru kemudian increment
        $cektag = $this->incrementTag();
        $tagBaru = $this->prefix . '-' . $cektag;
        $this->form->tag = $tagBaru;

        // validasi input
        $this->form->validate();

        // cek kondisi inputan supplier baru
        $ceksupplier = \App\Models\SuppliersModel::firstOrNew(["id" => (int) $this->form->supplier], ["name" => $this->form->supplier]);
        $this->form->supplier = $ceksupplier->id;
        // if (!$ceksupplier) {
        //     $newsupplier = \App\Models\SuppliersModel::create([
        //         'name' => $this->form->supplier
        //     ]);
        //     // Gunakan ID supplier baru
        // }

        // Cek kondisi inputan manufacturer baru
        $cekmanufacturer = \App\Models\ManufacturersModel::firstOrNew(["id" => (int) $this->form->manufacturer], ["name" => $this->form->manufacturer]);
        $this->form->manufacturer = $cekmanufacturer->id;
        // if (!$cekmanufacturer) {
        //     $newmanufacturer = \App\Models\ManufacturersModel::create([
        //         'name' => $this->form->manufacturer
        //     ]);
        //     // Gunakan ID manufacturer baru
        // }

        // Cek kondisi inputan model/tipe baru
        $cekmodel = \App\Models\ModelsModel::firstOrNew(["id" => (int) $this->form->model], ["name" => $this->form->model]);
        $this->form->model = $cekmodel->id;
        // if (!$cekmodel) {
        //     $newmodel = \App\Models\ModelsModel::create([
        //         'name' => $this->form->model,
        //     ]);
        //     // Gunakan ID model baru
        // }

        // himpun data input dan cocokkan ke database
        $data = [
            'classification_id' => (int) $this->classification,
            'category_id' => (int) $this->form->category,
            'admin_id' => (int) $this->form->adminaset,
            'client_id' => (int) $this->form->clientaset,
            'user_id' => (int) $this->form->useraset,
            'manufacturer_id' => (int) $this->form->manufacturer,
            'model_id' => (int) $this->form->model,
            'supplier_id' => (int) $this->form->supplier,
            'status_id' => (int) $this->form->status,
            'purchase_date' => Carbon::parse($this->form->purchase_date)->format('Y-m-d'),
            'warranty_months' => (int) $this->form->warranty_months,
            'tag' => $tagBaru,
            'name' => $this->form->name,
            'serial' => $this->form->serial,
            'notes' => $this->form->notes,
            'location_id' => (int) $this->form->location,
            'customfields' => $this->form->customfields,
            'qrvalue' => $this->form->qrvalue,
        ];

        dd($this->form->name, $data);


        $aset = AssetsModel::Create($data);
        // kirim notifikasi
        $users = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['superadmin', 'admin_tik', 'staf_tik']);
        })->get();

        foreach ($users as $user) {
            $user->notify(new NotificationsCreateAsetTik($aset));
        }
        // tutup modal
        $this->dispatch('hideModalCreate');
        // Kirim alert toastr
        $this->dispatchToastr('success', 'Data berhasil disimpan');
        // reset form
        $this->resetInput();
        // refresh index
        $this->dispatch('refresh');
    }

    #[On('openModalCreate')]
    public function openModalCreate()
    {
        $this->dispatch('showModalCreate');
    }

    #[On('closeModalCreate')]
    public function closeModalCreate()
    {
        $this->dispatch('hideModalCreate');
    }

    public function dispatchToastr(string $type, string $message)
    {
        $this->dispatch('alert', [
            'type' => $type,
            'message' => $message,
        ]);
    }

    public function updateDate($purchase_date)
    {
        $this->form->purchase_date = $purchase_date;
    }

    public function resetInput()
    {
        $this->form->reset();
    }

    public function incrementTag()
    {
        $lastTag = AssetsModel::where('tag', 'like', $this->prefix . '-%')
            ->orderByRaw("CAST(SUBSTRING_INDEX(tag, '-', -1) AS UNSIGNED) DESC")
            ->first();

        if ($lastTag) {
            $lastSequenceNumber = (int) str_replace($this->prefix . '-', '', $lastTag->tag);
            return $lastSequenceNumber + 1;
        } else {
            return 1; // Jika belum ada data, mulai dari 1
        }
    }
}
