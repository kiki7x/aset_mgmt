<?php

namespace App\Livewire\Modal;

use Livewire\Component;
use App\Models\AssetclassificationsModel;
use App\Livewire\Forms\KlasifikasiForm;
use Livewire\Attributes\On;


class CreateAsetKlasifikasi extends Component
{
    public KlasifikasiForm $form;

    // isian default prefill
    public $prefix = "klasifikasi";

    public function mount()
    {
        // ambil user_id dari session auth
        $this->form->adminaset = auth()->user()->id;
    }

    public function render()
    {
        return view('livewire.modal.create-aset-klasifikasi');
    }

    public function store()
    {
        
        // validasi input
        $this->form->validate();

        // Simpan data ke AssetclassificationsModel
        $classificationData = [
            'name' => $this->form->name
        ];
        $classification = AssetclassificationsModel::create($classificationData);

        // himpun data input dan cocokkan ke database
        $data = [
            'id' => $classification->id,
            'name' => $this->form->name,
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
        $lastTag = AssetclassificationsModel::where('name', 'like', $this->prefix . '-%')
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
