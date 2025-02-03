<?php

namespace App\Livewire\Assets;

use Livewire\Component;
use App\Models\AssetsModel;


class ShowAsetTik extends Component
{
    public $id;
    public $section;
    public $currentSection = "";

    public $asset;
    public $assetID;
    public $classification;
    public $category;
    public $adminaset;
    public $clientaset;
    public $useraset;
    public $manufacturer;
    public $model;
    public $supplier;
    public $status;
    public $purchase_date;
    public $warranty_months;
    public $tag;
    public $name;
    public $serial;
    public $notes;
    public $location;
    public $customfields;
    public $qrvalue;

    #[On('switchSection')]
    public function switchSection($section)
    {
        $this->section = $section;
        $this->currentSection = $section;
    }

    public function mount($id, $section = '')
    {
        $this->currentSection = $section;

        $asset = $this->asset = AssetsModel::findOrFail($id);
        $this->assetID = $asset->id;
        $this->classification = $asset->classification;
        $this->category = $asset->category;
        $this->adminaset = $asset->admin;
        $this->clientaset = $asset->client;
        $this->useraset = $asset->user;
        $this->manufacturer = $asset->manufacturer;
        $this->model = $asset->model;
        $this->supplier = $asset->supplier;
        $this->status = $asset->status;
        $this->purchase_date = $asset->purchase_date;
        $this->warranty_months = $asset->warranty_months;
        $this->tag = $asset->tag;
        $this->name = $asset->name;
        $this->serial = $asset->serial;
        $this->notes = $asset->notes;
        $this->location = $asset->location;
        $this->customfields = $asset->customfields;
        $this->qrvalue = $asset->qrvalue;
    }

    public function render()
    {
        return view('livewire.assets.show-aset-tik');
    }
}
