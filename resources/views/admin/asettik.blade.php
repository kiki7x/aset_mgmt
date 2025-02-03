@extends('layouts.admin')

{{-- @section('title', 'Kelola Aset TIK') --}}
{{-- <x-slot:title>{{ $title }}</x-slot:title> --}}


@section('script-head')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- dater-picker -->
    <x-flatpickr::style />
@endsection

@section('content')
    @livewire('index-aset-tik')
    {{-- @livewire('modal.create-aset-tik') --}}
    @endsection

@section('script-foot')
    <!-- Select2 -->
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- date-picker -->
    <x-flatpickr::script />

@stack('script')
        
@endsection
