<?php

namespace App\Livewire\Assets;

use Livewire\Component;
use App\Models\LocationsModel;
use App\Livewire\Forms\LokasiForm;
use Illuminate\Validation\Rule;

class EditLokasi extends Component
{
    public LokasiForm $form;

    public $id;
    public ?LocationsModel $asset;
    public $assetID;
    public $section;
    public $currentSection;


    public function mount($id, $section)
    {
        // Looping selection
        $this->classifications = \App\Models\LocationsModel::select('id', 'name')->get();
        $this->categories = \App\Models\LocationsModel::select('id', 'name')->get();
        $this->users = \App\Models\User::select('id', 'name')->get();

        // Load existing data
        $this->currentSection = $section;
        $asset = $this->asset = LocationsModel::findOrFail($id);
        $this->form->assetID = $asset->id;
        $this->form->name = $asset->name;
        $this->form->client_id = $asset->client_id;
    }

    public function update()
    {
        // himpun data input dan cocokkan ke database
        $this->asset->update([
            'name' => $this->form->name,
            'client_id' => $this->form->client_id,
        ]);
    
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Data berhasil diperbarui!',
        ]);
        // redirect to route
        return redirect()->route('admin.setting_attr.lokasi');
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
        return view('livewire.assets.edit-aset-lokasi');
    }
}
