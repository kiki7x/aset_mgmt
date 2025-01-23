<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Livewire\CreateAsetTik;
use Livewire\Attributes\On; 


class IndexAsetTik extends Component
{
    use WithPagination;

    public $per_page = 5;
    public $search = "";
    protected $listeners = [
        '$refresh', 
    ];
    protected $paginationTheme = 'bootstrap';

    public $deleteId = '';
    // variabel bawa relasi model
    public $classifications;
    public $categories;
    public $admins;
    public $clients;
    public $users;
    public $manufacturers;
    public $models;
    public $suppliers;
    public $statuses;
    public $locations;
    

    public function mount()
    {

    }
    #[On('refresh')]
    public function render()
    {
        return view('livewire.index-aset-tik')->with([
        'assets' => \App\Models\AssetsModel::search($this->search)
        ->latest()
        ->paginate($this->per_page),
        'classifications' => \App\Models\AssetclassificationsModel::all(),
        'categories' => \App\Models\AssetcategoriesModel::all(),
        'admins' => \App\Models\User::all(),
        'clients' => \App\Models\ClientsModel::all(),
        'users' => \App\Models\User::all(),
        'manufacturers' => \App\Models\ManufacturersModel::all(),
        'models' => \App\Models\ModelsModel::all(),
        'suppliers' => \App\Models\SuppliersModel::all(),
        'statuses' => \App\Models\LabelsModel::all(), 
        'locations' => \App\Models\LocationsModel::all(),
        ]);
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

    public function edit($id)
    {
        $this->dispatch('edit', $id);    
    }

    #[On('confirmDelete')] 
    public function confirmDelete($id)
    {
        $this->dispatch('showModalDelete');
        $this->deleteId = $id;
    }

    public function closeModal()
    {
        $this->dispatchToastr('success','Data berhasil dihapus');
        $this->dispatch('closeModalDelete');
    }

    public function delete()
    {
        try {
            \App\Models\AssetsModel::find($this->deleteId)->delete();
            // $asset->delete();
            $this->closeModal();
            session()->flash('alert', [
                'type' => 'success',
                'message' => 'Data berhasil dihapus',
            ]);
        } catch (Exception $e) {
            $this->closeModal();
            session()->flash('alert', [
                'type' => 'failed',
                'message' => "Something goes wrong!!"
            ]);
        }
    }

    public function dispatchToastr(string $type, string $message)
    {
        $this->dispatch('alert', [
            'type' => $type,
            'message' => $message,
        ]);
    }
}