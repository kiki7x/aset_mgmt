<?php

namespace App\Livewire\Assets;

use App\Models\SuppliersModel;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowSupplier extends Component
{
    public $id;
    public $section;
    public $currentSection = "";

    public $name;
    public $asset;


    #[On('switchSection')]
    public function switchSection($section)
    {
        $this->section = $section;
        $this->currentSection = $section;
    }

    public function mount($id, $section = '')
    {
        $this->id = $id;
        $this->currentSection = $section;

        $this->asset = SuppliersModel::findOrFail($id);
        $this->name = $this->asset->name ?? 'Unknown';
        $this->address = $this->asset->address ?? 'Unknown';
        $this->contactname = $this->asset->contactname ?? 'Unknown';
        $this->phone = $this->asset->phone ?? 'Unknown';
        $this->email = $this->asset->email ?? 'Unknown';
        $this->notes = $this->asset->notes ?? 'Unknown';
    }

    public function render()
    {
        return view('livewire.assets.show-aset-supplier');
    }
}

