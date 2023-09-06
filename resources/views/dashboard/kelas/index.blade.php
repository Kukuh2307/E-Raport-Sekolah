@extends('dashboard.layout.main')
@section('content')
<div class="row">
    <h1>Kelas</h1>
    {{-- cek apakah ada session yang dikirim atau error --}}
    @if (Session::get('info'))
        <div class="alert alert-info">
            {{ Session::get('info') }}
        </div>
    @elseif($errors->any())
        <div class="alert alert-danger">
            {{ 'Edit Kelas gagal' }}
        </div>
    @endif
    <form action="/Kelas" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Nama Sekolah -->
        <div class="mb-3">
            <label for="nama_sekolah" class="form-label">Nama Kelas</label>
            <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" id="nama_sekolah" name="nama_sekolah" value="{{ old('nama_sekolah') }}">
            @error('nama_sekolah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Guru Pengajar -->
        <div class="mb-3">
            <label for="status_sekolah" class="form-label">Guru Pengajar</label>
            <select class="form-select @error('guru_pengajar') is-invalid @enderror" id="guru_pengajar" name="guru_pengajar" value="{{ old('guru_pengajar') }}" id="guru_pengajar" name="guru_pengajar">
                <option value="">Pilih Guru Pengajar</option>
                <option value="Sri Endah S.Pd">Sri Endah S.Pd</option>
                <option value="Sumiatin S.Pd">Sumiatin S.Pd</option>
                <option value="Muyamah S.Pd">Muyamah S.Pd</option>
                <option value="Neneng Indrawati">Neneng Indrawati</option>
            </select>
            @error('guru_pengajar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Tahun Ajaran -->
        <div class="mb-3">
            <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
            <input type="number" class="form-control @error('tahun_ajaran') is-invalid @enderror" id="tahun_ajaran" name="tahun_ajaran" value="{{ old('tahun_ajaran') }}">
            @error('tahun_ajaran')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- semester --}}
        <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <input type="number" class="form-control @error('semester') is-invalid @enderror" id="semester" name="semester" value="{{ old('semester') }}">
            @error('semester')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn" style="background-color:#20aee3; color:white">Update</button>
    </form>
</div>
@endsection