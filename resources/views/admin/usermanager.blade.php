@extends('layouts.backsite', [
    'title' => 'User Manager | SAPA PPL',
    'welcome' => 'Manajemen Pengguna',
    'breadcrumb' => 'User Manager',
])


@section('content')
    <div class="container-fluid">
        <div class="card rounded-3 shadow-sm">
            <div class="card-header rounded-top-3">
                <h5 class="mb-0 py-2 fw-semibold">Cari Pengguna <i class="fa-solid fa-magnifying-glass"></i></h5>
            </div>
            <div class="card-body">
                <form id="filterForm" method="GET" action="{{ route('admin.usermanager') }}">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control rounded-2" id="username" name="username" value="{{ $filterUsername ?? '' }}" placeholder="Cari berdasarkan username...">
                        </div>
                        <div class="col-md-3">
                            <label for="fullname" class="form-label">Nama</label>
                            <input type="text" class="form-control rounded-2" id="fullname" name="fullname" value="{{ $filterFullname ?? '' }}" placeholder="Cari berdasarkan nama...">
                        </div>
                        <div class="col-md-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control rounded-2" id="email" name="email" value="{{ $filterEmail ?? '' }}" placeholder="Cari berdasarkan email...">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mt-4 rounded-3 shadow-sm">
            <div class="card-header rounded-top-3">
                <h5 class="mb-0 py-2 fw-semibold">Daftar Pengguna</h5>
            </div>
            <div class="card-body p-0 table-container">
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="ps-3">ID</th>
                                <th scope="col">Username</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Email</th>
                                <th scope="col">Tanggal Registrasi</th>
                            </tr>
                        </thead>

                        <tbody id="usersTableBody">
                            {{-- Data pengguna akan dimuat di sini oleh AJAX --}}
                            {{-- @forelse ($users as $user)
                                <tr>
                                    <td class="ps-3">{{ $user->id }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->fullname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('d M Y, H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4">
                                        <p class="mb-0 text-muted">Tidak ada data pengguna yang ditemukan.</p>
                                        @if (request()->hasAny(['username', 'fullname', 'email', 'registration_date']))
                                            <a href="{{ route('admin.usermanager') }}" class="btn btn-outline-secondary btn-sm mt-2 rounded-2">Reset Filter</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforelse --}}
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="loading-overlay d-none">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            {{-- @if ($users->hasPages())
                <div class="card-footer bg-white border-top-0 rounded-bottom-3">
                    <div class="d-flex justify-content-center">
                        {{ $users->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            @endif --}}
            <div class="card-footer bg-white border-top-0 rounded-bottom-3">
                <div id="paginationLinks" class="d-flex justify-content-center">
                    {{-- Link paginasi akan dimuat di sini oleh AJAX --}}
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row">
                @forelse ($users as $user)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                __Digital Strategist__
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b>{{ $user->username }}</b></h2>
                                        <p class="text-muted text-sm"><b>About: </b> {{ $user->title }} </p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{ $user->address }}</li>
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {{ $user->mobile }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src="{{ asset('arsha\assets\img\team\team-1.jpg') }}" alt="user-avatar" class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="#" class="btn btn-sm bg-teal" data-toggle="tooltip" data-placement="top" title="Coming soon...">
                                        <i class="fas fa-comments"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> View Profile
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div>
                        <p class="mb-0 text-muted">Tidak ada data pengguna yang ditemukan.</p>
                        @if (request()->hasAny(['username', 'fullname', 'email']))
                            <a href="{{ route('admin.usermanager') }}" class="btn btn-outline-secondary btn-sm mt-2 rounded-2">Reset Filter</a>
                        @endif
                @endforelse
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
                @if ($users->hasPages())
                    <div class="d-flex justify-content-center">
    {{ $users->links('pagination::bootstrap-5') }}
    </div>
    @endif
    </ul>
    </nav>
    </div> <!-- /.card-footer -->
    </div><!-- /.card -->
    --}}
@endsection

@section('script-foot')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // $(document).ready(function() {
        //     // Fungsi untuk debounce, agar tidak mengirim request setiap kali user mengetik
        //     function debounce(func, delay) {
        //         let timeout;
        //         return function() {
        //             const context = this;
        //             const args = arguments;
        //             clearTimeout(timeout);
        //             timeout = setTimeout(() => func.apply(context, args), delay);
        //         };
        //     }

        //     // Submit form secara otomatis ketika input filter berubah (dengan debounce)
        //     // Untuk input text dan email, kita tunggu 500ms setelah user berhenti mengetik
        //     $('#username, #fullname, #email').on('keyup', debounce(function() {
        //         $('#filterForm').submit();
        //     }, 500));
        // });

        $(document).ready(function() {
            const fetchUsersUrl = @json(route('api.users.fetch'));
            let currentPage = 1;

            function loadUsers(page = 1, url = null) {
                if (!fetchUsersUrl || typeof fetchUsersUrl !== 'string') {
                    console.error("Error: fetchUserUrl tidak valid atau tidak terdefinisi.", fetchUsersUrl);
                    $('#usersTableBody').empty().append(`
                    <tr>
                        <td colspan="4" class="text-center py-4 text-danger">
                            <p> Konfigurasi URL API tidak Valid. silakan periksa konsol.
                        </td>
                    </tr>
                    `);
                    $('.loading-overlay').addClass('d-none');
                    return;
                }

                const filterData = $('#filterForm').serialize();
                let requestUrl = url;
                if (!requestUrl) {
                    const params = new URLSearchParams(filterData);
                    requestUrl = `${fetchUsersUrl}?${params.toString()}`;
                } else {
                    // Jika URL sudah ada (dari paginasi), pastikan parameter filter dari form juga disertakan
                    // jika tidak, filter akan hilang saat berpindah halaman.
                    // Namun, paginator Laravel (dengan withQueryString) seharusnya sudah menangani ini di URL paginasi.
                    // Jadi, kita bisa langsung menggunakan URL dari paginasi.
                }

                $('.loading-overlay').removeClass('d-none');
                $('#usersTableBody').empty();
                $('#paginationLinks').empty();

                $.ajax({
                    url: requestUrl,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        const usersTableBody = $('#usersTableBody');
                        usersTableBody.empty();

                        if (response.data && response.data.length > 0) {
                            response.data.forEach(function(user) {
                                let registrationDate = new Date(user.created_at).toLocaleString('id-ID', {
                                    day: '2-digit',
                                    month: 'short',
                                    year: 'numeric',
                                    hour: '2-digit',
                                    minute: '2-digit'
                                });
                                usersTableBody.append(`
                                <tr>
                                    <td>${user.id}</td>
                                    <td>${user.username}</td>
                                    <td>${user.fullname}</td>
                                    <td>${user.email}</td>
                                    <td>${user.created_at}</td>
                                </tr>
                                `);
                            });
                        } else {
                            usersTableBody.append(`
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <p class="text-danger text-muted">Tidak ada data pengguna yang ditemukan.</p>
                                        <button type="button" id="resetFilterBtn" class="btn btn-outline-secondary btn-sm mt-2 rounded-2">Reset Filter</button>
                                    </td>
                                </tr>
                                `)
                        }

                        $('#paginationLinks').html(response.links);
                        currentPage = response.current_page;

                        if (response.total > 0) {
                            $('#userCountInfo').text(`Menampilkan ${response.from} - ${response.to} dari ${response.total} pengguna`);
                        } else {
                            $('#userCountInfo').text('Tidak ada pengguna');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching users:", status, error, xhr.responseText);
                        let errorMessage = "Gagal memuat data pengguna. Silakan coba lagi.";
                        if (xhr.status === 404) {
                            errorMessage = "Endpoint API tidak ditemukan (404). Pastikan URL benar.";
                        } else if (xhr.status === 500) {
                            errorMessage = "Terjadi kesalahan di server (500).";
                        }
                        $('#usersTableBody').append(`
                                <tr>
                                    <td colspan="5" class="text-center text-danger">
                                        ${errorMessage} (Error: ${status})
                                    </td>
                                </tr>
                            `);
                    },
                    complete: function() {
                        $('.loading-overlay').addClass('d-none');
                    }
                });
            }

            function debounce(func, delay) {
                let timeout;
                return function() {
                    const context = this;
                    const args = arguments;
                    clearTimeout(timeout);
                    timeout = setTimeout(() => func.apply(context, args), delay);
                };
            }

            $('#username, #fullname, #email').on('keyup', debounce(function() {
                loadUsers(1);
            }, 500));

            // Event listener untuk input tanggal dihapus
            // $('#registration_date').on('change', function() {
            //     loadUsers(1);
            // });

            $('#applyFilterBtn').on('click', function() {
                loadUsers(1);
            });

            $(document).on('click', '#resetFilterBtn', function() {
                $('#filterForm')[0].reset();
                loadUsers(1);
            });

            $(document).on('click', '#paginationLinks .pagination a', function(event) {
                event.preventDefault();
                const href = $(this).attr('href');
                if (href) {
                    loadUsers(null, href);
                }
            });

            if (fetchUsersUrl && typeof fetchUsersUrl === 'string') {
                loadUsers(currentPage);
            } else {
                console.error("Initial Load Error: fetchUsersUrl tidak valid.", fetchUsersUrl);
                $('#usersTableBody').empty().append(`
                        <tr>
                            <td colspan="5" class="text-center text-danger">
                                Konfigurasi URL API awal tidak valid. Periksa konsol.
                            </td>
                        </tr>
                        `);
                $('.loading-overlay').addClass('d-none');
            }
        });
    </script>
@endsection
