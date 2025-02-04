@extends('layouts-admin.app')
@section('title', 'ADMIN BERKAH SAFTINDO | Daftar Klien')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Klien</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Daftar Klien</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Flash Messages -->
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @elseif (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <div class="d-flex justify-content-between mb-2">
                            <h5 class="card-title">Daftar Klien</h5>
                            <a href="{{ route('clients.create') }}" class="btn btn-primary btn-margin-top">
                                <i class="bi bi-plus-circle me-1"></i> Tambah Klien
                            </a>
                        </div>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered data-table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Logo</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <!-- End Table -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {

        function stripHtml(html) {
            let tempDiv = document.createElement("div");
            tempDiv.innerHTML = html;
            return tempDiv.innerText || tempDiv.textContent || "";  // Mengembalikan teks tanpa tag HTML
        }
        
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            scrollX: true,
            language: {          
                processing: "<div class='spinner-border text-primary' role='status'><span class='visually-hidden'>Loading...</span></div>",
            },
            ajax: "{{ route('clients.index') }}",
            columns: [
                {
                    data: null,
                    name: 'index',
                    render: function(data, type, full, meta) {
                        return meta.row + 1;
                    },
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'image',
                    name: 'image',
                    render: function(data) {
                        return data 
                            ? `${data}`
                            : '<span class="text-muted">Tidak ada gambar</span>';
                    },
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'address',
                    name: 'address',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
        });

        // Handle delete button click
        $('.data-table').on('click', '.delete-item', function() {
            var id = $(this).data('id');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('clients.delete') }}",
                        data: {
                            _token: $('meta[name="csrf-token"]'),
                            itemID: id
                        },
                        success: function(data) {
                            table.ajax.reload();
                            Swal.fire(data.status === 'success' ? 'Deleted!' : 'Error', data.message, data.status);
                        },
                        error: function(xhr) {
                            Swal.fire('Error', xhr.responseJSON?.message || 'Gagal menghapus data.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>
@endpush
