@extends('layout.app')

@section('title', 'BERKAH SAFTINDO | Product')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Produk</h4>
            <p class="mb-0">Temukan berbagai perlengkapan K3 yang dirancang untuk keselamatan maksimal, mulai dari helm, sarung tangan, rompi reflektif, hingga alat pemadam kebakaran. Produk kami memenuhi standar keamanan untuk perlindungan optimal di tempat kerja.</p>
        </div>
    </div>
    <!-- Header End -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">
        <div class="container">
            <div class="row pt-5">
                <div class="col-md-3">
                    <!-- Sidebar kategori -->
                    <div class="category-panel p-3 ">
                        <h5 class="text-center p-3 bg-yellow-primary text-white mb-0">Kategori</h5>
                        <ul class="list-group list-group-produk">
                            <li class="list-group-item">
                                <a href="#" class="category-link active" data-id="all" data-name="Semua Produk">> Semua Produk</a>
                            </li>
                            @foreach ($categories as $category)
                                <li class="list-group-item">
                                    <a href="#" class="category-link" data-id="{{ $category->id }}" data-name="{{ $category->name }}">> {{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-9 p-3">
                    <!-- Nama Kategori Terpilih -->
                    <h3 id="selectedCategory" class=" mb-3">Semua Produk</h3>
                    
                    <!-- Input Search -->
                    

                    <!-- Pilihan jumlah produk -->
                    <div class="row between mb-3">
                        <div class="col-md-6 d-flex">
                            <p  class="me-2 py-2 mb-0">Tampilkan :</p>
                            <select id="productLimit" class="form-select w-auto">
                                <option value="10">10 Produk</option>
                                <option value="30">30 Produk</option>
                                <option value="50">50 Produk</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="searchProduct" class="form-control" placeholder="Cari produk...">
                        </div>
                    </div>

                    <!-- Container Produk -->
                    <div class="row gy-4 isotope-container py-3" id="productContainer" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item">
                                <div class="portfolio-content h-100">
                                    <a href="{{ route('product.detail', $product->slug) }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                        <img src="{{ asset('storage/products/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                                    </a>
                                    <div class="portfolio-info text-center">
                                        <h4 class="pr-0">
                                            <a href="{{ route('product.detail', $product->slug) }}" title="More Details">{{ $product->name }}</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Portfolio Section -->
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const categoryLinks = document.querySelectorAll('.category-link');
    const productLimit = document.getElementById('productLimit');
    const searchProduct = document.getElementById('searchProduct');
    const productContainer = document.getElementById('productContainer');
    const selectedCategory = document.getElementById('selectedCategory');

    let selectedCategoryId = "all"; // Default ke "All Produk"

    function fetchProducts() {
        let limit = productLimit.value;
        let searchQuery = searchProduct.value;
        
        fetch(`/get-products?category_id=${selectedCategoryId}&limit=${limit}&search=${searchQuery}`)
            .then(response => response.json())
            .then(products => {
                productContainer.innerHTML = ''; // Kosongkan container sebelum menambahkan produk baru
                
                if (products.length === 0) {
                    productContainer.innerHTML = `<p class="text-center">Produk tidak ditemukan.</p>`;
                    return;
                }

                // Looping untuk menampilkan produk
                products.forEach(product => {
                    let productHTML = `
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item">
                            <div class="portfolio-content h-100">
                                <a href="/product/${product.slug}" data-gallery="portfolio-gallery-app" class="glightbox">
                                    <img src="/storage/products/${product.image}" class="img-fluid" alt="${product.name}">
                                </a>
                                <div class="portfolio-info text-center">
                                    <h4 class="pr-0">
                                        <a href="/product/${product.slug}" title="More Details">${product.name}</a>
                                    </h4>
                                </div>
                            </div>
                        </div>`;

                    productContainer.insertAdjacentHTML('beforeend', productHTML);
                });
            })
            .catch(error => console.error('Error fetching products:', error));
    }

    // Event Listener untuk Klik Kategori
    categoryLinks.forEach(category => {
        category.addEventListener('click', function(event) {
            event.preventDefault();
            
            document.querySelectorAll('.category-link').forEach(link => link.classList.remove('active'));
            this.classList.add('active');

            selectedCategoryId = this.getAttribute('data-id');
            selectedCategory.textContent = this.getAttribute('data-name'); // Update nama kategori yang dipilih
            fetchProducts();
        });
    });

    // Event Listener untuk Perubahan Jumlah Produk
    productLimit.addEventListener('change', fetchProducts);

    // Event Listener untuk Input Search Produk
    searchProduct.addEventListener('input', fetchProducts);

    // Memanggil fetchProducts ketika halaman pertama kali dimuat
    fetchProducts();
});

</script>
@endpush
