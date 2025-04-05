<?php

namespace App\Livewire\Assets;

use Livewire\Component;
use App\Models\AssetclassificationsModel;


class ShowKlasifikasi extends Component
{
    public $id;
    public $section;
    public $currentSection = "";

    public $name;

    #[On('switchSection')]
    public function switchSection($section)
    {
        $this->section = $section;
        $this->currentSection = $section;
    }

    public function mount($id, $section = '')
    {
        $this->currentSection = $section;

        $asset = AssetclassificationsModel::findOrFail($id);
        $this->name = $asset->name ?? 'Unknown';
    }

    public function render()
    {
        $asset = AssetclassificationsModel::find($this->id);

        return view('livewire.assets.show-aset-klasifikasi', [
            // other variables
            'asset' => $asset,
        ]);
    }
}
