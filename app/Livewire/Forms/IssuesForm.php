<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class IssuesForm extends Form
{
    public $client_id;
    public $asset_id;
    public $project_id;
    public $admin_id;
    public $milestone_id;
    public $issuetype;
    public $priority;
    public $status;
    public $name;
    public $description;
    public $duedate;
    public $timespent;
}