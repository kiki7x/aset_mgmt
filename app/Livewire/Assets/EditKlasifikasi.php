<?php

namespace App\Livewire\Assets;

use Livewire\Component;
use App\Models\AssetClassificationsModel;
use App\Livewire\Forms\KlasifikasiForm;
use Illuminate\Validation\Rule;

class EditKlasifikasi extends Component
{
    public KlasifikasiForm $form;

    public $id;
    public ?AssetclassificationsModel $asset;
    public $assetID;
    public $section;
    public $currentSection;


    public function mount($id, $section)
    {
        // Looping selection
        $this->classifications = \App\Models\AssetClassificationsModel::select('id', 'name')->get();
        $this->categories = \App\Models\AssetClassificationsModel::select('id', 'name')->get();
        $this->users = \App\Models\User::select('id', 'name')->get();

        // Load existing data
        $this->currentSection = $section;
        $asset = $this->asset = AssetClassificationsModel::findOrFail($id);
        $this->form->assetID = $asset->id;
        $this->form->classification = $asset->classification_id;
        $this->form->category = $asset->category_id;
        $this->form->admin = $asset->admin_id;
        $this->form->client = $asset->client_id;
        $this->form->user = $asset->user_id;
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
        $this->form->custom_fields = $asset->custom_fields;
        $this->form->qr_value = $asset->qr_value;
    }

    public function update()
    {
        // himpun data input dan cocokkan ke database
        $data = [
                'name' => $this->form->name,
        ];
        // AssetsModel::Update($data);
        $this->asset->update($data);
        // Kirim alert toastr
        if (!session()->has('toastr_shown')) {
            $this->dispatchToastr('success', 'Data berhasil diperbarui');
            session()->put('toastr_shown', true);
        }
        // redirect to route
        return redirect()->route('admin.setting_attr.klasifikasi');
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
        return view('livewire.assets.edit-aset-klasifikasi');
    }
}
