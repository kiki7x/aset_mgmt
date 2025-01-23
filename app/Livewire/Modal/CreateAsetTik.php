<?php

namespace App\Livewire\Modal;

use Livewire\Component;
use App\Models\AssetsModel;
use App\Livewire\Forms\CreateAsetTikForm;

class CreateAsetTik extends Component
{
    // bawa relasi
    public $form_classifications;
    public $form_categories;
    public $form_admins;
    public $form_clients;
    public $form_users;
    public $form_manufacturers;
    public $form_models;
    public $form_suppliers;
    public $form_statuses;
    public $form_locations;

    public CreateAsetTikForm $form;

    public function mount()
    {
        $this->form_classifications = \App\Models\AssetclassificationsModel::all();
        $this->form_categories = \App\Models\AssetcategoriesModel::all();
        $this->form_users = \App\Models\User::all();
        $this->form_manufacturers = \App\Models\ManufacturersModel::all();
        $this->form_models = \App\Models\ModelsModel::all();
        $this->form_suppliers = \App\Models\SuppliersModel::all();
        $this->form_locations = \App\Models\LocationsModel::all();
        $this->form_statuses = \App\Models\LabelsModel::all();
        $this->form_locations = \App\Models\LocationsModel::all();

    }

    public function updateDate($purchase_date)
    {
        $this->form->purchase_date = $purchase_date;
    }

    public function resetInput()
    {
        $this->form_category = "";
        $this->form_adminaset = "";
        $this->form_useraset = "";
        $this->form_manufacturer = "";
        $this->form_model = "";
        $this->form_supplier = "";
        $this->form_status = "";
        $this->form_purchase_date = "";
        $this->form_warranty_months = "";
        $this->form_tag = "";
        $this->form_name = "";
        $this->form_serial = "";
        $this->form_notes = "";
        $this->form_location = "";
        $this->form_customfields = "";
        $this->form_qrvalue = "";
    }

    public function store()
    {
        $this->reset();
        dd('null');
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
        // dd($data);
        AssetsModel::Create($data);
        // tutup modal
        $this->dispatch('hideModalCreate');
        // Kirim alert toastr
        $this->dispatchToastr('success','Data berhasil disimpan');
        // refresh index
        $this->dispatch('refresh');
    }

    public function dispatchToastr(string $type, string $message)
    {
        $this->dispatch('alert', [
            'type' => $type,
            'message' => $message,
        ]);
    }

    public function render()
    {
        return view('livewire.modal.create-aset-tik');
    }
}
