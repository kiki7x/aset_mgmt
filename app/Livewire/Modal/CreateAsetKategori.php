<?php

namespace App\Livewire\Modal;

use Livewire\Component;
use App\Models\AssetcategoriesModel;
use App\Models\AssetclassificationsModel;
use App\Livewire\Forms\KategoriForm;
use Livewire\Attributes\On;


class CreateAsetKategori extends Component
{
    public KategoriForm $form;

    public $prefix = "kategori";

    public function mount()
    {
        
        $this->form->adminaset = auth()->user()->id;
    }

    public function render()
{
    return view('livewire.modal.create-aset-kategori', [
        'classifications' => AssetclassificationsModel::all()
    ]);
}

    public function store()
    {
        
        // validasi input
        $this->form->validate();

        // Simpan data ke AssetcategoriesModel
        $classificationData = [
            'name' => $this->form->name,
            'color' => $this->form->color,
            'classification_id' => $this->form->classification_id
        ];
        $classification = AssetcategoriesModel::create($classificationData);

        // himpun data input dan cocokkan ke database
        $data = [
            'id' => $classification->id,
            'name' => $this->form->name,
            'classification_id' => $this->form->classification_id,
            'color' => $this->form->color
        ];
        // tutup modal
        $this->dispatch('hideModalCreate');
        // Kirim alert toastr
        $this->dispatchToastr('success','Data berhasil disimpan');
        // reset form
        $this->resetInput();
        // refresh index
        $this->dispatch('refresh');
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
            'message' => $message,
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

    public function incrementTag() {
        $lastTag = AssetcategoriesModel::where('name', 'like', $this->prefix . '-%')
                        ->orderBy('name', 'desc')
                        ->first();
      
        if ($lastTag) {
          $lastSequenceNumber = (int) explode('-', $lastTag->name)[1];
          return $lastSequenceNumber + 1;
        } else {
          return 1; // Jika belum ada data, mulai dari 1
        }
    }
    
}
