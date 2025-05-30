<?php

namespace App\Livewire\Modal;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\IssueForm;

class CreateIssue extends Component
{
    public IssueForm $form;

    // bawa relasi
    public $assets = [];
    public $categories;
    public $admins;
    public $users;
    public $manufacturers;
    public $models;
    public $suppliers;
    public $statuses;
    public $locations;
    public $projects;


    public function mount()
    {
        // looping seleksi
        $this->categories = \App\Models\AssetcategoriesModel::get();
        $this->users = \App\Models\User::get();
        $this->manufacturers = \App\Models\ManufacturersModel::get();
        $this->models = \App\Models\ModelsModel::get();
        $this->suppliers = \App\Models\SuppliersModel::get();
        $this->locations = \App\Models\LocationsModel::get();
        $this->statuses = \App\Models\LabelsModel::get();
        $this->projects = \App\Models\ProjectsModel::get();
    }

    public function render()
    {
        return view('livewire.modal.create-issue');
    }

    public function store()
    {
        // validasi input
        $this->form->validate();

        // himpun data input dan cocokkan ke database
        $data = [
                'client_id' => $this->form->client_id,
                'name' => $this->form->name,
                'issuetype' => $this->form->issuetype,
                'admin_id' => $this->form->admin_id,
                'asset_id' => $this->form->asset_id,
                'project_id' => $this->form->project_id,
                'status' => $this->form->status,
                'priority' => $this->form->priority,
                'duedate' => $this->form->duedate,
                'description' => $this->form->description,
        ];
        \App\Models\IssuesModel::Create($data);
        // tutup modal
        $this->dispatch('hideModalCreate');
        // Kirim alert toastr
        $this->dispatchToastr('success','Data berhasil disimpan');
        // reset form
        $this->resetInput();
        // refresh index
        $this->dispatch('refresh');
    }

    public function loadAssets()
    {
        $this->assets = \App\Models\AssetsModel::get();
    }

    #[On('openModalCreate')]
    public function openModalCreate()
    {
        $this->dispatch('showModalCreate');
    }

    #[On('closeModalCreate')]
    public function closeModalCreate()
    {
        $this->dispatch('hideModalCreate');
    }

    public function dispatchToastr(string $type, string $message)
    {
        $this->dispatch('alert', [
            'type' => $type,
            'message' => $message
        ]);
    }

    public function updateDate($purchase_date)
    {
        $this->form->purchase_date = $purchase_date;
    }

    public function resetInput()
    {
        $this->form->reset();
    }
}
