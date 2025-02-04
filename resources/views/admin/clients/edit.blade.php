@extends('layouts-admin.app')
@section('title', 'ADMIN BERKAH SAFTINDO | Edit Klien')

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Klien</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Daftar Klien</a></li>
                <li class="breadcrumb-item active">Edit Daftar Klien</li>
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
                        <h5 class="card-title">Form Edit Daftar Klien</h5>

                        <!-- General Form Elements -->

                        <form action="{{ route('clients.update',$client->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" name="name" class="form-control" required value="{{ $client->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <textarea class="form-control tinymce" name="address" rows="3">{{ $client->address }}</textarea>
                                    </div>
                                     <div class="mb-3">
                                         <label class="form-label">Logo</label>
                                         <input type="file" name="image" class="form-control mb-2" accept="image/png, image/gif, image/jpeg, image/x-icon" style="margin: 0 !important;">
                                         <img src="{{ asset('storage/clients/'.$client->image) }}" alt="" width="100" class="mt-2">
                                         <!-- <span style="font-size: 12px; color: gray; margin: 0 !important;">size : 1512 x 615 px</span> -->
                                     </div>
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