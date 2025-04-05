<?php

namespace App\Livewire\Assets;

use Livewire\Component;
use App\Models\LabelsModel;
use App\Livewire\Forms\LabelForm;
use Illuminate\Validation\Rule;

class EditLabel extends Component
{
    public LabelForm $form;

    public $id;
    public ?LabelsModel $asset;
    public $assetID;
    public $section;
    public $currentSection;


    public function mount($id, $section)
    {
        // Looping selection
        $this->classifications = \App\Models\LabelsModel::select('id', 'name')->get();
        $this->categories = \App\Models\LabelsModel::select('id', 'name')->get();
        $this->users = \App\Models\User::select('id', 'name')->get();

        // Load existing data
        $this->currentSection = $section;
        $asset = $this->asset = LabelsModel::findOrFail($id);
        $this->form->assetID = $asset->id;

        $this->form->name = $asset->name;
        $this->form->color = $asset->color;

    }

    public function update()
    {
        // Gather input data and match it to the database
        $this->asset->update([
            'name' => $this->form->name,
            'color' => $this->form->color,
        ]);
    
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Data berhasil diperbarui!',
        ]);
        // Redirect to the route
        return redirect()->route('admin.setting_attr.label');
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
        return view('livewire.assets.edit-aset-label');
    }
}
