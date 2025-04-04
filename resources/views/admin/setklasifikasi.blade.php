@extends('layouts.admin')

<x-slot:title>{{ $title }}</x-slot:title>

@section('content')

{{-- {{dd($klasifikasis)}}; --}}

    <section class="content-header">
        <div class="d-flex justify-content-end mb-1">
            <a href="{{ route('admin.setting_attr') }}" type="button" class="btn btn-primary"><i class="fa-solid fa-angles-left"></i> Kembali</a>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Master Data Klasifikasi <i class="fa-solid fa-database"></i></h3>
                            <button wire:click="$dispatch('openModalCreate', { component: 'modal.create-aset-tik' })" type="button" class="btn btn-primary" style="margin-left: auto;">
                                <i class="fas fa-square-plus"></i>
                                Tambah Data
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-3 mt-auto">
                                    Show
                                    <select wire:model.live='per_page' class="form-select">
                                        <option>10</option>
                                        <option>20</option>
                                        <option>50</option>
                                        <option>100</option>
                                    </select>
                                    Entries
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <label for="search" class="col-form-label">Search:</label>
                                </div>
                                <input wire:model.live.debounce.200ms='search' type="text" id="search" class="form-control col-3" placeholder="">
                            </div>
                            <table id="example1" class="table table-bordered table-striped table-hover table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Klasifikasi</th>
                                        <th>Aktivitas terakhir</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($klasifikasis as $kl)
                                        <tr wire:key="{{ $kl->id }}">
                                            <td>
                                                <a href="{{ route('admin.asettik.show', ['id' => $kl->id]) }}">{{ $kl->id }}</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.asettik.show', ['id' => $kl->id]) }}" class="font-weight-bold">{{ $kl->name }}</a>
                                            </td>
                                            <td><span>{{ $kl->updated_at }}</span></td>
                                            <td>
                                                <div class="">
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.asettik.show', ['id' => $kl->id]) }}" class="btn btn-flat btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                                        {{-- <a href="" onclick="event.preventDefault()" wire:click="edit({{ $kl->id }})" class="btn btn-flat btn-success btn-sm"><i class="fa fa-edit"></i></a> --}}
                                                        <div class="btn-group">
                                                            {{-- <button type="button" class="btn btn-default btn-sm btn-flat dropdown-toggle" data-toggle="dropdown"> --}}
                                                            <button type="button" class="btn btn-default btn-flat " data-toggle="dropdown">
                                                                <span class="caret"></span><i class="fas fa-ellipsis-vertical"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li><a href="{{ route('admin.asettik.show', ['id' => $kl->id]) . '/edit' }}"><i class="fa fa-trash-o fa-fw"></i>Edit</a></li>
                                                                <li><a href="" wire:click="$dispatch('openModalDelete', { id: {{ $kl->id }} })" onclick="event.preventDefault()"><i class="fa fa-trash-o fa-fw"></i>Delete</a></li>
                                                                <li><a href="" target="_blank"><i class="fa fa-barcode fa-fw"></i>label</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Tidak ada data yang ditemukan</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                @foreach ($klasifikasis as $klasifikasi)
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>{{ $klasifikasi->name}}</th>
                                        <th>Opsi</th>
                                    </tr>
                                </tfoot>
                            </table>
                            @endforeach
                            <!-- Modal Konfirmasi -->
                            <div class="modal fade" data-backdrop="static" role="dialog" id="modalDelete">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Konfirmasi Penghapusan !</h5>
                                            <button type="button" class="close" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{-- Apakah Anda yakin ingin menghapus data ini? {{ $deleteId }} --}}
                                            Apakah Anda yakin ingin menghapus data ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button wire:click="$dispatch('closeModalDelete')" type="button" class="btn btn-secondary">Batal</button>
                                            {{-- <button wire:click="$dispatch('delete', { id: {{ $deleteId }} })" type="button" class="btn btn-danger">Ya, Hapus</button> --}}
                                            <button type="button" class="btn btn-danger">Ya, Hapus</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Pagination -->
                                <div class="col-md-12">
                                    {{-- {{ $klasifikasis->links('vendor.livewire.bootstrap') }} --}}
                                </div>
                                <div class="col-md-12">
                                    <div class="dt-buttons btn-group"><a class="btn btn-default buttons-copy buttons-html5" tabindex="0" aria-controls="dataTablesFull" href="#"><span>Copy</span></a><a class="btn btn-default buttons-csv buttons-html5"
                                           tabindex="0" aria-controls="dataTablesFull" href="#"><span>CSV</span></a><a class="btn btn-default buttons-excel buttons-html5" tabindex="0" aria-controls="dataTablesFull"
                                           href="#"><span>Excel</span></a><a class="btn btn-default buttons-pdf buttons-html5" tabindex="0" aria-controls="dataTablesFull" href="#"><span>PDF</span></a><a class="btn btn-default buttons-print"
                                           tabindex="0" aria-controls="dataTablesFull" href="#"><span>Print</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
