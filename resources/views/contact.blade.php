
@extends('layout.app')
@section('title', 'BERKAH SAFTINDO | Contact ')

@section('content')

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Hubungi Kami</h4>
                <p class="mb-0">Kami siap membantu Anda! Hubungi kami untuk konsultasi, pemesanan, atau pertanyaan seputar produk dan layanan kami. Dapatkan solusi terbaik untuk perlengkapan keselamatan kerja sesuai kebutuhan Anda</p>

            </div>
        </div>
        <!-- Header End -->

        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="bg-secondary p-5 rounded">
                            <h4 class="text-primary mb-4">Send Your Message</h4>
                            <form>
                                <div class="row g-4">
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" placeholder="Your Name">
                                            <label for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" placeholder="Your Email">
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input type="phone" class="form-control" id="phone" placeholder="Phone">
                                            <label for="phone">Your Phone</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="project" placeholder="Project">
                                            <label for="project">Your Project</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" placeholder="Subject">
                                            <label for="subject">Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 160px"></textarea>
                                            <label for="message">Message</label>
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-light w-100 py-3">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> 
                    <div class="col-12 col-xl-1 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="d-flex flex-xl-column align-items-center justify-content-center">
                            <a class="btn btn-xl-square btn-light rounded-circle mb-0 mb-xl-4 me-4 me-xl-0" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-xl-square btn-light rounded-circle mb-0 mb-xl-4 me-4 me-xl-0" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-xl-square btn-light rounded-circle mb-0 mb-xl-4 me-4 me-xl-0" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-xl-square btn-light rounded-circle mb-0 mb-xl-0 me-0 me-xl-0" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-xl-5 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="p-5 bg-light rounded">
                            <div class="bg-white rounded p-3 mb-4">
                                <div class="contact-add-item" style="background: none;">
                                    <div class="contact-icon" style="    width: 65px; height: 65px;">
                                        <i class="fas fa-map-marker-alt fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>Address</h4>
                                        <p class="mb-0"> Jl. Nusa Indah Raya No. 4, Cinangka, Kec. Sawangan, Kota Depok, Jawa Barat 16516</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white rounded p-3 mb-4">
                                <div class="contact-add-item" style="background: none;">
                                    <div class="contact-icon" style="    width: 65px; height: 65px;">
                                        <i class="fas fa-envelope fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>Mail Us</h4>
                                        <p class="mb-0">berkahsaftindo@example.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white rounded p-3 mb-0">
                                <div class="contact-add-item" style="background: none;">
                                    <div class="contact-icon" style="    width: 65px; height: 65px;">
                                        <i class="fa fa-phone-alt fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>Telephone</h4>
                                        <p class="mb-0">(+62) 813 8537 7823</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="rounded">
                            <iframe  class="rounded w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.20624647602!2d106.75713677399162!3d-6.367349393622806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ef13ee11677b%3A0x2134bd18e60c993a!2sBerkah%20Saftindo%20-%20Alat%20Safety%20atau%20Proyek!5e0!3m2!1sid!2sid!4v1737519796978!5m2!1sid!2sid" 
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Contact End -->


@endsection
@push('scripts')
@endpush