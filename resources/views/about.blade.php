@extends('layout.app')
@section('title', 'BERKAH SAFTINDO | About')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Tentang Kami</h4>
            <p class="mb-0">CV. Berkah Utama Saftindo adalah penyedia perlengkapan keselamatan kerja (K3) yang berkomitmen pada kualitas dan perlindungan pekerja. Kami menghadirkan solusi terbaik untuk mendukung lingkungan kerja yang aman dan produktif di berbagai industri.
            </p>

        </div>
    </div>
    <!-- Header End -->

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


@endsection
@push('scripts')
@endpush