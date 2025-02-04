@extends('layout.app')
@section('title', 'BERKAH SAFTINDO | Blog')

@section('content')
@php
    use Carbon\Carbon;
@endphp
        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Blog & News</h4>
                <p class="mb-0">Dapatkan wawasan terbaru tentang keselamatan kerja, tips pencegahan kecelakaan, serta panduan memilih alat pelindung diri (APD) yang tepat. Kami menghadirkan artikel informatif untuk membantu Anda menciptakan lingkungan kerja yang lebih aman.

                </p>

            </div>
        </div>
        <!-- Header End -->
        <!-- Blog Start -->
        <div class="container-fluid blog ">
            <div class="container py-5">
                <div class="row g-4">
                    @foreach ($blogs as $blog)
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <a href="{{ route('blog.detail', $blog->slug) }}" class="d-block">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{ asset('storage/blogs/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-fluid rounded-top w-100">
                            </div>
                            <div class="blog-content rounded-bottom p-4">
                                <div class="blog-date">{{ Carbon::parse($blog->published_at)->format('d M Y') }}</div>
                                <h4 class="text-limited-blog-title mt-3 blog-title">{{ Str::limit(strip_tags($blog->title), 35) }}</h4>
                                <p class="mb-3 text-limited-blog-content text-justify blog-description">
                                    {!! Str::limit(strip_tags($blog->content), 100) !!}
                                </p>
                                                                
                                <span>Read More  <i class="fa fa-arrow-right"></i></span>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endforeach
                  
                </div>
            </div>
        </div>
        <!-- Blog End -->
@endsection

@push('scripts')

@endpush