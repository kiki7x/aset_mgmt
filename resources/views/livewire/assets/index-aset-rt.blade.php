<x-slot:title>Aset RT | SAPA PPL</x-slot:title>
<x-slot:welcome>Aset RT</x-slot:welcome>
<x-slot:breadcrumb>
    <li class="breadcrumb-item active">Aset RT</li>
</x-slot:breadcrumb>

<div>
    @php
        $assetLoop = [];
    @endphp
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                            <h3 class="card-title"><i class="fa-solid fa-building"></i> Kelola Aset Rumah Tangga <span class="badge end-0 mr-3 bg-info text-light">{{ $totalAssets }}</span></h3>
                            <button wire:click="$dispatch('openModalCreate', { component: 'modal.create-aset-rt' })" type="button" class="btn btn-primary" style="margin-left: auto;">
                                <i class="fas fa-square-plus"></i>
                                Tambah Data
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-3 mb-auto mt-auto">
                                    Tampilkan
                                    <select wire:model.live='per_page' class="form-select">
                                        <option>10</option>
                                        <option>20</option>
                                        <option>50</option>
                                        <option>100</option>
                                    </select>
                                    Entries
                                </div>
                                <div class="col-4 mb-auto mt-auto">
                                    <form action="" class="d-flex">
                                        <select name="jenis" class="ml-3 form-control">
                                            <option value="Semua">Semua Kategori</option>
                                            <option value="Semua">Kendaraan</option>
                                            <option value="masuk">Mesin</option>
                                            <option value="keluar">Peralatan</option>
                                        </select>
                                        <button type="submit" class="ml-0 btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Filter"><i class="fas fa-filter"></i></button>
                                    </form>
                                </div>
                                <div class="col mb-auto mt-auto d-none d-lg-block justify-content-end">
                                    <label for="search" class="col-form-label">Search:</label>
                                </div>
                                <div class="col mb-auto mt-auto d-flex">
                                    <input wire:model.live.debounce.200ms='search' type="text" id="search" class="form-control" placeholder="search nama aset / serial no">
                                </div>
                            </div>
                            <table id="example1" class="table table-bordered table-striped table-hover table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>Tag</th>
                                        <th>Nama Aset</th>
                                        <th>Kategori</th>
                                        <th>Tipe/Model</th>
                                        <th>Pengguna</th>
                                        <th>Aktivitas terakhir</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($assets as $asset)
                                        <tr wire:key="{{ $asset->id }}">
                                            @php
                                                $assetLoop[] = [
                                                    'id' => $asset->id,
                                                    'tag' => $asset->tag,
                                                    'name' => $asset->name,
                                                    'category' => $asset->category->name,
                                                    'model' => $asset->model->name,
                                                    'user' => $asset->user->name,
                                                    'updated_at' => $asset->updated_at,
                                                ];
                                            @endphp
                                            <td>
                                                <a href="{{ route('admin.asetrt.overview', ['id' => $asset->id]) }}">{{ $asset->tag }}</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.asetrt.overview', ['id' => $asset->id]) }}" class="font-weight-bold">{{ $asset->name }}</a>
                                                <br>
                                                <span class="text-muted">Serial No: </span><span>{{ $asset->serial }}</span> <br>
                                                <span class="text-muted">Status: </span><span class="badge" style="background-color: {{ $asset->status->color }}; color: white;">{{ $asset->status->name }}</span>
                                            </td>
                                            <td>
                                                <span class="badge" style="background-color:#FFF;color:{{ $asset->category->color }};border:1px solid {{ $asset->category->color }}">{{ $asset->category->name }}</span>
                                            </td>
                                            <td>
                                                {{ $asset->model->name }}
                                            </td>
                                            <td>{{ $asset->user->name }}</td>
                                            <td><span>{{ $asset->updated_at }}</span></td>
                                            <td>
                                                <div class="">
                                                    <div class="btn-group">
                                                        {{-- <a href="{{ route('admin.asetrt.show', ['id' => $asset->id]) }}" class="btn btn-flat btn-primary btn-sm"><i class="fa-regular fa-calendar-check"></i></a> --}}
                                                        <a href="{{ route('admin.asetrt.pemeliharaan', ['id' => $asset->id]) }}" type="button" class="btn btn-light"><i class="fa-regular fa-calendar-check" style="color: green" data-toggle="tooltip"
                                                               data-placement="top" title="Penjadwalan"></i></a>
                                                        <a href="#" type="button" class="btn btn-light" style="color: blue" data-toggle="tooltip" onclick="event.preventDefault(); showQrCodeModal('{{ $asset->tag }}', '{{ $asset->name }}')"
                                                           data-placement="top" title="QR Code">
                                                            <i class="fas fa-qrcode"></i>
                                                        </a>
                                                        <div class="btn-group">
                                                            {{-- <button type="button" class="btn btn-default btn-flat " data-toggle="dropdown"> --}}
                                                            <button type="button" class="btn btn-light btn-outline dropdown-toggle" data-toggle="dropdown" data-toggle-second="tooltip" data-placement="top" title="More...">
                                                                {{-- <span class="caret"></span><i class="fas fa-ellipsis-vertical"></i> --}}
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                <li><a href="{{ route('admin.asetrt.edit', ['id' => $asset->id]) }}"><i class="fa fa-trash-o fa-fw"></i>Edit</a></li>
                                                                <li><a href="" wire:click="$dispatch('openModalDelete', { id: {{ $asset->id }} })" onclick="event.preventDefault()"><i class="fa fa-trash-o fa-fw"></i>Delete</a></li>
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
                                <tfoot>
                                    <tr>
                                        <th>Tag</th>
                                        <th>Nama Aset</th>
                                        <th>Kategori</th>
                                        <th>Tipe/Model</th>
                                        <th>Pengguna</th>
                                        <th>Aktivitas terakhir</th>
                                        <th>Opsi</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- Modal QR Code -->
                            <div class="modal fade" id="qrCodeModal" tabindex="-1" role="dialog" aria-labelledby="qrCodeModalLabel" aria-hidden="true">
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
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                            Apakah Anda yakin ingin menghapus data ini? {{ $deleteId }}
                                        </div>
                                        <div class="modal-footer">
                                            <button wire:click="$dispatch('closeModalDelete')" type="button" class="btn btn-secondary">Batal</button>
                                            <button wire:click="$dispatch('delete', { id: {{ $deleteId }} })" type="button" class="btn btn-danger">Ya, Hapus</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Pagination -->
                                <div class="col-md-12">
                                    {{ $assets->links('vendor.livewire.bootstrap') }}
                                </div>
                                <div class="col-md-12">
                                    <div class="dt-buttons btn-group"><a class="btn btn-default buttons-copy buttons-html5" tabindex="0" aria-controls="dataTablesFull" href="#"><span>Copy</span></a><a
                                           class="btn btn-default buttons-csv buttons-html5" tabindex="0" aria-controls="dataTablesFull" href="#"><span>CSV</span></a><a class="btn btn-default buttons-excel buttons-html5" tabindex="0"
                                           aria-controls="dataTablesFull" href="#"><span>Excel</span></a><a class="btn btn-default buttons-pdf buttons-html5" tabindex="0" aria-controls="dataTablesFull" href="#"><span>PDF</span></a><a
                                           class="btn btn-default buttons-print" tabindex="0" aria-controls="dataTablesFull" href="#"><span>Print</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Komponen Modal/CreateAsetRt --}}
    @livewire('modal.create-aset-rt')

</div>

@push('script')
    <script>
        // Event untuk membuka modalDelete
        window.addEventListener('showModalDelete', () => {
            $('#modalDelete').modal('show').modal({
                backdrop: 'static'
            })
        });

        // Event untuk menutup modalDelete
        window.addEventListener('hideModalDelete', () => {
            $('#modalDelete').modal('hide');
            // $('.modal-backdrop').fadeOut(250);
        })

        $('[data-toggle-second="tooltip"]').tooltip();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>
    <script>
        let qrCodeInstance;

        function showQrCodeModal(tag, name) {
            $('#qrCodeModal').modal('show');
            document.getElementById('qrCodeName').innerText = name;
            document.getElementById('qrTagLabel').innerText = tag;

            // Reset qrcode div
            document.getElementById('qrcode').innerHTML = '';

            // Generate QR code
            qrCodeInstance = new QRCode(document.getElementById('qrcode'), {
                text: tag,
                width: 200,
                height: 200,
            });
        }

        function printQrCode() {
            const qrContent = document.getElementById('qrCodeContainer').innerHTML;
            const printWindow = window.open('', '', 'width=800,height=800');
            printWindow.document.write(
                `<html>
        <head>
            <title>Cetak QR Aset</title>
            <style>
                body {
                    display: flex; /* Menggunakan flexbox untuk tata letak */
                    flex-direction: column;
                    justify-content: center; /* Pusatkan vertikal */
                    align-items: center; /* Pusatkan horizontal */
                    min-height: 100vh; /* Pastikan body setinggi viewport */
                    margin: 0; /* Hilangkan margin default body */
                }
            </style>
        </head>
        <body>
            @foreach ($assetLoop as $asset)
            <title>Cetak QR Aset {{ $asset['name'] }}</title>
            @endforeach
            ${qrContent}
        </body>
        </html>`);
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        }
    </script>
@endpush
