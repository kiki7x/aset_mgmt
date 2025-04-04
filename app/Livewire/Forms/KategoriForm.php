<?php

namespace App\Livewire\Forms;

use App\Models\AssetcategoriesModel;
use Livewire\Attributes\Validate;
use Livewire\Form;

class KategoriForm extends Form
{
    #[Validate('required')]
    public $name;

    #[Validate('required')]
    public $color;

    #[Validate('required')]
    public $classification_id;

    public function load($id)
    {
        $kategori = AssetcategoriesModel::findOrFail($id);

        $this->name = $kategori->name;
        $this->color = $kategori->color;
        $this->classification_id = $kategori->classification_id;
    }
}
