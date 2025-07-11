@extends('layouts.app')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Top Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="#">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Search</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <ul class="navbar-nav d-flex align-items-center justify-content-end">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a href="../pages/sign-in.html" class="nav-link text-body font-weight-bold px-0">
                                <i class="material-symbols-rounded">account_circle</i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="d-flex flex-column justify-content-center align-items-center text-center px-3"
            style="min-height: 80vh; background: linear-gradient(135deg, #f8f9fa, #e0f7fa); border-radius: 15px;">

            <img src="{{ asset('assets/img/javazone.png') }}" class="img-fluid mb-4" style="width: 300px;" alt="logo">

            <h2 class="fw-bold mb-3">Selamat Datang di JavaZone</h2>

            <p class="text-muted mb-4" style="max-width: 600px;">
                Platform untuk menjual atau membeli barang elektronik dan keperluan lainnya, yang berkualitas dan
                bergaransi.
            </p>
            {{-- {{ route('shop.index') }} --}}
            <a href="{{ url('shop') }}" class="btn btn-primary btn-lg shadow">
                <i class="material-symbols-rounded align-middle me-1">shopping_cart</i> Shop Now
            </a>
        </div>
    </main>
@endsection
