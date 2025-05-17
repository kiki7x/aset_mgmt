<?php

namespace App\Livewire\Modal;

use Livewire\Component;
use App\Models\AssetsModel;
use App\Livewire\Forms\AsetForm;
use Livewire\Attributes\On;

class CreateAsetRt extends Component
{
    public AsetForm $form;

    public $prefix = "rt";
    public $classification = "3";

    // bawa relasi
    public $classifications;
    public $categories;
    public $admins;
    public $clients;
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
        $this->categories = \App\Models\AssetcategoriesModel::where('classification_id', 3)->get();
        $this->users = \App\Models\User::get();
        $this->manufacturers = \App\Models\ManufacturersModel::get();
        $this->models = \App\Models\ModelsModel::get();
        $this->suppliers = \App\Models\SuppliersModel::get();
        $this->locations = \App\Models\LocationsModel::get();
        $this->statuses = \App\Models\LabelsModel::get();
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
        $ceksupplier = \App\Models\SuppliersModel::find($this->form->supplier);
        if(!$ceksupplier) {
            $newsupplier = \App\Models\SuppliersModel::create([
                'name' => $this->form->supplier
        ]);
            // Gunakan ID supplier baru
            $this->form->supplier = "$newsupplier->id";
        }

        // Cek kondisi inputan manufacturer baru
        $cekmanufacturer = \App\Models\ManufacturersModel::find($this->form->manufacturer);
        if (!$cekmanufacturer) {
            $newmanufacturer = \App\Models\ManufacturersModel::create([
                'name' => $this->form->manufacturer
        ]);
            // Gunakan ID manufacturer baru
            $this->form->manufacturer = $newmanufacturer->id;
        }

        // Cek kondisi inputan model/tipe baru
        $cekmodel = \App\Models\ModelsModel::find($this->form->model);
        if (!$cekmodel) {
            $newmodel = \App\Models\ModelsModel::create([
                'name' => $this->form->model,
            ]);
            // Gunakan ID model baru
            $this->form->model = $newmodel->id;
        }


        // himpun data input dan cocokkan ke database
        $data = [
                'classification_id' => $this->form->classification,
                'category_id' => $this->form->category,
                'admin_id' => $this->form->adminaset,
                'client_id' => $this->form->clientaset,
                'user_id' => $this->form->useraset,
                'manufacturer_id' => $this->form->manufacturer,
                'model_id' => $this->form->model,
                'supplier_id' => $this->form->supplier,
                'status_id' => $this->form->status,
                'purchase_date' => $this->form->purchase_date,
                'warranty_months' => $this->form->warranty_months,
                'tag' => $this->form->tag,
                'name' => $this->form->name,
                'serial' => $this->form->serial,
                'notes' => $this->form->notes,
                'location_id' => $this->form->location,
                'customfields' => $this->form->customfields,
                'qrvalue' => $this->form->qrvalue,
        ];
        AssetsModel::Create($data);
        // tutup modal
        $this->dispatch('hideModalCreate');
        // Kirim alert toastr
        $this->dispatchToastr('success','Data berhasil disimpan');
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

    public function render()
    {
        return view('livewire.modal.create-aset-rt');
    }

    public function incrementTag() {
        $lastTag = AssetsModel::where('tag', 'like', $this->prefix . '-%')
                        ->orderBy('tag', 'desc')
                        ->first();
      
        if ($lastTag) {
          $lastSequenceNumber = (int) explode('-', $lastTag->tag)[1];
          return $lastSequenceNumber + 1;
        } else {
          return 1; // Jika belum ada data, mulai dari 1
        }
      }
}
