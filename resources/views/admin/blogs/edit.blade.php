@extends('layouts-admin.app')
@section('title', 'ADMIN BERKAH SAFTINDO | Edit Blog/News')

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Blog/News</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">Daftar Blog</a></li>
                <li class="breadcrumb-item active">Edit Daftar Blog</li>
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
                        <h5 class="card-title">Form Edit Daftar Blog</h5>

                        <!-- General Form Elements -->

                        <form action="{{ route('blogs.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Judul</label>
                                                <input type="text" name="title" class="form-control" required value="{{ $blog->title }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Tanggal</label>
                                                <input type="date" name="published_at" class="form-control" required value="{{ $blog->published_at }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">File Upload</label>
                                                <input type="file" name="image" class="form-control mb-2" style="margin: 0 !important;">
                                                <img src="{{ asset('storage/blogs/'.$blog->image) }}" alt="" width="100" class="mt-2">
                                                <!-- <span style="font-size: 12px; color: gray; margin: 0 !important;">size : 1512 x 615 px</span> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi</label>
                                        <textarea class="form-control tinymce" name="content" id="tiny-editor" rows="5" required>{{ $blog->content }}</textarea>
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
<script>
    tinymce.init({
        selector: '#tiny-editor',
        height: 300,
        plugins: 'advlist autolink lists link image charmap print preview anchor',
        toolbar: 'undo redo | formatselect | bold italic backcolor | \
                  alignleft aligncenter alignright alignjustify | \
                  bullist numlist outdent indent | removeformat | help',
        menubar: false,
        setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave(); // Memastikan textarea diperbarui sebelum submit
            });
        }
    });
</script>
@endpush