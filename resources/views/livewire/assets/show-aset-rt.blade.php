<div class="container-fluid">
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
                            <a wire:click="switchSection('penjadwalan')" href="{{ route('admin.asetrt.show', ['id' => $id, 'section' => 'penjadwalan']) }}" class="nav-link {{ $currentSection === 'penjadwalan' ? 'active' : '' }}">
                                Penjadwalan
                                <div wire:loading wire:target="switchSection('penjadwalan')" class="spinner-border spinner-border-sm">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:click="switchSection('issues')" href="{{ route('admin.asetrt.show', ['id' => $id, 'section' => 'issues']) }}" class="nav-link {{ $currentSection === 'issues' ? 'active' : '' }}">
                                Penugasan
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
                            <a wire:click="switchSection('files')" href="{{ route('admin.asetrt.show', ['id' => $id, 'section' => 'files']) }}" class="nav-link {{ $currentSection === 'files' ? 'active' : '' }}">
                                Files
                                <div wire:loading wire:target="switchSection('files')" class="spinner-border spinner-border-sm">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:click="switchSection('timelog')" href="{{ route('admin.asetrt.show', ['id' => $id, 'section' => 'timelog']) }}" class="nav-link {{ $currentSection === 'timelog' ? 'active' : '' }}">
                                Time Log
                                <div wire:loading wire:target="switchSection('timelog')" class="spinner-border spinner-border-sm">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:click="switchSection('edit')" href="{{ route('admin.asetrt.show', ['id' => $id, 'section' => 'edit']) }}" class="nav-link {{ $currentSection === 'edit' ? 'active' : '' }}">
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

                                    <!-- Notes Card -->
                                    <div class="card">
                                        <div class="card-header">Notes</div>
                                        <div class="card-body">
                                            @if (isset($asset->notes) && !empty($asset->notes))
                                                <p>{{ $asset->notes }}</p>
                                            @else
                                                <p class="text-muted">No notes available.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif ($currentSection === 'penjadwalan')
                        <div id="penjadwalan" class="tab-pane active">
                            <p>Content for Penjadwalan.</p>
                            <div class="container rounded">
                                <h2 class="mb-4 text-center">Jadwal Maintenance Kendaraan</h2>
                                <div class="table-responsive rounded">
                                    <table class="table table-hover table-bordered rounded">
                                        <thead class="rounded-top">
                                            <tr>
                                                <th scope="col">JENIS MAINTENANCE</th>
                                                <th scope="col">TANGGAL JADWAL</th>
                                                <th scope="col">STATUS</th>
                                                <th scope="col">DESKRIPSI</th>
                                                <th scope="col" class="text-center">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Ganti Oli Mesin</td>
                                                <td>30 Mei 2025</td>
                                                <td><span class="status-badge status-terjadwal">Terjadwal</span></td>
                                                <td>Penggantian oli mesin rutin.</td>
                                                <td class="text-center action-icons">
                                                    <a href="#" title="Edit"><i class="fas fa-edit"></i></a>
                                                    <a href="#" title="Hapus" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Service Tune UP</td>
                                                <td>31 Mei 2025</td>
                                                <td><span class="status-badge status-terjadwal">Terjadwal</span></td>
                                                <td>Pemeriksaan dan penyesuaian mesin.</td>
                                                <td class="text-center action-icons">
                                                    <a href="#" title="Edit"><i class="fas fa-edit"></i></a>
                                                    <a href="#" title="Hapus" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Pengecekan Rem</td>
                                                <td>05 Juni 2025</td>
                                                <td><span class="status-badge status-terjadwal">Terjadwal</span></td>
                                                <td>Inspeksi sistem pengereman.</td>
                                                <td class="text-center action-icons">
                                                    <a href="#" title="Edit"><i class="fas fa-edit"></i></a>
                                                    <a href="#" title="Hapus" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @elseif ($currentSection === 'issues')
                        <div id="issues" class="tab-pane active">
                            <p>Content for Penugasan.</p>
                            {{-- @livewire('issues.index-issues'); --}}
                        </div>
                    @elseif ($currentSection === 'section-3')
                        <div id="section-3" class="tab-pane active">
                            <h2>Section 3 Content</h2>
                            <p>Content for section 3.</p>
                        </div>
                    @elseif ($currentSection === 'files')
                        <div id="files" class="tab-pane active">
                            <h2>Files</h2>
                            <p>Content for Files.</p>
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Files</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>File Name</th>
                                                <th>File Size</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>Functional-requirements.docx</td>
                                                <td>49.8005 kb</td>
                                                <td class="text-right py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            <tr>
                                                <td>UAT.pdf</td>
                                                <td>28.4883 kb</td>
                                                <td class="text-right py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            <tr>
                                                <td>Email-from-flatbal.mln</td>
                                                <td>57.9003 kb</td>
                                                <td class="text-right py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            <tr>
                                                <td>Logo.png</td>
                                                <td>50.5190 kb</td>
                                                <td class="text-right py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            <tr>
                                                <td>Contract-10_12_2014.docx</td>
                                                <td>44.9715 kb</td>
                                                <td class="text-right py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    @elseif ($currentSection === 'timelog')
                        <div id="timelog" class="tab-pane active">
                            <h2>Time Log</h2>
                            <p>Content for Time Log.</p>
                            <div class="container-fluid">
                                <!-- Timelime example  -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- The time line -->
                                        <div class="timeline">
                                            <!-- timeline time label -->
                                            <div class="time-label">
                                                <span class="bg-red">10 Feb. 2014</span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-envelope bg-blue"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                                                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                                    <div class="timeline-body">
                                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                        quora plaxo ideeli hulu weebly balihoo...
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a class="btn btn-primary btn-sm">Read more</a>
                                                        <a class="btn btn-danger btn-sm">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-user bg-green"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                                                    <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-comments bg-yellow"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span>
                                                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                                                    <div class="timeline-body">
                                                        Take me to your leader!
                                                        Switzerland is small and neutral!
                                                        We are more like Germany, ambitious and misunderstood!
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a class="btn btn-warning btn-sm">View comment</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline time label -->
                                            <div class="time-label">
                                                <span class="bg-green">3 Jan. 2014</span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fa fa-camera bg-purple"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fas fa-clock"></i> 2 days ago</span>
                                                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                                                    <div class="timeline-body">
                                                        <img src="https://placehold.it/150x100" alt="...">
                                                        <img src="https://placehold.it/150x100" alt="...">
                                                        <img src="https://placehold.it/150x100" alt="...">
                                                        <img src="https://placehold.it/150x100" alt="...">
                                                        <img src="https://placehold.it/150x100" alt="...">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-video bg-maroon"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="fas fa-clock"></i> 5 days ago</span>

                                                    <h3 class="timeline-header"><a href="#">Mr. Doe</a> shared a video</h3>

                                                    <div class="timeline-body">
                                                        <div class="embed-responsive embed-responsive-16by9">
                                                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs" allowfullscreen></iframe>
                                                        </div>
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a href="#" class="btn btn-sm bg-maroon">See comments</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <div>
                                                <i class="fas fa-clock bg-gray"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </div>
                            <!-- /.timeline -->
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
