@extends('layouts.backsite', [
    'title' => 'Laporan | SAPA PPL',
    'welcome' => 'Laporan',
    'breadcrumb' => 'Laporan'
    ])

@section('script-head')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- dater-picker -->
    <x-flatpickr::style />
@endsection

@section('content')
    @livewire('index-aset-klasifikasi')
    {{-- @livewire('modal.create-aset-klasifikasi') --}}
@endsection

@section('script-foot')
    <!-- Select2 -->
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- date-picker -->
    <x-flatpickr::script />

@stack('script')

@endsection
