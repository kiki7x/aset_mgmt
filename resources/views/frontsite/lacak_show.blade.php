@extends('layouts.front')

{{-- @section('title', 'Kelola Aset TIK') --}}
{{-- <x-slot:title>{{ $title }}</x-slot:title> --}}

@push('scripts-head')
<style>
    body {
        background-color: #f8f9fa;
    }
    .container {
        margin-top: 20px;
    }
    .card {
        margin-bottom: 15px;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
    }
    .card-header {
        background-color: #e9ecef;
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        border-bottom: 1px solid #dee2e6;
        font-weight: bold;
    }
    .card-body {
        padding: 1.25rem;
    }
</style>
@endpush

@section('content')
    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">
            <div class="container">

                <div class="container section-title" data-aos="fade-up">
                    <h2><i class="bi bi-qr-code-scan"></i> Lacak Aset</h2>
                    <p>Fitur lacak aset dengan scan QR Code</p>
                </div><!-- End Section Title -->

                  <div class="alert alert-success col-md-6 mx-auto text-center" role="alert">
                    Aset ditemukan!
                  </div>
                  <div class="alert alert-danger col-md-6 mx-auto text-center" role="alert">
                    Aset tidak ditemukan!
                  </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header"><i class="fas fa-user mr-2"></i> Pemilik Barang</div>
                                <div class="card-body">
                                    <table class="table table-sm">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Kode Satker</th>
                                                <td>040012300418314000KD</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Nama Satker</th>
                                                <td>POLITEKNIK PARIWISATA LOMBOK</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fas fa-box mr-2"></i> Identitas Barang
                                </div>
                                <div class="card-body">
                                    <table class="table table-sm">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Kode Barang</th>
                                                <td>3100204039</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">NUP</th>
                                                <td>1</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Nama Barang</th>
                                                <td>CCTV Camera, 12v</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Merk</th>
                                                <td>CCTV - NVR 32 Channel Poe, Lab. Komputer</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Jenis BMN</th>
                                                <td>MESIN PERALATAN KHUSUS TIK</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tgl Perolehan</th>
                                                <td>2021-12-24</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Kondisi</th>
                                                <td>Baik</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    Kondisi BMN Hasil Sensus
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="kondisiBMN">Kondisi</label>
                                        <select class="form-control" id="kondisiBMN">
                                            <option>Baik</option>
                                            <option>Kurang Baik</option>
                                            <option>Rusak Berat</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    Kesesuaian Kode Barang
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="kesesuaianKode">Kesesuaian</label>
                                        <select class="form-control" id="kesesuaianKode">
                                            <option>Sesuai</option>
                                            <option>Tidak Sesuai</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    Status Penggunaan BMN
                                </div>
                                <div class="card-body">
                                    <p>...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- /Hero Section -->

    </main>
@endsection


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
@endpush
