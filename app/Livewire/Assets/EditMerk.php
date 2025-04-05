<?php

namespace App\Livewire\Assets;

use Livewire\Component;
use App\Models\ManufacturersModel;
use App\Livewire\Forms\MerkForm;
use Illuminate\Validation\Rule;

class EditMerk extends Component
{
    public MerkForm $form;

    public $id;
    public ?ManufacturersModel $asset;
    public $assetID;
    public $section;
    public $currentSection;


    public function mount($id, $section)
    {
        // Looping selection
        $this->classifications = \App\Models\ManufacturersModel::select('id', 'name')->get();
        $this->categories = \App\Models\ManufacturersModel::select('id', 'name')->get();
        $this->users = \App\Models\User::select('id', 'name')->get();

        // Load existing data
        $this->currentSection = $section;
        $asset = $this->asset = ManufacturersModel::findOrFail($id);
        $this->form->assetID = $asset->id;
        $this->form->name = $asset->name;
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
        return redirect()->route('admin.setting_attr.merk');
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
        return view('livewire.assets.edit-aset-merk');
    }
}
