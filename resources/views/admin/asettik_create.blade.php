@extends('layouts.admin')

@section('title', 'Kelola Aset TIK')

@section('script-head')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')

    <section class="content-header">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header with-border">
                            <h3 class="card-title">Create New Asset</h3>
                        </div>
                        <div class="card card-body">
                            <div class="container-fluid">
                                <form class="row">
                                    <div class="col-6">
                                        <!-- Client -->
                                        <div class="form-group">
                                            <div class="row">
                                                <!-- Client -->
                                                <div class="form-group col-md-12">
                                                    <label for="client">Client</label>
                                                    <select id="client" class="form-control">
                                                        <option>None</option>
                                                    </select>
                                                </div>
                                                <!-- Asset Tag -->
                                                <div class="form-group col-md-4">
                                                    <label for="asset_tag">Asset Tag *</label>
                                                    <input type="text" class="form-control" id="asset_tag" placeholder="Asset Tag">
                                                </div>
                                                <!-- Asset Name -->
                                                <div class="form-group col-md-8">
                                                    <label for="asset_name">Asset Name *</label>
                                                    <input type="text" class="form-control" id="asset_name" placeholder="Asset Name">
                                                </div>
                                                <!-- Category -->
                                                <div class="form-group col-md-4">
                                                    <label for="category">Category *</label>
                                                    <input type="text" class="form-control" id="category" placeholder="Category">
                                                </div>
                                                <!-- Supplier -->
                                                <div class="form-group col-md-4">
                                                    <label for="supplier">Supplier</label>
                                                    <input type="text" class="form-control" id="supplier" placeholder="Supplier">
                                                </div>
                                                <!-- Location -->
                                                <div class="form-group col-md-4">
                                                    <label for="location">Location</label>
                                                    <input type="text" class="form-control" id="location" placeholder="Location">
                                                </div>
                                                <!-- Status -->
                                                <div class="form-group col-md-4">
                                                    <label for="status">Status *</label>
                                                    <select id="status" class="form-control">
                                                        <option>Requested</option>
                                                    </select>
                                                </div>
                                                <!-- Asset User -->
                                                <div class="form-group col-md-4">
                                                    <label for="asset_user">Asset User</label>
                                                    <select id="asset_user" class="form-control">
                                                        <option>None</option>
                                                    </select>
                                                </div>
                                                <!-- Asset Admin -->
                                                <div class="form-group col-md-4">
                                                    <label for="asset_admin">Asset Admin</label>
                                                    <select id="asset_admin" class="form-control">
                                                        <option>None</option>
                                                    </select>
                                                </div>
                                                <!-- Manufacturer -->
                                                <div class="form-group col-md-6">
                                                    <label for="manufacturer">Manufacturer</label>
                                                    <input type="text" class="form-control" id="manufacturer" placeholder="Manufacturer">
                                                </div>
                                                <!-- Model -->
                                                <div class="form-group col-md-6">
                                                    <label for="model">Model</label>
                                                    <input type="text" class="form-control" id="model" placeholder="Model">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <!-- Purchase Date -->
                                            <div class="form-group col-md-6">
                                                <label for="purchase_date">Purchase Date</label>
                                                <input type="text" class="form-control" id="purchase_date" placeholder="Select date">
                                            </div>
                                            <!-- Warranty -->
                                            <div class="form-group col-md-6">
                                                <label for="warranty">Warranty</label>
                                                <input type="text" class="form-control" id="warranty" placeholder="months">
                                            </div>
                                            <!-- Serial Number -->
                                            <div class="form-group col-md-12">
                                                <label for="serial_number">Serial Number</label>
                                                <input type="text" class="form-control" id="serial_number" placeholder="Serial Number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row-12">
                                            <!-- Notes -->
                                            <div class="form-group">
                                                <label for="notes">Notes</label>
                                                <textarea id="notes" class="form-control" rows="5" placeholder="Write notes here..."></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>

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
