<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class IssueForm extends Form
{
    #[Validate('required')]
    public $client_id = "1";

    #[Validate('required')]
    public $name;

    #[Validate('required')]
    public $issuetype;

    #[Validate('required')]
    public $admin_id;

    #[Validate('required')]
    public $asset_id;

    #[Validate('nullable')]
    public $ticketreply_id;
    
    #[Validate('nullable')]
    public $project_id;

    #[Validate('required')]
    public $status;

    #[Validate('required')]
    public $priority;
    
    #[Validate('required|date')]
    public $duedate;

    #[Validate('nullable')]
    public $description;
    
    #[Validate('nullable')]
    public $timespent;
    
    #[Validate('nullable')]
    public $milestone_id;
}