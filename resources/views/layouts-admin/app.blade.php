<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/sweetalert/dist/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/jquery.toast.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('admin/css/style-admin.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Custom Script -->
    @stack('styles')

</head>

<body>
    <div id="toast-container"></div>
    <div id="progress-overlay" class="progress-overlay" style="display: none;">
        <div class="text-center spinner-border text-primary progress" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    @include('layouts-admin.header')
    @include('layouts-admin.sidebar')
    @yield('content')
    @include('layouts-admin.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <script src="{{ asset('admin/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.toast.min.js') }}"></script>
    <!-- Vendor JS Files -->
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/sweetalert/dist/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script> 
    <script src="{{ asset('admin/js/dataTables.bootstrap5.min.js') }}"></script>
    
    <!-- Template Main JS File -->
    <script src="{{ asset('admin/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin/js/main.js') }}"></script>
    
    <!-- Custom Script -->
    @stack('scripts')
    <script>
    $(document).ready(function() {
        // Toggle sidebar when the button is clicked
        $('.toggle-sidebar-btn').on('click', function() {
            $('body').toggleClass('toggle-sidebar');
        });

        // Collapse or expand menu items
        $('.sidebar-nav .nav-link').on('click', function() {
            var nextElement = $(this).next('.nav-content'); // Get the next submenu (if any)
            if (nextElement.length) {
                // Toggle collapse/expand for this link
                $(this).toggleClass('collapsed');
                nextElement.slideToggle(200);
            }
        });
    });
    </script>
</body>

</html>
