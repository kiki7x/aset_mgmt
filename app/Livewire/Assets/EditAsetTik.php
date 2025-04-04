<?php

namespace App\Livewire\Assets;

use Livewire\Component;
use App\Models\AssetsModel;
use App\Livewire\Forms\AsetForm;
use Illuminate\Validation\Rule;

class EditAsetTik extends Component
{
    public AsetForm $form;

    public $id;
    public ?AssetsModel $asset;
    public $assetID;
    public $section;
    public $currentSection;

    // bawa relasi
    public $classifications;
    public $categories;
    // public $admins;
    public $clients;
    public $users;
    public $manufacturers;
    public $models;
    public $suppliers;
    public $statuses;
    public $locations;

    public function mount($id, $section)
    {
        // looping seleksi
        $this->classifications = \App\Models\AssetclassificationsModel::get();
        $this->categories = \App\Models\AssetcategoriesModel::where('classification_id', 1)->get();
        $this->users = \App\Models\User::get();
        $this->manufacturers = \App\Models\ManufacturersModel::get();
        $this->models = \App\Models\ModelsModel::get();
        $this->suppliers = \App\Models\SuppliersModel::get();
        $this->locations = \App\Models\LocationsModel::get();
        $this->statuses = \App\Models\LabelsModel::get();

        // bawa data eksisting
        $this->currentSection = $section;
        $asset = $this->asset = AssetsModel::findOrFail($id);
        $this->form->assetID = $asset->id;
        $this->form->classification = $asset->classification_id;
        $this->form->category = $asset->category_id;
        $this->form->adminaset = $asset->admin_id;
        $this->form->clientaset = $asset->client_id;
        $this->form->useraset = $asset->user_id;
        $this->form->manufacturer = $asset->manufacturer_id;
        $this->form->model = $asset->model_id;
        $this->form->supplier = $asset->supplier_id;
        $this->form->status = $asset->status_id;
        $this->form->purchase_date = $asset->purchase_date;
        $this->form->warranty_months = $asset->warranty_months;
        $this->form->tag = $asset->tag;
        $this->form->name = $asset->name;
        $this->form->serial = $asset->serial;
        $this->form->notes = $asset->notes;
        $this->form->location = $asset->location_id;
        $this->form->customfields = $asset->customfields;
        $this->form->qrvalue = $asset->qrvalue;
    }

    public function update()
    {
        // validasi input
        $this->form->validate([
            'tag' => [
                'required',
                Rule::unique('assets', 'id')->ignore($this->assetID)
            ],
            'serial' => [
                'required',
                Rule::unique('assets', 'id')->ignore($this->assetID)
            ],
        ]);

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
        // AssetsModel::Update($data);
        $this->asset->update($data);
        // Kirim alert toastr
        $this->dispatchToastr('success','Data berhasil diupdate');
        // reset form
        // $this->resetInput();
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
        return view('livewire.assets.edit-aset-tik');
    }
}
