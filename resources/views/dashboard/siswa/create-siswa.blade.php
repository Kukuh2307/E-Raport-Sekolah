@extends('dashboard.layout.main')
@section('content')
<div class="row">
    <h1>Tambah Siswa</h1>
    {{-- cek apakah ada session yang dikirim atau error --}}
    @if (Session::get('info'))
        <div class="alert alert-info">
            {{ Session::get('info') }}
        </div>
    @elseif($error = $errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/Siswa" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Foto Guru -->
        <div class="mb-3">
            <label for="foto" class="form-label">Foto Siswa</label>
            <img src="" alt="" width="500px" class="img-fluid tampil-gambar mb-3 col-lg-5 d-block">
            <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="gambar" onchange="tampilGambar()">
            @error('foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Nama Siswa --}}
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Siswa</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Nomor Induk --}}
        <div class="mb-3">
            <label for="nomor_induk" class="form-label">Nomor Induk Siswa</label>
            <input type="text" class="form-control @error('nomor_induk') is-invalid @enderror" id="nomor_induk" name="nomor_induk" value="{{ old('nomor_induk') }}">
            @error('nomor_induk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Kelas -->
        <div class="mb-3">
            <label for="kelas_id" class="form-label">Kelas</label>
            <select name="kelas_id" class="form-select @error('kelas_id') is-invalid @enderror">
                <option value="">Pilih Kelas</option>
                @foreach ($kelasList as $kelas)
                    @if (old('kelas_id') == $kelas->id)
                        <option value="{{ $kelas->id }}"selected>{{ $kelas->nama_kelas }}</option>
                    @else
                        <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                    @endif
                @endforeach
            </select>
            @error('kelas_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- guru --}}
        <div class="mb-3">
            <label for="guru_id" class="form-label">Guru</label>
            <select name="guru_id" class="form-select @error('guru_id') is-invalid @enderror">
                <option value="">Pilih Guru</option>
                @foreach ($guruList as $guru)
                    @if (old('guru_id') == $guru->id)
                        <option value="{{ $guru->id }}"selected>{{ $guru->nama }}</option>
                    @else
                        <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                    @endif
                @endforeach
            </select>
            @error('guru_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Alamat --}}
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            @error('alamat')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <textarea name="alamat" class="form-control" id="editor" rows="4">{{ old('alamat') }}</textarea>
        </div>
        <button type="submit" class="btn" style="background-color:#20aee3; color:white">Simpan</button>
    </form>
</div>
@endsection