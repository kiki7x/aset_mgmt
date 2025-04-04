<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class KlasifikasiForm extends Form
{
    #[Validate('required')]
    public $name;
}