<div>
    {{-- The whole world belongs to you. --}}
    <div class="container mt-4">
        <!-- Tabs -->
        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <a class="nav-link active" href="#">Summary</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Issues</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Tickets</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Files</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Time Log</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Edit Asset</a>
            </li>
        </ul>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <button class="btn btn-primary me-2">New Issue</button>
                <button class="btn btn-secondary">Log Time</button>
            </div>
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    More
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action 1</a></li>
                    <li><a class="dropdown-item" href="#">Action 2</a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <!-- Left Column -->
            <div class="col-md-4">
                <!-- Status Card -->
                <div class="card mb-3">
                    <div class="card-body">
                        <h6 class="card-title">Status</h6>
                        <span class="badge bg-primary">Deployed</span>
                    </div>
                </div>

                <!-- Details Card -->
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Details</h6>
                        <p class="mb-1"><strong>Tag:</strong> IT-1</p>
                        <p class="mb-1"><strong>Name:</strong> Desktop 1</p>
                        <p class="mb-1"><strong>Category:</strong> <span class="badge bg-info text-dark">Desktops</span></p>
                        <p class="mb-1"><strong>Location:</strong> Client Inc.</p>
                        <p class="mb-1"><strong>Manufacturer:</strong> Dell</p>
                        <p class="mb-1"><strong>Model:</strong> Optiplex 3020 MT</p>
                        <p class="mb-1"><strong>Supplier:</strong> Amazon</p>
                        <p class="mb-1"><strong>Serial Number:</strong> QWERT12345</p>
                        <p class="mb-1"><strong>Asset Admin:</strong> John Doe</p>
                        <p class="mb-1"><strong>Asset User:</strong> Jane Smith</p>
                        <p class="mb-1"><strong>Purchase Date:</strong> 2016-02-01</p>
                        <p class="mb-1"><strong>Warranty (months):</strong> 24</p>
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
                                    <td><button class="btn btn-danger btn-sm">Delete</button></td>
                                </tr>
                                <tr>
                                    <td>ITL-2</td>
                                    <td>Operating Systems</td>
                                    <td>Office Home & Business 2016</td>
                                    <td><button class="btn btn-danger btn-sm">Delete</button></td>
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
</div>
