
        <!-- Topbar Start -->
        <div class="container-fluid topbar bg-secondary d-none d-xl-block w-100">
            <div class="container">
                <div class="row gx-0 align-items-center" style="height: 45px;">
                    <div class="col-lg-6 text-center text-lg-start mb-lg-0">
                        <div class="d-flex flex-wrap">
                            <a href="{{ route('whatsapp') }}" target="_blank" class="text-muted me-4"><i class="fas fa-phone-alt text-primary me-2"></i>+62 813-8537-7823</a>
                            <a href="mailto:berfkahsaftindo@gmail.com" class="text-muted me-0"><i class="fas fa-envelope text-primary me-2"></i>berkahsaftindo@gmail.com</a>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center text-lg-end">
                        <div class="d-flex align-items-center justify-content-end">
                            <a href="#" class="btn btn-light btn-sm-square rounded-circle me-3"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="btn btn-light btn-sm-square rounded-circle me-3"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="btn btn-light btn-sm-square rounded-circle me-3"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="btn btn-light btn-sm-square rounded-circle me-0"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid nav-bar sticky-top px-0 px-lg-4 py-2 py-lg-0">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a href="{{ route('home') }}" class="navbar-brand p-0">
                        <!-- <h1 class="display-6 text-primary"><i class="fas fa-car-alt me-3"></i></i>Cental</h1> -->
                        <img src="{{ asset('img/logo.png') }}" alt="Logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav py-0">
                            <a href="{{ route('home') }}" class="nav-item nav-link {{ (request()->segment(1) == '') ? 'active' : '' }}">Beranda</a>
                            <a href="{{ route('about') }}" class="nav-item nav-link {{ (request()->segment(1) == 'about') ? 'active' : '' }}">Tentang Kami</a>
                            <a href="{{ route('product') }}" class="nav-item nav-link {{ (request()->segment(1) == 'product') ? 'active' : '' }}">Produk</a>
                            <a href="{{ route('blog') }}" class="nav-item nav-link {{ (request()->segment(1) == 'blog') ? 'active' : '' }}">Blog</a>
                            <a href="{{ route('contact') }}" class="nav-item nav-link {{ (request()->segment(1) == 'contact') ? 'active' : '' }}">Hubungi Kami</a>
                        </div>
                        <!-- <a href="#" class="btn btn-primary rounded-pill py-2 px-4">Get Started</a> -->
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar & Hero End -->