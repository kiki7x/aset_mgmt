<?php

namespace App\Livewire\Assets;

use Livewire\Component;
use Livewire\WithPagination;
use App\Livewire\CreateAsetRt;
use Livewire\Attributes\On;

class IndexAsetRt extends Component
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
        return view('livewire.assets.index-aset-rt')->with([
        'totalAssets' => \App\Models\AssetsModel::where('classification_id', 3)->count(),
        'assets' => \App\Models\AssetsModel::search($this->search)
        ->where('classification_id', 3)
        ->with('category', 'status', 'model', 'user')
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
            AssetsModel::find($this->deleteId)->delete();
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