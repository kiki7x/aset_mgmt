<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class AsetForm extends Form
{
    // state inputan form
    #[Validate('required')]
    public $classification = "1";

    #[Validate('required')]
    public $category;
    
    #[Validate('required')]
    public $adminaset;
    
    #[Validate('required')]
    public $clientaset = "1";
    
    #[Validate('required')]
    public $useraset;
    
    #[Validate('required')]
    public $manufacturer;
    
    #[Validate('required')]
    public $model;
    
    #[Validate('required')]
    public $supplier;
    
    #[Validate('required')]
    public $status;
    
    #[Validate('required|date')]
    public $purchase_date;
    
    #[Validate('required')]
    public $warranty_months;
    
    #[Validate('required|unique:assets,tag')]
    public $tag;
    
    #[Validate('required')]
    public $name;
    
    #[Validate('required|unique:assets,serial')]
    public $serial;
    
    #[Validate('nullable')]
    public $notes;
    
    #[Validate('required')]
    public $location;
    
    #[Validate('nullable')]
    public $customfields;
    
    #[Validate('nullable')]
    public $qrvalue;

}
