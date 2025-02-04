  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
        <a class="nav-link {{ (request()->segment(2) == 'dashboards') ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
          <i class="bi bi-house-door-fill"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (request()->segment(2) == 'products') ? '' : 'collapsed' }}" href="{{ route('products.index') }}">
          <i class="bi bi-bag-dash-fill"></i>
          <span>Produk</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (request()->segment(2) == 'categories') ? '' : 'collapsed' }}" href="{{ route('categories.index') }}">
          <i class="bi bi-tags-fill"></i>
          <span>Kategori</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (request()->segment(2) == 'clients') ? '' : 'collapsed' }}" href="{{ route('clients.index') }}">
          <i class="bi bi-building-fill"></i>
          <span>Klien</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (request()->segment(2) == 'blogs') ? '' : 'collapsed' }}" href="{{ route('blogs.index') }}">
          <i class="bi bi-newspaper"></i>
          <span>Blog</span>
        </a>
      </li>
    </ul>

  </aside><!-- End Sidebar-->