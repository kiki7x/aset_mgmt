@extends('layouts.admin')

@section('title', 'Selamat Datang')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="table-responsive">
                                <div id="dataTablesFull_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                    <div class="top">
                                        <div id="dataTablesFull_filter" class="dataTables_filter"><label><i class="fa fa-search text-gray dTsearch"></i><input type="search" class="form-control input-sm" placeholder="" aria-controls="dataTablesFull"></label></div>
                                    </div>
                                    <table id="dataTablesFull" class="table table-striped table-hover table-bordered dataTable no-footer" role="grid" aria-describedby="dataTablesFull_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="dataTablesFull" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Tag: activate to sort column descending" style="width: 47.2px;">Tag</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTablesFull" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 94.2px;">Category</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTablesFull" rowspan="1" colspan="1" aria-label="Asset Name: activate to sort column ascending" style="width: 118.2px;">Asset Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTablesFull" rowspan="1" colspan="1" aria-label="Model: activate to sort column ascending" style="width: 127.2px;">Model</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTablesFull" rowspan="1" colspan="1" aria-label="Serial Number: activate to sort column ascending" style="width: 141.2px;">Serial Number</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTablesFull" rowspan="1" colspan="1" aria-label="Related Entities: activate to sort column ascending" style="width: 222.2px;">Related Entities</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTablesFull" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 75.2px;">Status</th>
                                                <th class="text-right sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 141px;"></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"><a href="?route=inventory/assets/manage&amp;id=1">IT-1</a></td>
                                                <td><span class="label" style="background-color:#FFF;color:#1e3fda;border:1px solid #1e3fda">Desktops</span></td>
                                                <td><a href="?route=inventory/assets/manage&amp;id=1">Desktop 1</a></td>
                                                <td> Optiplex 3020 MT</td>
                                                <td>QWERT12345</td>
                                                <td>
                                                    <a href="?route=clients/manage&amp;id=1">
                                                        <span class="label" style="background-color:#FFF;color:#0073b7;border:1px solid #0073b7;"><i class="fa fa-briefcase fa-fw"></i> Politeknik Pariwisata Lombok</span>
                                                    </a>

                                                </td>

                                                <td><span class="badge" style="background-color:#3479da">Deployed</span></td>
                                                <td>
                                                    <div class="pull-right">
                                                        <div class="btn-group">
                                                            <a href="?route=inventory/assets/manage&amp;id=1" class="btn btn-flat btn-primary btn-sm"><i class="fa fa-eye"></i></a> <a href="?route=inventory/assets/manage&amp;id=1&amp;section=edit"
                                                               class="btn btn-flat btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-default btn-sm btn-flat dropdown-toggle" data-toggle="dropdown">
                                                                    <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu pull-right">
                                                                    <li><a href="#" onclick="showM(&quot;?modal=assets/delete&amp;reroute=inventory/assets&amp;routeid=&amp;id=1&amp;section=&quot;);return false"><i
                                                                               class="fa fa-trash-o fa-fw"></i>Delete</a>
                                                                    </li>
                                                                    <li><a href="?route=pdf&amp;type=assetlabel&amp;id=1" target="_blank"><i class="fa fa-barcode fa-fw"></i>Label</a></li>
                                                                </ul>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1"><a href="?route=inventory/assets/manage&amp;id=2">IT-2</a></td>
                                                <td><span class="label" style="background-color:#FFF;color:#ff0000;border:1px solid #ff0000">Servers</span></td>
                                                <td><a href="?route=inventory/assets/manage&amp;id=2">DC Server</a></td>
                                                <td> PowerEdge R220</td>
                                                <td>ASDFG12345</td>
                                                <td>
                                                    <a href="?route=clients/manage&amp;id=1">
                                                        <span class="label" style="background-color:#FFF;color:#0073b7;border:1px solid #0073b7;"><i class="fa fa-briefcase fa-fw"></i> Politeknik Pariwisata Lombok</span>
                                                    </a>

                                                </td>

                                                <td><span class="badge" style="background-color:#3479da">Deployed</span></td>
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
                                                                    <li><a href="#" onclick="showM(&quot;?modal=assets/delete&amp;reroute=inventory/assets&amp;routeid=&amp;id=2&amp;section=&quot;);return false"><i
                                                                               class="fa fa-trash-o fa-fw"></i>Delete</a>
                                                                    </li>
                                                                    <li><a href="?route=pdf&amp;type=assetlabel&amp;id=2" target="_blank"><i class="fa fa-barcode fa-fw"></i>Label</a></li>
                                                                </ul>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"><a href="?route=inventory/assets/manage&amp;id=3">IT-3</a></td>
                                                <td><span class="label" style="background-color:#FFF;color:#058e29;border:1px solid #058e29">Laptops</span></td>
                                                <td><a href="?route=inventory/assets/manage&amp;id=3">Laptop 1</a></td>
                                                <td> MacBook Pro</td>
                                                <td>BNMHJK98765</td>
                                                <td>
                                                    <a href="?route=clients/manage&amp;id=1">
                                                        <span class="label" style="background-color:#FFF;color:#0073b7;border:1px solid #0073b7;"><i class="fa fa-briefcase fa-fw"></i> Politeknik Pariwisata Lombok</span>
                                                    </a>

                                                </td>

                                                <td><span class="badge" style="background-color:#3479da">Deployed</span></td>
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
                                                                    <li><a href="#" onclick="showM(&quot;?modal=assets/delete&amp;reroute=inventory/assets&amp;routeid=&amp;id=3&amp;section=&quot;);return false"><i
                                                                               class="fa fa-trash-o fa-fw"></i>Delete</a>
                                                                    </li>
                                                                    <li><a href="?route=pdf&amp;type=assetlabel&amp;id=3" target="_blank"><i class="fa fa-barcode fa-fw"></i>Label</a></li>
                                                                </ul>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="bottom"></div>
                                    <div class="row dt-margin">
                                        <div class="col-md-6">
                                            <div class="dataTables_info" id="dataTablesFull_info" role="status" aria-live="polite">Showing 1 to 3 of 3 entries</div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="dataTables_paginate paging_simple_numbers" id="dataTablesFull_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button previous disabled" id="dataTablesFull_previous"><a href="#" aria-controls="dataTablesFull" data-dt-idx="0" tabindex="0">Previous</a></li>
                                                    <li class="paginate_button active"><a href="#" aria-controls="dataTablesFull" data-dt-idx="1" tabindex="0">1</a></li>
                                                    <li class="paginate_button next disabled" id="dataTablesFull_next"><a href="#" aria-controls="dataTablesFull" data-dt-idx="2" tabindex="0">Next</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="dt-buttons btn-group"><a class="btn btn-default buttons-copy buttons-html5" tabindex="0" aria-controls="dataTablesFull" href="#"><span>Copy</span></a><a
                                                   class="btn btn-default buttons-csv buttons-html5" tabindex="0" aria-controls="dataTablesFull" href="#"><span>CSV</span></a><a class="btn btn-default buttons-excel buttons-html5" tabindex="0"
                                                   aria-controls="dataTablesFull" href="#"><span>Excel</span></a><a class="btn btn-default buttons-pdf buttons-html5" tabindex="0" aria-controls="dataTablesFull" href="#"><span>PDF</span></a><a
                                                   class="btn btn-default buttons-print" tabindex="0" aria-controls="dataTablesFull" href="#"><span>Print</span></a></div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
