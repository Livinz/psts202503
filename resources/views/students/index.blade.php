@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Content -->
        <div class="col-md-12 p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Data Siswa</h3>
                <form action="" class="d-flex" method="GET">
                    <input type="text" name="search" class="form-control me-2" placeholder="Cari Nama atau No Student">
                    <button class="btn btn-outline-success">Search</button>
                </form>
                <a href="{{ route('students.create') }}" class="btn btn-primary">Tambah Data Siswa</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Email</th>
                        <th>No. Telp</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $key => $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->grade }}</td>
                        <td>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus siswa ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $students->links() }}
        </div>
    </div>
</div>
@endsection
