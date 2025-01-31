<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <!-- Add this in the head section -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>
        Argon Dashboard 3 by Creative Tim
    </title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.1.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-dark position-absolute w-100"></div>
    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
                target="_blank">
                <img src="../assets/img/logo-ct-dark.png" width="26px" height="26px" class="navbar-brand-img h-100"
                    alt="main_logo">
                <span class="ms-1 font-weight-bold">Creative Tim</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " href="/dashboard">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active   " href="/manajemen-barang">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Manajemen Barang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/pembayaran">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-credit-card text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pembayaran</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/manajemen-penyewaan">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-app text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Manajemen Penyewaan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/manajemen-pengguna">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-world-2 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Manajemen Pengguna</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="laporan">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-world-2 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Laporan & Analisis</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="pengaturan">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-world-2 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pengaturan Sistem</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link border-0 bg-transparent">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-single-copy-04 text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>

    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">

                    <h6 class="font-weight-bolder text-white mb-0">Manajemen Barang</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Type here...">
                        </div>
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">Sign In</span>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0">
                                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <!-- Manajemen Handphone -->
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Manajemen Handphone</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                data-bs-target="#tambahHandphoneModal">Tambah Handphone</a>
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Merek</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            OS</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            RAM</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Storage</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Harga Sewa</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($handphone as $h)
                                        <tr>
                                            <td class="align-middle">
                                                <div class="d-flex px-3">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $h->nama }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle px-3">
                                                <span class="text-sm font-weight-bold">{{ $h->merek }}</span>
                                            </td>
                                            <td class="align-middle px-3">
                                                <span class="text-sm">{{ $h->os }}</span>
                                            </td>
                                            <td class="align-middle px-3">
                                                <span class="text-sm">{{ $h->ram }}</span>
                                            </td>
                                            <td class="align-middle px-3">
                                                <span class="text-sm">{{ $h->storage }}</span>
                                            </td>
                                            <td class="align-middle px-3">
                                                <span class="text-sm">Rp
                                                    {{ number_format($h->harga_sewa, 0, ',', '.') }}/Bln</span>
                                            </td>
                                            <td class="align-middle px-3">
                                                <span
                                                    class="badge badge-sm bg-{{ $h->status == 'Tersedia' ? 'success' : 'danger' }}">{{ $h->status }}</span>
                                            </td>
                                            <td class="align-middle px-3">
                                                <button class="btn btn-info btn-sm"
                                                    onclick="showEditModal({{ $h->id }}, '{{ $h->nama }}', '{{ $h->merek }}', '{{ $h->os }}', '{{ $h->ram }}', '{{ $h->storage }}', '{{ $h->harga_sewa }}', '{{ $h->status }}')">Edit</button>
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="confirmDelete('handphone', {{ $h->id }})">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Manajemen Laptop -->
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Manajemen Laptop</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                data-bs-target="#tambahLaptopModal">Tambah Laptop</a>
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Merek</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Kategori</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            OS</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            RAM</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Storage</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Harga Sewa</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laptop as $l)
                                        <tr>
                                            <td class="align-middle">
                                                <div class="d-flex px-3">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $l->nama }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle px-3">
                                                <span class="text-sm font-weight-bold">{{ $l->merek }}</span>
                                            </td>
                                            <td class="align-middle px-3">
                                                <span class="text-sm font-weight-bold">{{ $l->kategori }}</span>
                                            </td>
                                            <td class="align-middle px-3">
                                                <span class="text-sm">{{ $l->os }}</span>
                                            </td>
                                            <td class="align-middle px-3">
                                                <span class="text-sm">{{ $l->ram }}</span>
                                            </td>
                                            <td class="align-middle px-3">
                                                <span class="text-sm">{{ $l->storage }}</span>
                                            </td>
                                            <td class="align-middle px-3">
                                                <span class="text-sm">Rp
                                                    {{ number_format($l->harga_sewa, 0, ',', '.') }}/Bln</span>
                                            </td>
                                            <td class="align-middle px-3">
                                                <span
                                                    class="badge badge-sm bg-{{ $l->status == 'Tersedia' ? 'success' : 'danger' }}">{{ $l->status }}</span>
                                            </td>
                                            <td class="align-middle px-3">
                                                <button class="btn btn-info btn-sm"
                                                    onclick="showEditLaptopModal({{ $l->id }}, '{{ $l->nama }}', '{{ $l->merek }}', '{{ $l->kategori }}', '{{ $l->os }}', '{{ $l->ram }}', '{{ $l->storage }}', '{{ $l->harga_sewa }}', '{{ $l->status }}')">Edit</button>
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="confirmDelete('laptop', {{ $l->id }})">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Edit -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editForm">
                                @csrf
                                <input type="hidden" id="editId">
                                <div class="mb-3">
                                    <label for="editNama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="editNama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editMerek" class="form-label">Merek</label>
                                    <input type="text" class="form-control" id="editMerek" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editOs" class="form-label">OS</label>
                                    <input type="text" class="form-control" id="editOs">
                                </div>
                                <div class="mb-3">
                                    <label for="editRam" class="form-label">RAM</label>
                                    <input type="text" class="form-control" id="editRam">
                                </div>
                                <div class="mb-3">
                                    <label for="editStorage" class="form-label">Storage</label>
                                    <input type="text" class="form-control" id="editStorage">
                                </div>
                                <div class="mb-3">
                                    <label for="editHargaSewa" class="form-label">Harga Sewa</label>
                                    <input type="number" class="form-control" id="editHargaSewa">
                                </div>
                                <div class="mb-3">
                                    <label for="editStatus" class="form-label">Status</label>
                                    <select id="editStatus" class="form-control">
                                        <option value="Tersedia">Tersedia</option>
                                        <option value="Tidak Tersedia">Tidak Tersedia</option>
                                    </select>
                                </div>
                                <button type="button" class="btn btn-primary" onclick="updateData()">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Edit Laptop -->
            <div class="modal fade" id="editLaptopModal" tabindex="-1" aria-labelledby="editLaptopModalLabel"
                aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editLaptopModalLabel">Edit Laptop</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editLaptopForm">
                                @csrf
                                <input type="hidden" id="editLaptopId">
                                <div class="mb-3">
                                    <label for="editNama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="editLaptopNama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editMerek" class="form-label">Merek</label>
                                    <input type="text" class="form-control" id="editLaptopMerek" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editKategori" class="form-label">Kategori</label>
                                    <input type="text" class="form-control" id="editLaptopKategori" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editOs" class="form-label">OS</label>
                                    <input type="text" class="form-control" id="editLaptopOs">
                                </div>
                                <div class="mb-3">
                                    <label for="editRam" class="form-label">RAM</label>
                                    <input type="text" class="form-control" id="editLaptopRam">
                                </div>
                                <div class="mb-3">
                                    <label for="editStorage" class="form-label">Storage</label>
                                    <input type="text" class="form-control" id="editLaptopStorage">
                                </div>
                                <div class="mb-3">
                                    <label for="editHargaSewa" class="form-label">Harga Sewa</label>
                                    <input type="number" class="form-control" id="editLaptopHargaSewa">
                                </div>
                                <div class="mb-3">
                                    <label for="editStatus" class="form-label">Status</label>
                                    <select id="editLaptopStatus" class="form-control">
                                        <option value="Tersedia">Tersedia</option>
                                        <option value="Tidak Tersedia">Tidak Tersedia</option>
                                    </select>
                                </div>
                                <button type="button" class="btn btn-primary"
                                    onclick="updateLaptopData()">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Tambah Laptop -->
            <div class="modal fade" id="tambahLaptopModal" tabindex="-1" aria-labelledby="tambahLaptopModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahLaptopModalLabel">Tambah Laptop</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="tambahLaptopForm">
                                @csrf
                                <div class="mb-3">
                                    <label for="tambahNama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="tambahNama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tambahMerek" class="form-label">Merek</label>
                                    <input type="text" class="form-control" id="tambahMerek" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tambahKategori" class="form-label">Kategori</label>
                                    <select id="tambahKategori" class="form-control">
                                        <option value="Gaming">Gaming</option>
                                        <option value="Workstation">Workstation</option>
                                        <option value="Ultrabook">Ultrabook</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tambahOs" class="form-label">OS</label>
                                    <select id="tambahOs" class="form-control">
                                        <option value="Windows">Windows</option>
                                        <option value="MacOS">MacOS</option>
                                        <option value="Linux">Linux</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tambahRam" class="form-label">RAM</label>
                                    <select id="tambahRam" class="form-control">
                                        <option value="4GB">4GB</option>
                                        <option value="8GB">8GB</option>
                                        <option value="16GB">16GB</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tambahStorage" class="form-label">Storage</label>
                                    <select id="tambahStorage" class="form-control">
                                        <option value="256GB">256GB</option>
                                        <option value="512GB">512GB</option>
                                        <option value="1TB">1TB</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tambahHargaSewa" class="form-label">Harga Sewa</label>
                                    <input type="number" class="form-control" id="tambahHargaSewa">
                                </div>
                                <div class="mb-3">
                                    <label for="tambahStatus" class="form-label">Status</label>
                                    <select id="tambahStatus" class="form-control">
                                        <option value="Tersedia">Tersedia</option>
                                        <option value="Tidak Tersedia">Tidak Tersedia</option>
                                    </select>
                                </div>
                                <button type="button" class="btn btn-primary" onclick="tambahLaptop()">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- tambah Handphone modal -->
            <div class="modal fade" id="tambahHandphoneModal" tabindex="-1" aria-labelledby="tambahHandphoneModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahHandphoneModalLabel">Tambah Handphone</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="tambahHandphoneForm">
                                @csrf
                                <div class="mb-3">
                                    <label for="tambahNama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="tambahHandphoneNama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tambahMerek" class="form-label">Merek</label>
                                    <input type="text" class="form-control" id="tambahHandphoneMerek" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tambahOs" class="form-label">OS</label>
                                    <select id="tambahHandphoneOs" class="form-control">
                                        <option value="Android">Android</option>
                                        <option value="IOS">IOS</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tambahRam" class="form-label">RAM</label>
                                    <select id="tambahHandphoneRam" class="form-control">
                                        <option value="4GB">4GB</option>
                                        <option value="8GB">8GB</option>
                                        <option value="16GB">16GB</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tambahStorage" class="form-label">Storage</label>
                                    <select id="tambahHandphoneStorage" class="form-control">
                                        <option value="128GB">128GB</option>
                                        <option value="256GB">256GB</option>
                                        <option value="512GB">512GB</option>
                                        <option value="1TB">1TB</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tambahHargaSewa" class="form-label">Harga Sewa</label>
                                    <input type="number" class="form-control" id="tambahHandphoneHargaSewa">
                                </div>
                                <div class="mb-3">
                                    <label for="tambahStatus" class="form-label">Status</label>
                                    <select id="tambahHandphoneStatus" class="form-control">
                                        <option value="Tersedia">Tersedia</option>
                                        <option value="Tidak Tersedia">Tidak Tersedia</option>
                                    </select>
                                </div>
                                <button type="button" class="btn btn-primary"
                                    onclick="tambahHandphone()">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        function tambahLaptop() {
            let data = {
                _token: document.querySelector('input[name="_token"]').value,
                nama: document.getElementById('tambahNama').value,
                merek: document.getElementById('tambahMerek').value,
                kategori: document.getElementById('tambahKategori').value,
                os: document.getElementById('tambahOs').value,
                ram: document.getElementById('tambahRam').value,
                storage: document.getElementById('tambahStorage').value,
                harga_sewa: document.getElementById('tambahHargaSewa').value,
                status: document.getElementById('tambahStatus').value
            };

            fetch("{{ route('tambah-laptop') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": data._token
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Laptop berhasil ditambahkan",
                            icon: "success",
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: "Gagal!",
                            text: "Terjadi kesalahan saat menambahkan laptop",
                            icon: "error",
                            confirmButtonText: "Coba Lagi"
                        });
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    Swal.fire({
                        title: "Error!",
                        text: "Gagal menghubungi server",
                        icon: "error",
                        confirmButtonText: "Tutup"
                    });
                });
        }
        function tambahHandphone() {
            let data = {
                _token: document.querySelector('input[name="_token"]').value,
                nama: document.getElementById('tambahHandphoneNama').value,
                merek: document.getElementById('tambahHandphoneMerek').value,
                os: document.getElementById('tambahHandphoneOs').value,
                ram: document.getElementById('tambahHandphoneRam').value,
                storage: document.getElementById('tambahHandphoneStorage').value,
                harga_sewa: document.getElementById('tambahHandphoneHargaSewa').value,
                status: document.getElementById('tambahHandphoneStatus').value
            };

            fetch("{{ route('tambah-handphone') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": data._token
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Handphone berhasil ditambahkan",
                            icon: "success",
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: "Gagal!",
                            text: "Terjadi kesalahan saat menambahkan handphone",
                            icon: "error",
                            confirmButtonText: "Coba Lagi"
                        });
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    Swal.fire({
                        title: "Error!",
                        text: "Gagal menghubungi server",
                        icon: "error",
                        confirmButtonText: "Tutup"
                    });
                });
        }
    </script>

    <script>
        function showEditModal(id, nama, merek, os, ram, storage, harga_sewa, status) {
            document.getElementById('editId').value = id;
            document.getElementById('editNama').value = nama;
            document.getElementById('editMerek').value = merek;
            document.getElementById('editOs').value = os;
            document.getElementById('editRam').value = ram;
            document.getElementById('editStorage').value = storage;
            document.getElementById('editHargaSewa').value = harga_sewa;
            document.getElementById('editStatus').value = status;
            var modal = new bootstrap.Modal(document.getElementById('editModal'));
            modal.show();
        }
        function showEditLaptopModal(id, nama, merek, kategori, os, ram, storage, harga_sewa, status) {
            document.getElementById('editLaptopId').value = id;
            document.getElementById('editLaptopNama').value = nama;
            document.getElementById('editLaptopMerek').value = merek;
            document.getElementById('editLaptopKategori').value = kategori;
            document.getElementById('editLaptopOs').value = os;
            document.getElementById('editLaptopRam').value = ram;
            document.getElementById('editLaptopStorage').value = storage;
            document.getElementById('editLaptopHargaSewa').value = harga_sewa;
            document.getElementById('editLaptopStatus').value = status;
            var modal = new bootstrap.Modal(document.getElementById('editLaptopModal'));
            modal.show();
        }
        function updateLaptopData() {
            var id = document.getElementById('editLaptopId').value;
            var data = {
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                nama: document.getElementById('editLaptopNama').value,
                merek: document.getElementById('editLaptopMerek').value,
                kategori: document.getElementById('editLaptopKategori').value,
                os: document.getElementById('editLaptopOs').value,
                ram: document.getElementById('editLaptopRam').value,
                storage: document.getElementById('editLaptopStorage').value,
                harga_sewa: document.getElementById('editLaptopHargaSewa').value,
                status: document.getElementById('editLaptopStatus').value
            };

            fetch('/update-laptop/' + id, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(response => {
                    if (response.success) {
                        location.reload();
                    } else {
                        alert('Gagal memperbarui data laptop!');
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function updateData() {
            var id = document.getElementById('editId').value;
            var data = {
                _token: "{{ csrf_token() }}",
                nama: document.getElementById('editNama').value,
                merek: document.getElementById('editMerek').value,
                os: document.getElementById('editOs').value,
                ram: document.getElementById('editRam').value,
                storage: document.getElementById('editStorage').value,
                harga_sewa: document.getElementById('editHargaSewa').value,
                status: document.getElementById('editStatus').value
            };

            fetch('/update-handphone/' + id, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(response => {
                    if (response.success) {
                        location.reload();
                    } else {
                        alert('Gagal memperbarui data!');
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/argon-dashboard.min.js?v=2.1.0"></script>
    <script>
        function confirmDelete(type, id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/delete-${type}/${id}`;
                }
            });
        }
    </script>
</body>

</html>