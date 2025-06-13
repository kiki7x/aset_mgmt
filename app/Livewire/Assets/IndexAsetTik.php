<?php

namespace App\Livewire\Assets;

use App\Models\AssetsModel;
use App\Models\User;
use App\Notifications\DeleteAsetTik as NotificationsDeleteAsetTik;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;
// use App\Livewire\CreateAsetTik;
use Livewire\Attributes\On;


class IndexAsetTik extends Component
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
        return view('livewire.assets.index-aset-tik')->with([
            'totalAssets' => \App\Models\AssetsModel::where('classification_id', 2)->count(),
            'assets' => \App\Models\AssetsModel::search($this->search)
                ->where('classification_id', 2)
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
            $aset = AssetsModel::find($this->deleteId);
            // Kirim notifikasi
            if ($aset) {
                $users = User::whereHas('roles', function ($query) {
                    $query->whereIn('name', ['superadmin', 'admin_tik', 'staf_tik']);
                })->get();

                foreach ($users as $user) {
                    $user->notify(new NotificationsDeleteAsetTik($aset));
                }
            }
            // Hapus aset
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
