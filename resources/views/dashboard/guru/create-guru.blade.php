@extends('dashboard.layout.main')
@section('content')
<div class="row">
    <h1>Tambah Guru</h1>
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
    <form action="/Guru" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- @dd($kelasList) --}}
        <!-- Foto Guru -->
        <div class="mb-3">
            <label for="foto" class="form-label">Foto Guru</label>
            <img src="" alt="" width="500px" class="img-fluid tampil-gambar mb-3 col-lg-5 d-block">
            <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="gambar" onchange="tampilGambar()">
            @error('foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Nama Guru --}}
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Guru <i>*Tambahkan gelar di belakang nama</i></label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- email --}}
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- tanggal lahir --}}
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
            @error('tanggal_lahir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <!-- Kelas -->
        <div class="mb-3">
            <label for="kelas_id" class="form-label">Kelas</label>
            <select name="kelas_id" class="form-select @error('kelas_id') is-invalid @enderror">
                <option value="">Pilih Kategori</option>
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
        <button type="submit" class="btn" style="background-color:#20aee3; color:white">Simpan</button>
    </form>
</div>
@endsection