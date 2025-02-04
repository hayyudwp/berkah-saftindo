@extends('layouts-admin.app')
@section('title', 'ADMIN BERKAH SAFTINDO | Edit Produk')

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Daftar Produk</a></li>
                <li class="breadcrumb-item active">Edit Daftar Produk</li>
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
                        <h5 class="card-title">Form Edit Daftar Produk</h5>

                        <!-- General Form Elements -->

                        <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Nama Produk</label>
                                                <input type="text" name="name" class="form-control" required value="{{ $product->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Harga</label>
                                                <input type="text" name="price" class="form-control" value="{{ $product->price }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Kategori</label>
                                                <select name="category_id" id="category_id" class="form-control" required>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" {{ $category->id == old('category_id', $product->category_id) ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Gambar</label>
                                                <input type="file" name="image" class="form-control mb-2" style="margin: 0 !important;">
                                                <img src="{{ asset('storage/products/'.$product->image) }}" alt="" width="100" class="mt-2">
                                                <!-- <span style="font-size: 12px; color: gray; margin: 0 !important;">size : 1512 x 615 px</span> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi</label>
                                        <textarea class="form-control tinymce" name="desc" id="tiny-editor" rows="5" required>{{ $product->desc }}</textarea>
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