<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSTS202503</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            background-color: #ffffff;
            height: 100vh;
            border-right: 1px solid #dee2e6;
            padding-top: 20px;
        }
        .sidebar a.active {
            background-color: #4e73df;
            color: white !important;
        }
        .sidebar a {
            color: #4e73df;
            font-weight: 500;
            display: block;
            padding: 10px 15px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #e9ecef;
        }
        .table thead {
            background-color: #f1f1f1;
        }
        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
        }
        .btn-primary:hover {
            background-color: #2e59d9;
            border-color: #2653d4;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <div class="text-center mb-4">  
                    <h6 class="mt-2">PSTS202503</h6>
                </div>
                <a href="{{ route('students.index') }}" class="{{ request()->is('students') ? 'active' : '' }}">Siswa</a>
                <a href="{{ route('students.create') }}">+ Tambah Siswa</a>
            </div>

            <!-- Content -->
            <div class="col-md-10 py-4">
                @yield('content')
            </div>
        </div>
    </div>

    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: true,
            confirmButtonText: 'OK'
        });
    </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
