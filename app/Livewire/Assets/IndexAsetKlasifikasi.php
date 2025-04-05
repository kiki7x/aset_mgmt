<?php

namespace App\Livewire\Assets;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\AssetclassificationsModel;

class IndexAsetKlasifikasi extends Component
{
    use WithPagination;

    public $per_page = 10;
    public $search = "";
    protected $paginationTheme = 'bootstrap';

    public $deleteId = '';
    public $editId = '';
    public $showId = '';
    
    
    #[On('refresh')]
    public function render()
    {
        return view('livewire.assets.index-aset-klasifikasi')->with([
        'klasifikasis' => AssetclassificationsModel::search($this->search)
        ->where(function ($query) {
            $query->where('name', 'LIKE', "%{$this->search}%");
        })
        ->latest()
        ->paginate($this->per_page),
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
            $classification = AssetclassificationsModel::find($this->deleteId);
            if ($classification) {
                if ($classification->assetcategories()->exists()) {
                    $classification->assetcategories()->delete(); // Delete related asset categories
                }
                $classification->delete(); // Delete the classification
            }
            $this->closeModalDelete();
            $this->dispatchToastr('success', __('Data berhasil dihapus'));
        } catch (\Exception $e) {
            $this->closeModalDelete();
            $this->dispatchToastr('failed', __('Data gagal dihapus'));
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