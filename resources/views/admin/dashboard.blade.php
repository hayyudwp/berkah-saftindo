<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts-admin.app')
@section('title', 'ADMIN BERKAH SAFTINDO | Dashboard')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-xxl-3 col-md-6">
                        <a href="{{ route('products.index') }}">
                        <div class="card info-card balance-card">
                                <div class="filter">
                                   <i class="icon bi bi-three-dots"></i>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Redirect</h6>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"> Produk</h5>

                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-bag-dash-fill"></i>
                                        </div>
                                        <div class="ps-3 count-dashboard">
                                            {{ $totalProducts }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xxl-3 col-md-6">
                        <a href="{{ route('categories.index') }}">
                        <div class="card info-card balance-card">
                                <div class="filter">
                                   <i class="icon bi bi-three-dots"></i>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Redirect</h6>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"> Kategori</h5>

                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-tags-fill"></i>
                                        </div>
                                        <div class="ps-3 count-dashboard">
                                            {{ $totalCategories }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xxl-3 col-md-6">
                        <a href="{{ route('clients.index') }}">
                        <div class="card info-card balance-card">
                                <div class="filter">
                                   <i class="icon bi bi-three-dots"></i>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Redirect</h6>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"> Klien</h5>

                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-building-fill"></i>
                                        </div>
                                        <div class="ps-3 count-dashboard">
                                            {{ $totalClients }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xxl-3 col-md-6">
                        <a href="{{ route('blogs.index') }}">
                        <div class="card info-card balance-card">
                                <div class="filter">
                                   <i class="icon bi bi-three-dots"></i>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Redirect</h6>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"> Blog</h5>

                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-newspaper"></i>
                                        </div>
                                        <div class="ps-3 count-dashboard">
                                            {{ $totalBlogs }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                  
                    
                   
                  
                    
                </div>
            </div><!-- End Left side columns -->


        </div>
    </section>

</main>
@endsection