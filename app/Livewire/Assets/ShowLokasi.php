<?php

namespace App\Livewire\Assets;

use App\Models\LocationsModel;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowLokasi extends Component
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

        $this->asset = LocationsModel::findOrFail($id);
        $this->name = $this->asset->name ?? 'Unknown';
        $this->client_id = $this->asset->client_id ?? 'Unknown';
    }

    public function render()
    {
        return view('livewire.assets.show-aset-lokasi');
    }
}

