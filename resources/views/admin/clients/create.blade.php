@extends('layouts-admin.app')
@section('title', 'ADMIN BERKAH SAFTINDO | Tambah Klien')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Klien</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Daftar Klien </a></li>
                <li class="breadcrumb-item active">New Daftar Klien </li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @elseif (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <h5 class="card-title">Form New Daftar Klien </h5>

                        <!-- General Form Elements -->
                        <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Perusahaan</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <textarea class="form-control" name="content" rows="3"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Logo</label>
                                        <input type="file" name="image" id="upload_image" accept="image/png, image/gif, image/jpeg, image/x-icon" class="form-control" required>
                                        <!-- <span style="font-size: 12px; color: gray; margin: 0 !important;">size : 1:1 </span> -->
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-3 mb-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection

@push('scripts')
@endpush
