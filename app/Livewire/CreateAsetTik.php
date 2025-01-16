<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AssetsModel;
use Livewire\Attributes\On; 


class CreateAsetTik extends Component
{
    // variabel bawa relasi model
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

    // variabel bawa data
    public $classification = "1";
    public $category;
    public $adminaset;
    public $clientaset = "1";
    public $useraset;
    public $manufacturer;
    public $model;
    public $supplier;
    public $status;
    public $purchase_date;
    public $warranty_months;
    public $tag;
    public $name;
    public $serial;
    public $notes;
    public $location;
    public $customfields;
    public $qrvalue;

    // public $action;
    // protected $listeners = ['eventAction'];

    protected $rules = [
        'classification' => 'required',
        'category' => 'required',
        'adminaset' => 'required',
        'clientaset' => 'required',
        'useraset'=> 'required',
        'manufacturer' => 'required',
        'model' => 'required',
        'supplier' => 'required',
        'status' => 'required',
        'purchase_date' => 'required|date',
        'warranty_months' => 'required',
        'tag' => 'required',
        'name' => 'required',
        'serial' => 'required',
        'notes' => 'nullable',
        'location' => 'required',
        'customfields' => 'nullable',
        'qrvalue' => 'nullable',
    ];
    protected $messages = [
        'classification.required' => 'Klasifikasi tidak boleh kosong',
        'category.required' => 'Kategori tidak boleh kosong',
        'adminaset.required' => 'Admin tidak boleh kosong',
        'clientaset.required' => 'Client tidak boleh kosong',
        'useraset.required' => 'User tidak boleh kosong',
        'manufacturer.required' => 'Merk tidak boleh kosong',
        'model.required' => 'Model tidak boleh kosong',
        'supplier.required' => 'Supplier tidak boleh kosong',
        'status.required' => 'Status tidak boleh kosong',
        'purchase_date.required' => 'Tanggal Perolehan tidak boleh kosong',
        'warranty_months.required' => 'Waktu Garansi tidak boleh kosong',
        'tag.required' => 'Tag tidak boleh kosong',
        'name.required' => 'Nama tidak boleh kosong',
        'serial.required' => 'Serial Number tidak boleh kosong',
        'location.required' => 'Lokasi tidak boleh kosong',
    ];


    public function resetFields()
    {
        $this->classification = "null";
        $this->category = "null";
        $this->adminaset = "null";
        $this->clientaset = "null";
        $this->useraset = "null";
        $this->manufacturer = "null";
        $this->model = "null";
        $this->supplier = "null";
        $this->status = "null";
        $this->purchase_date = "null";
        $this->warranty_months = "null";
        $this->tag = "null";
        $this->name = "null";
        $this->serial = "null";
        $this->notes = "null";
        $this->location = "null";
        $this->customfields = "null";
        $this->qrvalue = "null";
    }

    public function updateDate($purchase_date)
    {
        $this->purchase_date = $purchase_date;
    }



    public function mount()
    {
        $this->classifications = \App\Models\AssetclassificationsModel::all();
        $this->categories = \App\Models\AssetcategoriesModel::all();
        $this->users = \App\Models\User::all();
        $this->manufacturers = \App\Models\ManufacturersModel::all();
        $this->models = \App\Models\ModelsModel::all();
        $this->suppliers = \App\Models\SuppliersModel::all();
        $this->locations = \App\Models\LocationsModel::all();
        $this->statuses = \App\Models\LabelsModel::all();
        $this->locations = \App\Models\LocationsModel::all();
    }

    public function render()
    {
        return view('livewire.create-aset-tik',[
            // 'classifications' => \App\Models\AssetclassificationsModel::all(),
            // 'categories' => \App\Models\AssetcategoriesModel::all(),
            // 'admins' => \App\Models\User::all(),
            // 'clients' => \App\Models\ClientsModel::all(),
            // 'users' => \App\Models\User::all(),
            // 'manufacturers' => \App\Models\ManufacturersModel::all(),
            // 'models' => \App\Models\ModelsModel::all(),
            // 'suppliers' => \App\Models\SuppliersModel::all(),
            // 'statuses' => \App\Models\LabelsModel::all(), 
            // 'locations' => \App\Models\LocationsModel::all(),
        ]);
    }

    public function store()
    {
        
        // cek kondisi inputan supplier baru
        $ceksupplier = \App\Models\SuppliersModel::find($this->supplier);
        if(!$ceksupplier) {
            $ceksupplier = \App\Models\SuppliersModel::create(['name' => $this->supplier]);
            $this->supplier = "$ceksupplier->id";
        }

        // validasi input
        $this->validate($this->rules);

        // himpun data input dan cocokkan ke database
        $data = [
                'classification_id' => $this->classification,
                'category_id' => $this->category,
                'admin_id' => $this->adminaset,
                'client_id' => $this->clientaset,
                'user_id' => $this->useraset,
                'manufacturer_id' => $this->manufacturer,
                'model_id' => $this->model,
                'supplier_id' => $this->supplier,
                'status_id' => $this->status,
                'purchase_date' => $this->purchase_date,
                'warranty_months' => $this->warranty_months,
                'tag' => $this->tag,
                'name' => $this->name,
                'serial' => $this->serial,
                'notes' => $this->notes,
                'location_id' => $this->location,
                'customfields' => $this->customfields,
                'qrvalue' => $this->qrvalue,
        ];
        // dd($data);
        AssetsModel::Create($data);
        // Kirim alert toastr
        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Data berhasil disimpan',
        ]);

        return redirect()->route('admin.asettik');
    }
}
