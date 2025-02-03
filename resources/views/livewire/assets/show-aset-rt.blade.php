<div class="container-md">
    <section class="content-header">
        <div class="d-flex justify-content-end mb-1">
            <a href="{{ route('admin.asetrt') }}" type="button" class="btn btn-primary"><i class="fa-solid fa-angles-left"></i> Kembali</a>
            {{-- <button wire:click="$dispatch('showModalCreate')" type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</button> --}}
        </div>
    </section>

    {{-- Content Section --}}
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="col-md-12">
                    {{-- Navigation Tabs --}}
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a wire:click="switchSection('')" href="{{ route('admin.asetrt.show', ['id' => $id, 'section' => '']) }}" class="nav-link {{ $currentSection === '' ? 'active' : '' }}">
                                Summary
                                <div wire:loading wire:target="switchSection('')" class="spinner-border spinner-border-sm">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:click="switchSection('issues')" href="{{ route('admin.asetrt.show', ['id' => $id, 'section' => 'issues']) }}" class="nav-link {{ $currentSection === 'issues' ? 'active' : '' }}">
                                Issues
                                <div wire:loading wire:target="switchSection('issues')" class="spinner-border spinner-border-sm">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:click="switchSection('section-3')" href="{{ route('admin.asetrt.show', ['id' => $id, 'section' => 'section-3']) }}" class="nav-link {{ $currentSection === 'section-3' ? 'active' : '' }}">
                                Tickets
                                <div wire:loading wire:target="switchSection('section-3')" class="spinner-border spinner-border-sm">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:click="switchSection('section-4')" href="{{ route('admin.asetrt.show', ['id' => $id, 'section' => 'section-4']) }}" class="nav-link {{ $currentSection === 'section-4' ? 'active' : '' }}">
                                Files
                                <div wire:loading wire:target="switchSection('section-4')" class="spinner-border spinner-border-sm">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:click="switchSection('section-5')" href="{{ route('admin.asetrt.show', ['id' => $id, 'section' => 'section-5']) }}" class="nav-link {{ $currentSection === 'section-5' ? 'active' : '' }}">
                                Time Log
                                <div wire:loading wire:target="switchSection('section-5')" class="spinner-border spinner-border-sm">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  wire:click="switchSection('edit')" href="{{ route('admin.asetrt.show', ['id' => $id, 'section' => 'edit']) }}" class="nav-link {{ $currentSection === 'edit' ? 'active' : '' }}">
                                Edit Aset
                                <div wire:loading wire:target="switchSection('edit')" class="spinner-border spinner-border-sm">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </a>
                        </li>
                        <li class="col d-flex justify-content-end">
                            <button class="btn btn-sm btn-outline-primary me-2">+ New Issue</button>
                            <button class="btn btn-sm btn-outline-info">Log Time</button>
                            <div class="dropdown">
                                <button class="btn btn-light btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                                    More
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action 1</a></li>
                                    <li><a class="dropdown-item" href="#">Action 2</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card-body">
                {{-- loading screen --}}
                {{-- <div class="d-flex justify-content-center">
                    <div wire:loading wire:target="switchSection" class="spinner-border spinner-border-sm">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div> --}}

                <div class="tab-content">
                    @if ($currentSection === '')
                        <div id="section-1" class="tab-pane active">
                            <div class="row mt-3">
                                <!-- Left Column -->
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table table-striped table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Status</strong></td>
                                                        <td><span class="badge bg-primary">{{ $asset->status->name }}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Tag:</strong></td>
                                                        <td>{{ $asset->tag }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Name:</strong></td>
                                                        <td>{{ $asset->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Category:</strong></td>
                                                        <td><span class="badge bg-info text-dark">{{ $asset->category->name }}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Location:</strong></td>
                                                        <td>{{ $asset->location->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Manufacturer:</strong></td>
                                                        <td>{{ $asset->manufacturer->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Model:</strong></td>
                                                        <td>{{ $asset->model->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Supplier:</strong></td>
                                                        <td>{{ $asset->supplier->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Serial Number:</strong></td>
                                                        <td>{{ $asset->serial }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Asset Admin:</strong></td>
                                                        <td>{{ $asset->admin->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Asset User:</strong></td>
                                                        <td>{{ $asset->user->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Purchase Date:</strong></td>
                                                        <td>{{ $asset->purchase_date }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Warranty (months):</strong></td>
                                                        <td>{{ $asset->warranty_months }} bulan</td>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="col-md-8">
                                    <!-- Credentials Card -->
                                    <div class="card mb-3">
                                        <div class="card-header">Credentials</div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Type</th>
                                                        <th>Username</th>
                                                        <th>Password</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="3" class="text-center">There are no credentials to display.</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- Assigned Licenses Card -->
                                    <div class="card mb-3">
                                        <div class="card-header">Assigned Licenses</div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Tag</th>
                                                        <th>Category</th>
                                                        <th>Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>ITL-3</td>
                                                        <td>Operating Systems</td>
                                                        <td>Windows Server 2012 R2 Essentials</td>
                                                        <td><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>ITL-2</td>
                                                        <td>Operating Systems</td>
                                                        <td>Office Home & Business 2016</td>
                                                        <td><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- Notes Card -->
                                    <div class="card">
                                        <div class="card-header">Notes</div>
                                        <div class="card-body">
                                            <p class="text-muted">No notes available.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif ($currentSection === 'issues')
                        <div id="issues" class="tab-pane active">
                            <p>Content for issues.</p>
                            {{-- @livewire('issues.index-issues'); --}}
                        </div>
                    @elseif ($currentSection === 'section-3')
                        <div id="section-3" class="tab-pane active">
                            <h2>Section 3 Content</h2>
                            <p>Content for section 3.</p>
                        </div>
                    @elseif ($currentSection === 'section-4')
                        <div id="section-4" class="tab-pane active">
                            <h2>Section 4 Content</h2>
                            <p>Content for section 4.</p>
                        </div>
                    @elseif ($currentSection === 'section-5')
                        <div id="section-5" class="tab-pane active">
                            <h2>Section 5 Content</h2>
                            <p>Content for section 5.</p>
                        </div>
                    @elseif ($currentSection === 'edit')
                    <div id="edit" class="tab-pane active">
                        <!-- Komponen EditAsetRt -->
                        @livewire('assets.edit-aset-rt', ['id' => $asset->id, 'section' => $currentSection])
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>

@push('script')
    <script></script>
@endpush
