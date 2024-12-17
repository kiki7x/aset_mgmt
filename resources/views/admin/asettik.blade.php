@extends('layouts.admin')

@section('title', 'Kelola Aset TIK')

@section('script-head')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')

@livewire('modal-form-aset')

    <section class="content-header">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('admin.asettik.create') }}" class="btn btn-primary">NEW ASSET</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddAset">NEW ASSET LiveWire</button>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Tag">Tag</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Kategori">Kategori</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama Aset">Nama Aset</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Model">Model</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="SN">Serial Number</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Relasi Entitas">Relasi Entitas</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Aksi">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0"><a href="#">IT-1</a></td>
                                            <td><span class="label" style="background-color:#FFF;color:#1e3fda;border:1px solid #1e3fda">Desktops</span></td>
                                            <td><a href="?route=inventory/assets/manage&amp;id=1">Desktop 1</a></td>
                                            <td>Optiplex 3020 MT</td>
                                            <td>QWERTY 12</td>
                                            <td>
                                                <a href="?route=clients/manage&amp;id=1">
                                                    <span class="label" style="background-color:#FFF;color:#0073b7;border:1px solid #0073b7;"><i class="fa fa-briefcase fa-fw"></i> Politeknik Pariwisata Lombok</span>
                                                </a>
                                            </td>
                                            <td><span class="badge" style="background-color:#3479da; color: white;">Deployed</span></td>
                                            <td>
                                                <div class="pull-right">
                                                    <div class="btn-group">
                                                        <a href="?route=inventory/assets/manage&amp;id=2" class="btn btn-flat btn-primary btn-sm"><i class="fa fa-eye"></i></a> <a href="?route=inventory/assets/manage&amp;id=2&amp;section=edit"
                                                           class="btn btn-flat btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-default btn-sm btn-flat dropdown-toggle" data-toggle="dropdown">
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li><a href="#" onclick="showM(&quot;?modal=assets/delete&amp;reroute=inventory/assets&amp;routeid=&amp;id=2&amp;section=&quot;);return false"><i class="fa fa-trash-o fa-fw"></i>Delete</a>
                                                                </li>
                                                                <li><a href="?route=pdf&amp;type=assetlabel&amp;id=2" target="_blank"><i class="fa fa-barcode fa-fw"></i>Label</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="even">
                                            <td class="dtr-control sorting_1" tabindex="0"><a href="?route=inventory/assets/manage&amp;id=2">IT-2</a></td>
                                            <td><span class="label" style="background-color:#FFF;color:#ff0000;border:1px solid #ff0000">Servers</span></td>
                                            <td><a href="?route=inventory/assets/manage&amp;id=2">DC Server</a></td>
                                            <td> PowerEdge R220</td>
                                            <td>ASDFG12345</td>
                                            <td>
                                                <a href="?route=clients/manage&amp;id=1">
                                                    <span class="label" style="background-color:#FFF;color:#0073b7;border:1px solid #0073b7;"><i class="fa fa-briefcase fa-fw"></i> Politeknik Pariwisata Lombok</span>
                                                </a>
                                            </td>
                                            <td><span class="badge" style="background-color:#3479da; color: white;">Deployed</span></td>
                                            <td>
                                                <div class="pull-right">
                                                    <div class="btn-group">
                                                        <a href="?route=inventory/assets/manage&amp;id=2" class="btn btn-flat btn-primary btn-sm"><i class="fa fa-eye"></i></a> <a href="?route=inventory/assets/manage&amp;id=2&amp;section=edit"
                                                           class="btn btn-flat btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-default btn-sm btn-flat dropdown-toggle" data-toggle="dropdown">
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li><a href="#" onclick="showM(&quot;?modal=assets/delete&amp;reroute=inventory/assets&amp;routeid=&amp;id=2&amp;section=&quot;);return false"><i class="fa fa-trash-o fa-fw"></i>Delete</a>
                                                                </li>
                                                                <li><a href="?route=pdf&amp;type=assetlabel&amp;id=2" target="_blank"><i class="fa fa-barcode fa-fw"></i>Label</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="odd">
                                            <td class="dtr-control sorting_1"><a href="?route=inventory/assets/manage&amp;id=3">IT-3</a></td>
                                            <td><span class="label" style="background-color:#FFF;color:#058e29;border:1px solid #058e29">Laptops</span></td>
                                            <td><a href="?route=inventory/assets/manage&amp;id=3">Laptop 1</a></td>
                                            <td> MacBook Pro</td>
                                            <td>BNMHJK98765</td>
                                            <td>
                                                <a href="?route=clients/manage&amp;id=1">
                                                    <span class="label" style="background-color:#FFF;color:#0073b7;border:1px solid #0073b7;"><i class="fa fa-briefcase fa-fw"></i> Politeknik Pariwisata Lombok</span>
                                                </a>

                                            </td>
                                            <td><span class="badge" style="background-color:#3479da; color: white;">Deployed</span></td>
                                            <td>
                                                <div class="pull-right">
                                                    <div class="btn-group">
                                                        <a href="?route=inventory/assets/manage&amp;id=3" class="btn btn-flat btn-primary btn-sm"><i class="fa fa-eye"></i></a> <a href="?route=inventory/assets/manage&amp;id=3&amp;section=edit"
                                                           class="btn btn-flat btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-default btn-sm btn-flat dropdown-toggle" data-toggle="dropdown">
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li><a href="#" onclick="showM(&quot;?modal=assets/delete&amp;reroute=inventory/assets&amp;routeid=&amp;id=3&amp;section=&quot;);return false"><i class="fa fa-trash-o fa-fw"></i>Delete</a>
                                                                </li>
                                                                <li><a href="?route=pdf&amp;type=assetlabel&amp;id=3" target="_blank"><i class="fa fa-barcode fa-fw"></i>Label</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="even">
                                            <td class="dtr-control sorting_1" tabindex="0"><a href="?route=inventory/assets/manage&amp;id=2">IT-2</a></td>
                                            <td><span class="label" style="background-color:#FFF;color:#ff0000;border:1px solid #ff0000">Servers</span></td>
                                            <td><a href="?route=inventory/assets/manage&amp;id=2">DC Server</a></td>
                                            <td> PowerEdge R220</td>
                                            <td>ASDFG12345</td>
                                            <td>
                                                <a href="?route=clients/manage&amp;id=1">
                                                    <span class="label" style="background-color:#FFF;color:#0073b7;border:1px solid #0073b7;"><i class="fa fa-briefcase fa-fw"></i> Politeknik Pariwisata Lombok</span>
                                                </a>
                                            </td>
                                            <td><span class="badge" style="background-color:#3479da; color: white;">Deployed</span></td>
                                            <td>
                                                <div class="pull-right">
                                                    <div class="btn-group">
                                                        <a href="?route=inventory/assets/manage&amp;id=2" class="btn btn-flat btn-primary btn-sm"><i class="fa fa-eye"></i></a> <a href="?route=inventory/assets/manage&amp;id=2&amp;section=edit"
                                                           class="btn btn-flat btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-default btn-sm btn-flat dropdown-toggle" data-toggle="dropdown">
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li><a href="#" onclick="showM(&quot;?modal=assets/delete&amp;reroute=inventory/assets&amp;routeid=&amp;id=2&amp;section=&quot;);return false"><i class="fa fa-trash-o fa-fw"></i>Delete</a>
                                                                </li>
                                                                <li><a href="?route=pdf&amp;type=assetlabel&amp;id=2" target="_blank"><i class="fa fa-barcode fa-fw"></i>Label</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">Tag</th>
                                            <th rowspan="1" colspan="1">Kategori</th>
                                            <th rowspan="1" colspan="1">Nama Aset</th>
                                            <th rowspan="1" colspan="1">Model</th>
                                            <th rowspan="1" colspan="1">Serial Number</th>
                                            <th rowspan="1" colspan="1">Relasi Entitas</th>
                                            <th rowspan="1" colspan="1">Status</th>
                                            <th rowspan="1" colspan="1">Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script-foot')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- script tambahan -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
