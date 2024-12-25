<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http; // Untuk panggilan HTTP

class AsetTikManager extends Component
{

    public $asettiks = [];
    public $errorMessage = null;
    public $currentPage = 1; // Menyimpan halaman yang sedang aktif
    public $totalPages = 1; // Total halaman dari API

    // Method untuk mengambil data produk dari API
    public function mount()
    {
        $this->fetchAsettik();
    }

    public function fetchAsettik()
    {
        // Mengambil data produk dari API menggunakan HTTP client
        $response = Http::get(config('app.url') .'/api/asettik?page=' .$this->currentPage); // Ganti dengan URL API Anda        
        // dd($response->json());
        // Mengecek jika response sukses
        if ($response->successful()) {
            $data = $response->json();

            $this->asettiks = $data['data']['data']; // Data produk
            $this->totalPages = $data['data']['last_page']; // Total halaman dari API
            $this->errorMessage = null; // Reset error jika berhasil
        } else {
            // Menangani error jika API gagal
            $this->errorMessage = "Gagal mengambil data. Silakan coba lagi."; 
            $this->asettiks = [];
        }
    }

    // Method untuk memuat halaman berikutnya
    public function nextPage()
    {
        if ($this->currentPage < $this->totalPages) {
            $this->currentPage++;
            $this->fetchAsettik();
        }
    }

    // Method untuk memuat halaman sebelumnya
    public function previousPage()
    {
        if ($this->currentPage > 1) {
            $this->currentPage--;
            $this->fetchAsettik();
        }
    }

    public function render()
    {

        return view('livewire.aset-tik-manager');
    }


}
