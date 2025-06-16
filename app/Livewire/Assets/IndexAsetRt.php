<?php

namespace App\Livewire\Assets;

use Livewire\Component;
use Livewire\WithPagination;
use App\Livewire\CreateAsetRt;
use App\Models\AssetsModel;
use App\Models\User;
use App\Notifications\DeleteAsetRT;
use Exception;
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

    public $category = "Semua";
    public $isFiltering = false;

    #[On('refresh')]
    public function render()
    {
        $query = \App\Models\AssetsModel::search($this->search)
            ->whereIn('classification_id', [3, 4])
            ->with('category', 'status', 'model', 'user')
            ->latest();

        if ($this->isFiltering && $this->category !== 'Semua') {
            $query->where('category_id', $this->category);
        }


        return view('livewire.assets.index-aset-rt')->with([
            'categories' => \App\Models\AssetcategoriesModel::whereIn('classification_id', [3, 4])->get(),
            'totalAssets' => \App\Models\AssetsModel::where('classification_id', 3)->count(),
            'assets' => $query->paginate($this->per_page),
        ]);
    }

    public function updatedCategory()
    {
        $this->resetPage();
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
            $aset = AssetsModel::find($this->deleteId);

            // Kirim notifikasi
            if ($aset) {
                $users = User::whereHas('roles', function ($query) {
                    $query->whereIn('name', ['superadmin', 'admin_rt']);
                })->get();

                foreach ($users as $user) {
                    $user->notify(new DeleteAsetRT($aset));
                }
            }

            $aset->delete();
            $this->closeModalDelete();
            $this->dispatchToastr('success', 'Data berhasil dihapus');
        } catch (Exception $e) {
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
