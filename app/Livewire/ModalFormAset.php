<?php

namespace App\Livewire;

use Livewire\Component;

class ModalFormAset extends Component
{
    

    // render component
    public function render()
    {
        return view('livewire.modal-form-aset');
        $this->emit('showModal');
    }

    public function save()
    {
        // Simpan data atau lakukan sesuatu dengan data
        // Contoh: simpan ke database atau kirim ke API
        session()->flash('message', 'Form berhasil disimpan!');
    }
}
