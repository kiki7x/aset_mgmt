{{-- resources\views\livewire\index-aset-tik.blade.php --}}

<div>
    @section('title')
        {{ 'Page Title Goes Here' }}
    @endsection
    <section class="content-header">
        <div class="d-flex justify-content-end mb-1">
            <a href="{{ route('admin.asettik.create') }}" role="button" class="btn btn-primary">+Tambah Data</a>
        </div>
        <div class="d-flex justify-content-end mb-1">
            <button wire:click="$dispatch('openModalCreate', { component: 'modal.create-aset-tik' })" type="button" class="btn btn-primary">Tambah Data ke komponen modal</button>
        </div>
    </section>



    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kelola Aset TIK</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-3 mt-auto">
                                    Show
                                    <select wire:model.live='per_page' class="form-select">
                                        <option>5</option>
                                        <option>10</option>
                                        <option>15</option>
                                    </select>
                                    Entries
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <label for="search" class="col-form-label">Search:</label>
                                </div>
                                <input wire:model.live='search' type="text" id="search" class="form-control col-3" placeholder="nama / serial no">
                            </div>
                            <table id="example1" class="table table-bordered table-striped table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>Tag</th>
                                        <th>Nama Aset</th>
                                        <th>Kategori</th>
                                        <th>Model</th>
                                        <th>Serial Number</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($assets as $asset)
                                        <tr wire:key="{{ $asset->id }}" class="odd">
                                            <td><a href="#">{{ $asset->tag }}</a></td>
                                            <td><a href="?route=inventory/assets/manage&amp;id=1">{{ $asset->name }}</a></td>
                                            <td><span class="badge" style="background-color:#FFF;color:{{ $asset->category->color }};border:1px solid {{ $asset->category->color }}">{{ $asset->category->name }}</span></td>
                                            <td>{{ $asset->model->name }}</td>
                                            <td>{{ $asset->serial }}</td>
                                            <td><span class="badge" style="background-color: {{ $asset->status->color }}; color: white;">{{ $asset->status->name }}</span></td>
                                            <td>
                                                <div class="">
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.asettik.show') }}" class="btn btn-flat btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                                        <a href="" onclick="event.preventDefault()" wire:click="edit({{ $asset->id }})" class="btn btn-flat btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-default btn-sm btn-flat dropdown-toggle" data-toggle="dropdown">
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li><a href="" onclick="event.preventDefault()" wire:click="confirmDelete({{ $asset->id }})"><i class="fa fa-trash-o fa-fw"></i>Delete</a>
                                                                </li>
                                                                <li><a href="?route=pdf&amp;type=assetlabel&amp;id=2" target="_blank"><i class="fa fa-barcode fa-fw"></i>label</a></li>
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
                                        <th>Model</th>
                                        <th>Serial Number</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- Modal Konfirmasi -->
                            <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalDeleteLabel">Konfirmasi Penghapusan !</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus data ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" wire:click.prevent="closeModal">Batal</button>
                                            <button type="button" class="btn btn-danger" wire:click.prevent="delete">Ya</button>
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

    {{-- Komponen Modal/CreateAsetTik --}}
    @livewire('modal.create-aset-tik')
    <!-- Komponen EditAsetTik -->
    @livewire('edit-aset-tik')
</div>

@push('script')
    {{-- toastr notif ready --}}
    @if (session('alert'))
        <script>
            toastr["{{ session('alert.type') }}"]("{{ session('alert.message') }}");
        </script>
    @endif
    <script>
        // Event untuk menampilkan notifikasi
        window.addEventListener('alert', (e) => {
            const {
                type,
                message
            } = event.detail[0];
            if (['success', 'error', 'info', 'warning'].includes(type)) {
                toastr[type](message); // Tampilkan toastr sesuai tipe
            } else {
                console.log('Event detail:', event.detail);
            }
        });
    </script>

    <script>
        // Event untuk membuka modalCreate
        window.addEventListener('showModalCreate', () => {
            const modal = new bootstrap.Modal(document.getElementById('modalCreate'));
            modal.show();
        });
    </script>

    
    <script>
        // Event untuk menutup modalCreate
        window.addEventListener('hideModalCreate', () => {
            const modal = document.getElementById('modalCreate');
            modal.style.display = 'none';
            $('.modal-backdrop').fadeOut(250);

        });
    </script>

    <script>
        // Event untuk membuka modal
        window.addEventListener('showModalDelete', () => {
            const modal = new bootstrap.Modal(document.getElementById('modalDelete'));
            modal.show();
        });

        // Even untuk menutup modal
        window.addEventListener('closeModalDelete', () => {
            $('#modalDelete').modal('hide');
            $('.modal-backdrop').fadeOut(250);
        })
    </script>
@endpush
