@extends('layouts.front')

{{-- @section('title', 'Kelola Aset TIK') --}}
{{-- <x-slot:title>{{ $title }}</x-slot:title> --}}

@push('scripts-head')
@endpush

@section('content')
<main class="main">
<!-- Hero Section -->
<section id="hero" class="hero section dark-background">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
                <h1>Sistem Aplikasi Pengelolaan Aset Poltekpar Lombok</h1>
                <p>Layanan SAPA PPL bertujuan untuk mempermudah melacak pemanfaatan aset, penjadwalan pemeliharaan aset serta
                    mempermudah penanganan laporan gangguan sarana dan prasarana bidang TIK dan Peralatan Rumah Tangga.</p>
                <div class="d-flex">
                    <a href="{{ route('login') }}" class="btn-get-started">Mulai</a>
                    <a href="https://www.youtube.com/watch?v=92mqKMU2vuo&pp=ygUQcG9sdGVrcGFyIGxvbWJvaw%3D%3D" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Tonton Video</span></a>
                </div>
            </div>
            <div id="carouselDepan" class="carousel slide col-lg-6 order-1 order-lg-2" data-bs-ride="carousel" data-aos="zoom-out" data-aos-delay="200">
                <div class="carousel-inner rounded">
                    <div class="carousel-item active">
                        <img class="rounded img-fluid animated" loading="lazy" src="{{ asset('assets/gambar/rektorat-DJI_0769.webp') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="rounded img-fluid animated" loading="lazy" src="{{ asset('assets/gambar/gedung_kuliah_1-DJI_0752.webp') }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="rounded img-fluid animated" loading="lazy" src="{{ asset('assets/gambar/gedung_kuliah_2-DJI_0757.webp') }}" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="rounded img-fluid animated" loading="lazy" src="{{ asset('assets/gambar/gkt_lab_hospitality.webp') }}" alt="Fourth slide">
                    </div>
                </div>
                <a class="carousel-control-prev" data-bs-target="#carouselDepan" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" data-bs-target="#carouselDepan" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
</section><!-- /Hero Section -->

<!-- Services Section -->
<section id="services" class="services section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Lacak Aset</h2>
        <p>Beberapa cakupan fitur yang terdapat dalam aplikasi ini sebagai berikut</p>
    </div><!-- End Section Title -->

    <div class="container">

        
    </div>
</section><!-- /Services Section -->

</main>
@endsection


@push('scripts')
    <script></script>
@endpush