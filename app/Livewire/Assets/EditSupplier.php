<?php

namespace App\Livewire\Assets;

use Livewire\Component;
use App\Models\SuppliersModel;
use App\Livewire\Forms\SupplierForm;
use Illuminate\Validation\Rule;

class EditSupplier extends Component
{
    public SupplierForm $form;

    public ?SuppliersModel $asset = null;
    public $assetID;
    public $currentSection;

    public $classifications = [];
    public $categories = [];
    public $users = [];

    public function mount($id, $section)
    {
        // Ambil data dropdown
        $this->classifications = SuppliersModel::select('id', 'name')->get();
        $this->categories = SuppliersModel::select('id', 'name')->get();
        $this->users = \App\Models\User::select('id', 'name')->get();

        // Ambil data utama
        $this->currentSection = $section;
        $this->asset = SuppliersModel::findOrFail($id);
        $this->assetID = $this->asset->id;

        // Isi form
        $this->form->name = $this->asset->name;
        $this->form->address = $this->asset->address;
        $this->form->contactname = $this->asset->contactname;
        $this->form->phone = $this->asset->phone;
        $this->form->email = $this->asset->email;
        $this->form->notes = $this->asset->notes;
    }

    public function update()
    {
        // dd($this->form);
        $this->validate();

        $this->asset->update([
            'name' => $this->form->name,
            'address' => $this->form->address,
            'contactname' => $this->form->contactname,
            'phone' => $this->form->phone,
            'email' => $this->form->email,
            'notes' => $this->form->notes,
        ]);

        $this->dispatchToastr('success', 'Data berhasil diperbarui');
        return redirect()->route('admin.setting_attr.supplier');
    }

    public function dispatchToastr(string $type, string $message)
    {
        $this->dispatch('alert', [
            'type' => $type,
            'message' => $message,
        ]);
    }

    public function resetInput()
    {
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.assets.edit-aset-supplier');
    }
}
