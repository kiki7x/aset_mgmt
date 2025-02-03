<?php

namespace App\Livewire\Issues;

use Livewire\Component;
use App\Models\Issues;
use Livewire\WithPagination;


class IndexIssues extends Component
{
    use WithPagination;

    public $per_page = 10;
    public $search = "";
    protected $paginationTheme = 'bootstrap';

    public $deleteID = '';
    public $editID = '';
    public $issueID = '';
    

    public function mount()
    {

    }
    #[On('refresh')]
    public function render()
    {
        return view('livewire.issues.index-issues')->with([
        'issues' => IssuesModel::search($this->search)
        ->latest()
        ->paginate($this->per_page),
        'admins' => \App\Models\User::all(),
        'clients' => \App\Models\ClientsModel::all(),
        'users' => \App\Models\User::all(),
        'statuses' => \App\Models\LabelsModel::all(), 
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
