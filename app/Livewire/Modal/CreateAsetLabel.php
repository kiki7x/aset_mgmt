<?php

namespace App\Livewire\Modal;

use Livewire\Component;
use App\Models\LabelsModel;
use App\Livewire\Forms\LabelForm;
use Livewire\Attributes\On;

class CreateAsetLabel extends Component
{
    public LabelForm $form;

    public $prefix = "label";

    public function mount()
    {
        
        $this->form->adminaset = auth()->user()->id;
    }

    public function render()
{
    return view('livewire.modal.create-aset-label');
}

    public function store()
    {
        
        // validasi input
        $this->form->validate();

        // Simpan data 
        $classificationData = [
            'name' => $this->form->name,
            'color' => $this->form->color,
        ];
        $classification = LabelsModel::create($classificationData);

        // himpun data input dan cocokkan ke database
        $data = [
            'id' => $classification->id,
            'name' => $classification->name,
            'color' => $classification->color
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
        $lastTag = LabelsModel::where('name', 'like', $this->prefix . '-%')
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
