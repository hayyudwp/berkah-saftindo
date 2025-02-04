@extends('layout.app')
@section('title', 'BERKAH SAFTINDO ')

@section('content')
@include('layout.hero')


        <!-- About Start -->
        <div class="container-fluid overflow-hidden about py-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="about-item">
                            <div class="pb-5">
                                <h1 class="display-5 text-capitalize">Berkah <span class="text-primary">Saftindo</span></h1>
                                <p class="mb-0 text-justify">
                                    CV. Berkah Utama Saftindo mitra terpercaya Anda dalam menyediakan perlengkapan keselamatan dan kesehatan kerja (K3) berkualitas tinggi. Berdiri dengan komitmen untuk mendukung terciptanya lingkungan kerja yang aman dan produktif, kami menghadirkan solusi perlengkapan K3 yang dirancang untuk melindungi pekerja dari risiko kecelakaan di berbagai sektor industri.
                                    <br><br>
                                    Kami telah menjadi penyedia pilihan untuk kontraktor, hotel, rumah sakit, instansi pemerintah, dan sektor lainnya. Produk kami, mulai dari helm keselamatan hingga alat pemadam kebakaran (APAR), memberikan perlindungan maksimal dengan harga yang kompetitif.
                                    <br><br>
                                    Di CV. Berkah Utama Saftindo, kami percaya bahwa keselamatan adalah investasi, bukan biaya. Bergabunglah dengan kami dalam menciptakan dunia kerja yang lebih aman, karena <span class="font-bold">"Don't Learn Safety from Accidents."</span> 
                                </p>
                            </div>
                            <div class="row g-4">
                                <div class="about-item-inner border p-4">
                                    <div class="d-flex mb-2">
                                        <div class="about-icon">
                                            <img src="img/about-icon-1.png" class="img-fluid w-50 h-50" alt="Icon">
                                        </div>
                                        <h2 class="align-down text-visi-misi">Visi</h2>
                                    </div>
                                    <p class="mb-0 text-justify">Menjadi mitra utama yang terpercaya dalam penyediaan alat keselamatan kerja di 
                                        Indonesia serta mendukung terciptanya lingkungan kerja yang aman, sehat, dan 
                                        produktif.
                                    </p>
                                </div>
                                <div class="about-item-inner border p-4">
                                    <div class="d-flex mb-2">
                                        <div class="about-icon">
                                            <img src="img/about-icon-2.png" class="img-fluid h-50 w-50" alt="Icon">
                                        </div>
                                        <h2 class="align-down text-visi-misi">Misi</h2>
                                    </div>
                                    <ol class="misi text-justify">
                                        <li>Menyediakan produk perlengkapan K3 berkualitas dengan mengedepankan pada kepuasan konsumen.</li>
                                        <li>Meningkatkan kesadaran masyarakat tentang pentingnya keselamatan kerja melalui program edukasi dan sosialisasi.</li>
                                        <li>Memberikan solusi inovatif dalam pengadaan alat keselamatan untuk memenuhi kebutuhan spesifik setiap pelanggan.</li>
                                        <li>Memberikan pelayanan pelanggan yang responsif, cepat, dan solutif. </li>
                                        <li>Membangun hubungan jangka panjang yang saling menguntungkan dengan pelanggan dan mitra.</li>
                                    </ol>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                        <div class="about-img">
                            <div class="img-1">
                                <img src="{{ asset('img/foto-6.jpg') }}" class="img-fluid rounded h-100 w-100" alt="">
                            </div>
                            <div class="img-2">
                                <img src="{{ asset('img/foto-3.jpg') }}" class="img-fluid rounded w-100" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

          <!-- Car Steps Start -->
        <div class="container-fluid steps py-5">
            <div class="container pb-5">
                <div class="banner-item rounded">
                    <div class="banner-content">
                        <h2 class="text-primary">Don't Learn Safety from Accidents</h2>
                        <h1 class="text-white">Tertarik pada produk kami?</h1>
                        <p class="text-white">Jangan ragu untuk bertanya dan kirimkan pesan kepada kami..</p>
                        <div class="banner-btn">
                            <a href="https://wa.me/6281385377823" class="btn btn-secondary rounded-pill py-3 px-4 px-md-5 me-2">WhatsApp</a>
                            <a href="{{ route('contact') }}" class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Car Steps End -->

        <!-- Categories Start -->
        <div class="container-fluid categories">
            <div class="container py-5">
                <!-- Title Section -->
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h1 class="display-5 text-capitalize mb-3">Kategori <span class="text-primary">Produk</span></h1>
                    <p class="mb-0">CV. Berkah Utama Saftindo menyediakan berbagai perlengkapan keselamatan kerja yang dirancang untuk melindungi pekerja di berbagai sektor industri.</p>
                </div>

                <!-- Categories Section with Horizontal Scroll -->
                <div class="categories-carousel owl-carousel wow fadeInUp" data-wow-delay="0.1s">

                        @foreach ($categories as $category)
                            <div class="categories-item p-4">
                                <div class="categories-icon mb-4">
                                    <img src="{{ asset('storage/categories/' . $category->icon) }}" alt="{{ $category->name }}" width="50">
                                </div>
                                <h5 class="mb-3">{{$category->name}}</h5>
                                <p class="mb-0">{{$category->desc}}</p>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
        <!-- Categories End -->
         
        <!-- Product Start -->
        <div class="container-fluid products pb-5">
            <div class="container pb-5">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h1 class="display-5 text-capitalize mb-3">Produk <span class="text-primary">Unggulan</span></h1>
                    <p class="mb-0">Produk Unggulan adalah peralatan dan sistem untuk meningkatkan keselamatan kerja, seperti APD, alat pemadam, detektor gas, dan pelatihan K3. Tujuannya mencegah kecelakaan dan memastikan lingkungan kerja aman.
                    </p>
                </div>
                <div class="products-carousel owl-carousel wow fadeInUp" data-wow-delay="0.1s">
                    @foreach ($products as $product)
                    <div class="products-item p-3">
                        <div class="products-item-inner">
                            <div class="products-img rounded-top">
                                <img src="{{ asset('storage/products/' . $product->image) }}" class="img-fluid w-100 rounded-top" alt="{{ $product->name }}">
                            </div>
                            <div class="products-content rounded-bottom p-2">
                                <h5 class="mb-0">{{ $product->name }}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                  
                </div>
            </div>
        </div>
        <!-- Product End -->


        <!-- client Start -->
        <div class="container-fluid client pb-5">
            <div class="container pb-5">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h1 class="display-5 text-capitalize mb-3"> Client<span class="text-primary"> Kami</span></h1>
                </div>
                <div class="owl-carousel client-carousel wow fadeInUp" data-wow-delay="0.1s">
                    @foreach ($clients as $client)
                    <div class="client-item">
                        <img src="{{ asset('storage/clients/' . $client->image) }}" class="img-fluid" alt="{{ $client->name }}">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- client End -->

@endsection

@push('scripts')
@endpush