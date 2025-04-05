<?php

namespace App\Livewire\Forms;

use App\Models\ModelsModel;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ModelForm extends Form
{
    #[Validate('required')]
    public $name;

    public function load($id)
    {
        $kategori = ModelsModel::findOrFail($id);

        $this->name = $kategori->name;
    }
}
