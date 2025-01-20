<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AssetsModel;

class EditAsetTik extends Component
{
    public $asset;
    public $assetId;
    // public $showModalEdit = false;

    protected $listeners = ['edit' => 'loadAset'];

    public function loadAset($id)
    {
        $this->asset = AssetsModel::findOrFail($id);
        $this->assetId = $id;
        // $this->showModalEdit = true; // Tampilkan modal
        $this->dispatch('showModalEdit');
    }

    // #[On('closeModalEdit')] 
    public function closeModalEdit()
    {
        // $this->dispatchToastr('success','Data berhasil dihapus');
        $this->dispatch('closeModalEdit');
    }

    public function updateAsset()
    {
        // Validasi data
        $this->validate([
            'asset.name' => 'required|string',
            'asset.serial' => 'required|string',
        ]);

        // Update data
        $this->asset->save();

        // Tutup modal
        $this->showModalEdit = false;

        // Emit event ke IndexAset untuk menyegarkan data
        $this->dispatch('refreshAssets');
    }

    public function render()
    {
        return view('livewire.edit-aset-tik');
    }

}
