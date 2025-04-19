@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ route('students.index') }}" class="list-group-item list-group-item-action">Siswa</a>
                <a href="{{ route('students.create') }}" class="list-group-item list-group-item-action">+ Tambah Siswa</a>
            </div>
        </div>

        <!-- Form Edit -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Edit Data Siswa</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('students.update', $student->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Siswa</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $student->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="Laki-Laki" {{ old('gender', $student->gender) == 'Laki-Laki' ? 'checked' : '' }}>
                                <label class="form-check-label">Laki-Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="Perempuan" {{ old('gender', $student->gender) == 'Perempuan' ? 'checked' : '' }}>
                                <label class="form-check-label">Perempuan</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $student->email) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">No. Telp</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone', $student->phone) }}" required>
                        </div>

                       <div class="mb-3">
                        <label for="grade" class="form-label">Kelas</label>
                        <select name="grade" class="form-select" required>
                            <option value="">-- Pilih Kelas --</option>
                            <option value="X" {{ $student->grade == 'X' ? 'selected' : '' }}>X</option>
                            <option value="XI" {{ $student->grade == 'XI' ? 'selected' : '' }}>XI</option>
                            <option value="XII" {{ $student->grade == 'XII' ? 'selected' : '' }}>XII</option>
                        </select>
                    </div>
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
