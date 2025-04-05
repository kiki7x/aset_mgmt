<?php

namespace App\Livewire\Assets;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\ModelsModel;

class IndexAsetModel extends Component
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
        return view('livewire.assets.index-aset-model')->with([
            'klasifikasis' => ModelsModel::search($this->search)
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
        $this->deleteId = $id;
        $this->dispatch('showModalDelete');
    }
    

    #[On('closeModalDelete')]
    public function closeModalDelete()
    {
        $this->dispatch('hideModalDelete');
    }

    #[On('delete')]
    public function delete($id)
    {
            $this->deleteId = $id;

        try {
            $category = ModelsModel::find($this->deleteId);

            if ($category ) {

                // Hapus data
                $category->delete();
            }

            $this->closeModalDelete();
            $this->dispatchToastr('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            $this->closeModalDelete();
            $this->dispatchToastr('failed', 'Data gagal dihapus');
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
