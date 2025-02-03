<?php

namespace App\Livewire\Assets;

use Livewire\Component;
use Livewire\WithPagination;
use App\Livewire\CreateAsetTik;
use Livewire\Attributes\On;

class IndexAsetTik extends Component
{
    use WithPagination;

    public $per_page = 5;
    public $search = "";
    protected $paginationTheme = 'bootstrap';

    public $deleteId = '';
    public $editId = '';
    public $showId = '';
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
        return view('livewire.assets.index-aset-tik')->with([
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

    public function edit($id)
    {
        $this->dispatch('edit', $id);    
    }


    #[On('openModalDelete')] 
    public function openModalDelete($id)
    {
        $this->dispatch('showModalDelete');
        $this->deleteId = $id;
    }

    #[On('closeModalDelete')]
    public function closeModalDelete()
    {
        // $this->dispatchToastr('success','Data berhasil dihapus');
        $this->dispatch('hideModalDelete');
    }

    #[On('delete')]
    public function delete($id)
    {
        try {
            $this->deleteId = $id;
            \App\Models\AssetsModel::find($this->deleteId)->delete();
            // $asset->delete();
            $this->closeModalDelete();
            $this->dispatchToastr('success','Data berhasil dihapus');
        } catch (Exception $e) {
            $this->closeModalDelete();
            $this->dispatchToastr('failed','Data gagal dihapus');
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