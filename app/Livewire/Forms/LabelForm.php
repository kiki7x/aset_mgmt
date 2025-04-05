<?php

namespace App\Livewire\Forms;

use App\Models\LabelsModel;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LabelForm extends Form
{
    #[Validate('required')]
    public $name;

    #[Validate('required')]
    public $color;

    public function load($id)
    {
        $kategori = LabelsModel::findOrFail($id);

        $this->name = $kategori->name;
        $this->color = $kategori->color;
    }
}
