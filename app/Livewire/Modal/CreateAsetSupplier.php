<?php

namespace App\Livewire\Modal;

use Livewire\Component;
use App\Models\SuppliersModel;
use App\Livewire\Forms\SupplierForm;
use Livewire\Attributes\On;


class CreateAsetSupplier extends Component
{
    public SupplierForm $form;

    public $prefix = "supplier";

    public function mount()
    {
        
        $this->form->adminaset = auth()->user()->id;
    }

    public function render()
{
    return view('livewire.modal.create-aset-supplier');
}

    public function store()
    {
        
        // validasi input
        $this->form->validate();

        // Simpan data 
        $classificationData = [
            'name' => $this->form->name,
            'address' => $this->form->address,
            'contactname' => $this->form->contactname,
            'phone' => $this->form->phone,
            'email' => $this->form->email,
            'notes' => $this->form->notes,
        ];
        $classification = SuppliersModel::create($classificationData);

        // himpun data input dan cocokkan ke database
        $data = [
            'id' => $classification->id,
            'name' => $classification->name,
            'address' => $classification->address,
            'contactname' => $classification->contactname,
            'phone' => $classification->phone,
            'email' => $classification->email,
            'notes' => $classification->notes,
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
        $lastTag = SuppliersModel::where('name', 'like', $this->prefix . '-%')
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
