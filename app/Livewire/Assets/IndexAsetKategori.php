<?php

namespace App\Livewire\Assets;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\AssetcategoriesModel;

class IndexAsetKategori extends Component
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
        return view('livewire.assets.index-aset-kategori')->with([
            'categories' => AssetcategoriesModel::with('classification') 
                ->search($this->search)
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
        $category = AssetcategoriesModel::find($this->deleteId);

        if ($category) {
            if (method_exists($category, 'assetcategories') && $category->assetcategories()->exists()) {
                $category->assetcategories()->delete();
            }
            $category->delete();
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
