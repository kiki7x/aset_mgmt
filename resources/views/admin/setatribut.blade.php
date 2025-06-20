@extends('layouts.backsite', [
    'title' => 'Setting Atribut | SAPA PPL',
    'welcome' => 'Setting Atribut',
    'breadcrumb' => 'Setting Atribut'
    ])

<x-slot:title>{{ $title }}</x-slot:title>

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-3 col-sm-6 col-lg-3">
                <a href="{{ route('admin.setting_attr.klasifikasi') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fa-solid fa-database"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text font-weight-bold">Klasfikasi</span>
                            <span class="info-box-number font-weight-normal">{{ $klasifikasi->count() }}</span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </a>
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-lg-3">
                <a href="{{ route('admin.setting_attr.kategori') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fa-solid fa-database"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text font-weight-bold">Kategori</span>
                            <span class="info-box-number font-weight-normal">{{ $kategori->count() }}</span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </a>
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-lg-3">
                <a href="{{ route('admin.setting_attr.merk') }}">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fa-solid fa-database"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text font-weight-bold">Merk/Pabrikan</span>
                        <span class="info-box-number font-weight-normal">{{ $merk->count() }}</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
                </a>
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-lg-3">
                <a href="{{ route('admin.setting_attr.model') }}">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="fa-solid fa-database"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text font-weight-bold">Tipe/Model</span>
                        <span class="info-box-number font-weight-normal">{{ $model->count() }}</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
                </a>
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-lg-3">
                <a href="{{ route('admin.setting_attr.supplier') }}">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fa-solid fa-database"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text font-weight-bold">Supplier</span>
                        <span class="info-box-number font-weight-normal">{{ $supplier->count() }}</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
                </a>
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-lg-3">
                <a href="{{ route('admin.setting_attr.label') }}">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fa-solid fa-database"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text font-weight-bold">Label</span>
                        <span class="info-box-number font-weight-normal">{{ $label->count() }}</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
                </a>
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-lg-3">
                <a href="{{ route('admin.setting_attr') }}">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fa-solid fa-database"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text font-weight-bold">Kategori Lisensi</span>
                        <span class="info-box-number font-weight-normal">none</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
                </a>
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-lg-3">
                <a href="{{ route('admin.setting_attr.lokasi') }}">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="fa-solid fa-database"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text font-weight-bold">Lokasi</span>
                        <span class="info-box-number font-weight-normal">{{ $lokasi->count() }}</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
                </a>
            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
