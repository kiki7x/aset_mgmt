<?php

namespace App\Livewire\Assets;

use App\Models\AssetcategoriesModel;
use App\Models\AssetclassificationsModel;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowKategori extends Component
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

        $this->asset = AssetcategoriesModel::with('classification')->findOrFail($id);
        $this->name = $this->asset->name ?? 'Unknown';
    }

    public function render()
    {
        return view('livewire.assets.show-aset-kategori');
    }
}

