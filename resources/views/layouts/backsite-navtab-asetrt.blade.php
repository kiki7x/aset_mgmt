@extends('layouts.backsite', [
    'title' => 'Show Aset RT | SAPA PPL',
    'welcome' => 'Detail Aset RT',
    'breadcrumb' => 'Detail Aset RT',
])
@section('content')
    <div class="container-fluid">
        <section class="content-header">
        </section>

        {{-- Content Section --}}
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-12">
                        {{-- Navigation Tabs --}}
                        <ul class="nav nav-tabs card-header-tabs" id="assetTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.asetrt.overview') ? 'active' : '' }}" id="overview-tab" href="{{ route('admin.asetrt.overview', $id) }}" role="tab" aria-controls="overview" aria-selected="false"
                                   data-url="{{ route('admin.asetrt.overview', $id) }}">
                                    Overview
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.asetrt.pemeliharaan') ? 'active' : '' }}" id="pemeliharaan-tab" href="{{ route('admin.asetrt.pemeliharaan', $id) }}" role="tab" aria-controls="pemeliharaan" aria-selected="false">
                                    Pemeliharaan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.asetrt.penugasan') ? 'active' : '' }}" id="issues-tab" href="{{ route('admin.asetrt.penugasan', $id) }}" role="tab" aria-controls="issues" aria-selected="false">
                                    Penugasan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.asetrt.tickets') ? 'active' : '' }}" id="tickets-tab" href="{{ route('admin.asetrt.tickets', $id) }}" role="tab" aria-controls="tickets" aria-selected="false">
                                    Tickets
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.asetrt.files') ? 'active' : '' }}" id="files-tab" href="{{ route('admin.asetrt.files', $id) }}" role="tab" aria-controls="files" aria-selected="false">
                                    Files
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.asetrt.timelog') ? 'active' : '' }}" id="timelog-tab" href="{{ route('admin.asetrt.timelog', $id) }}" role="tab" aria-controls="timelog" aria-selected="false">
                                    Time Log
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.asetrt.edit') ? 'active' : '' }}" id="edit-tab" href="{{ route('admin.asetrt.edit', $id) }}" role="tab" aria-controls="edit" aria-selected="false">
                                    Edit Aset
                                </a>
                            </li>
                            <li class="col d-flex justify-content-end">
                                <div>
                                    <a href="{{route('admin.asetrt')}}" type="button" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- tampilan tab dinamis --}}
                <div class="card-body">
                    @yield('content-tab')
                </div>

            </div>
        </section>
    </div>
@endsection

@section('script-foot')
@stack('script-foot')

@endsection
