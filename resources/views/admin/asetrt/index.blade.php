@extends('layouts.backsite')

@section('title', 'Kelola Aset RT')

@push('script-head')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                            <h3 class="card-title"><i class="fa-solid fa-computer"></i> Kelola Aset RT <span
                                    class="badge end-0 mr-3 bg-info text-light">{{ $totalAssets }}</span></h3>
                            <button type="button" id="btnOpenCreateModal" class="btn btn-primary"
                                style="margin-left: auto;">
                                <i class="fas fa-square-plus"></i>
                                Tambah Data
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-3 mt-auto">
                                    Show
                                    <select id="per_page" class="form-select">
                                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                                        <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20</option>
                                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                                        <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100
                                        </option>
                                    </select>
                                    Entries
                                </div>
                                <div class="col-4 mt-auto">
                                    <div class="d-flex">
                                        <select id="category" name="jenis" class="ml-0 form-control mr-2">
                                            <option value="">Semua Kategori</option>
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}"
                                                    {{ request('category') == $cat->id ? 'selected' : '' }}>
                                                    {{ $cat->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="ml-0 btn btn-warning btn-sm" data-toggle="tooltip"
                                            data-placement="top" title="Filter"><i class="fas fa-filter"></i></button>
                                    </div>
                                </div>
                                <div class="col-2 d-flex justify-content-end">
                                    <label for="search" class="col-form-label">Search:</label>
                                </div>
                                <input type="text" id="search" name="search" value="{{ request('search') }}"
                                    class="form-control col-3" placeholder="nama / serial no">
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" id="tableAsetrt">
                                    <thead>
                                        <tr>
                                            <th>Tag</th>
                                            <th>Nama Aset</th>
                                            <th>Kategori</th>
                                            <th>Tipe/Model</th>
                                            <th>Pengguna</th>
                                            <th>Aktivitas Terakhir</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>

                            <!-- Modal QR Code -->
                            <div class="modal fade" id="qrCodeModal" tabindex="-1" role="dialog"
                                aria-labelledby="qrCodeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                    <div class="modal-content text-center">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="qrCodeModalLabel">QR Code Aset</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="qrCodeContainer">
                                            <div id="qrCodeName" class="d-flex justify-content-center mb-2"></div>
                                            <div id="qrcode" class="d-flex justify-content-center"></div>
                                            <p class="mt-2" id="qrTagLabel"></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button onclick="printQrCode()" class="btn btn-primary">Print</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Pagination -->
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                                        <small>
                                            Menampilkan {{ $assets->firstItem() ?? 0 }} sampai
                                            {{ $assets->lastItem() ?? 0 }}
                                            dari total {{ $assets->total() }} entri
                                        </small>
                                        <div id="pagination-wrapper"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="dt-buttons btn-group"><a class="btn btn-default buttons-copy buttons-html5"
                                            tabindex="0" aria-controls="dataTablesFull"
                                            href="#"><span>Copy</span></a><a
                                            class="btn btn-default buttons-csv buttons-html5" tabindex="0"
                                            aria-controls="dataTablesFull" href="#"><span>CSV</span></a><a
                                            class="btn btn-default buttons-excel buttons-html5" tabindex="0"
                                            aria-controls="dataTablesFull" href="#"><span>Excel</span></a><a
                                            class="btn btn-default buttons-pdf buttons-html5" tabindex="0"
                                            aria-controls="dataTablesFull" href="#"><span>PDF</span></a><a
                                            class="btn btn-default buttons-print" tabindex="0"
                                            aria-controls="dataTablesFull" href="#"><span>Print</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.asetrt.partials.create-modal')
        @include('admin.asetrt.partials.delete-modal')
    </section>

    @push('script-foot')
        <!-- InputMask -->
        <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
        {{-- Select2 --}}
        <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>

        {{-- TableScript --}}
        <script>
            function initTableAsetrt() {
                $('#tableAsetrt').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ajax: {
                        url: "{{ route('admin.asettik.get_assets') }}",
                        data: function(d) {
                            d.classification =
                                'rt';
                        }
                    },
                    columns: [{
                            data: 'tag',
                            name: 'tag'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'category',
                            name: 'category'
                        },
                        {
                            data: 'model',
                            name: 'model'
                        },
                        {
                            data: 'user',
                            name: 'user'
                        },
                        {
                            data: 'updated_at',
                            name: 'updated_at'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ],
                });
            }

            $(document).ready(function() {
                initTableAsetrt();
            })
        </script>

        {{-- ModalManagement --}}
        <script>
            $(document).ready(function() {
                // Open Modal
                $('#btnOpenCreateModal').on('click', function() {
                    $('#createModal').modal('show');
                });

                // Delete Modal
                $('#deleteModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget);
                    var id = button.data('id');
                    var name = button.data('name');

                    var modal = $(this)
                    modal.find('#assetName').text(name)
                });
            });
        </script>
    @endpush

@endsection
