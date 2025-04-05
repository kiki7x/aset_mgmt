<?php

namespace App\Livewire\Forms;

use App\Models\LocationsModel;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LokasiForm extends Form
{
    #[Validate('required')]
    public $name;

    #[Validate('required')]
    public $client_id;

    public function load($id)
    {
        $kategori = LocationsModel::findOrFail($id);

        $this->name = $kategori->name;
        $this->client_id = $kategori->client_id;
    }
}
