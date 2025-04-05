<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class SupplierForm extends Form
{
    #[Validate('required|string|max:255')]
    public $name;

    #[Validate('nullable|string')]
    public $address;

    #[Validate('nullable|string|max:255')]
    public $contactname;

    #[Validate('nullable|string|max:20')]
    public $phone;

    #[Validate('nullable|email')]
    public $email;

    #[Validate('nullable|string')]
    public $notes;
}
