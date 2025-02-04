@extends('layout.app')

@section('title', $blog->title)

@section('content')
        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Blog & News</h4>
                <p class="mb-0">Dapatkan wawasan terbaru tentang keselamatan kerja, tips pencegahan kecelakaan, serta panduan memilih alat pelindung diri (APD) yang tepat. Kami menghadirkan artikel informatif untuk membantu Anda menciptakan lingkungan kerja yang lebih aman.

                </p>

            </div>
        </div>
        <!-- Header End -->
        <div class="container my-5">
        <h1>{{ $blog->name }}</h1>
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/blogs/' . $blog->image) }}" class="img-fluid" alt="{{ $blog->name }}">
            </div>
            <div class="col-md-6">
                <h4>{{ $blog->name }}</h4>
                <p>{!! $blog->content !!}</p>
                <a href="{{ route('blog') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
