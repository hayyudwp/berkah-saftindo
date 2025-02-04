@extends('layout.app')

@section('title', 'Detail Produk - ' . $product->name)

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Produk</h4>
            <p class="mb-0">Temukan berbagai perlengkapan K3 yang dirancang untuk keselamatan maksimal, mulai dari helm, sarung tangan, rompi reflektif, hingga alat pemadam kebakaran. Produk kami memenuhi standar keamanan untuk perlindungan optimal di tempat kerja.</p>
        </div>
    </div>
    <!-- Header End -->

    <div class="container mt-5">
        <!-- Product Detail Section -->
        <div class="row">
            <div class="col-md-6">
                <div class="product-image">
                    <img src="{{ asset('storage/products/' . $product->image) }}" class="img-fluid rounded shadow" alt="{{ $product->name }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-details">
                    <h1>{{ $product->name }}</h1>
                    <!-- <p class="text-muted">{{ $product->category->name }}</p> -->
                    <p>{!! $product->desc !!}</p>
                    <a href="{{ route('whatsapp') }}" target="_blank" class="btn btn-primary">Pesan Sekarang</a>
                </div>
            </div>
        </div>

        <!-- Related Products Section -->
        <div class="related-products my-5">
            <h3 class="text-center mb-4">Produk Serupa</h3>
            <div class="row">
                @foreach ($relatedProducts as $relatedProduct)
                     <div class="col-lg-3 col-md-6 portfolio-item isotope-item">
                        <div class="portfolio-content h-100">
                            <a href="{{ route('product.detail', $relatedProduct->slug) }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset('storage/products/' . $relatedProduct->image) }}" class="img-fluid" alt="{{ $relatedProduct->name }}">
                            </a>
                            <div class="portfolio-info text-center">
                                <h4 class="pr-0">
                                    <a href="{{ route('product.detail', $relatedProduct->slug) }}" title="More Details">{{ $relatedProduct->name }}</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
