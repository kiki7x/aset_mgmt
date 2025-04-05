<?php

namespace App\Livewire\Forms;

use App\Models\ManufacturersModel;
use Livewire\Attributes\Validate;
use Livewire\Form;

class MerkForm extends Form
{
    #[Validate('required')]
    public $name;

    public function load($id)
    {
        $kategori = ManufacturersModel::findOrFail($id);

        $this->name = $kategori->name;
    }
}
