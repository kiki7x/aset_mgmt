<div>
    {{-- @section('title')
        {{ 'Page Title Goes Here' }}
    @endsection --}}
    {{-- <section class="content-header">
        <div class="d-flex justify-content-end mb-1">
            <button wire:click="$dispatch('openModalCreate', { component: 'modal.create-issue' })" type="button" class="btn btn-primary">
                <i class="fas fa-square-plus"></i> 
                Buat Penugasan
            </button>
        </div>
    </section> --}}

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                            <h3 class="card-title">Kelola Penugasan</h3>
                            <button wire:click="$dispatch('openModalCreate', { component: 'modal.create-issue' })" type="button" class="btn btn-primary" style="margin-left: auto;">
                                <i class="fas fa-square-plus"></i> 
                                Buat Penugasan
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
                                <input wire:model.live.debounce.200ms='search' type="text" id="search" class="form-control col-3" placeholder="nama / deskripsi">
                            </div>
                            <table id="example1" class="table table-bordered table-striped table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Petugas</th>
                                        <th>Status</th>
                                        <th>Tenggat Waktu</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($issues as $issue)
                                        <tr wire:key="{{ $issue->id }}" class="odd">
                                            <td><a href="#">{{ $issue->id }}</a></td>
                                            <td><span class="badge" style="background-color:#FFF;color:{{ $issue->priority }};border:1px solid {{ $issue->issuetype }}"></span><a href="?route=inventory/assets/manage&amp;id=1">{{ $issue->name }}</a></td>
\                                            <td>{{ $issue->admin_id }}</td>
                                            <td>{{ $issue->status }}</td>
                                            <td>{{ $issue->duedate }}</td>
                                            <td>
                                                <div class="">
                                                    <div class="btn-group">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-default btn-flat " data-toggle="dropdown">
                                                                <span class="caret"></span><i class="fas fa-ellipsis-vertical"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li><a href="{{ route('admin.asettik.show', ['id' => $issue->id]) . '/edit' }}"><i class="fa fa-trash-o fa-fw"></i>Edit</a></li>
                                                                <li><a href="" wire:click="$dispatch('openModalDelete', { id: {{ $issue->id }} })" onclick="event.preventDefault()"><i class="fa fa-trash-o fa-fw"></i>Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada data yang ditemukan</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Petugas</th>
                                        <th>Status</th>
                                        <th>Tenggat Waktu</th>
                                        <th>Opsi</th>
                                    </tr>
                                </tfoot>
                            </table>
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
                                            Apakah Anda yakin ingin menghapus data ini? {{ $deleteID }}
                                        </div>
                                        <div class="modal-footer">
                                            <button wire:click="$dispatch('closeModalDelete')" type="button" class="btn btn-secondary">Batal</button>
                                            <button wire:click="$dispatch('delete', { id: {{ $deleteID }} })" type="button" class="btn btn-danger">Ya, Hapus</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Pagination -->
                                <div class="col-md-12">
                                    {{ $issues->links('vendor.livewire.bootstrap') }}
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
    @livewire('modal.create-issue')

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
    </script>
@endpush
