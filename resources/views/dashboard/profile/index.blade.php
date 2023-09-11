@extends('dashboard.layout.main')
@section('content')
<div class="row">
    <h1>Profile Sekolah</h1>
    {{-- cek apakah ada session yang dikirim atau error --}}
    @if (Session::get('info'))
        <div class="alert alert-info">
            {{ Session::get('info') }}
        </div>
    @elseif($errors->any())
        <div class="alert alert-danger">
            {{ 'Edit Profile Sekolah gagal' }}
        </div>
    @endif
    <form action="/Profile-Sekolah/{{ $data->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Nama Sekolah -->
        <div class="mb-3">
            <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
            <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" id="nama_sekolah" name="nama_sekolah" value="{{ old('nama_sekolah',$data->nama_sekolah) }}">
            @error('nama_sekolah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <!-- Foto Sekolah -->
        <div class="mb-3">
            <label for="foto" class="form-label">Foto Sekolah</label>
            <input type="hidden" name="gambarLama">
            @if ($data->foto)
                <img src="{{ asset('images/'.$data->foto) }}" class="img-fluid tampil-gambar mb-3 col-lg-5 d-block" width="500px" alt="">
            @else
                <img src="" alt="" width="500px" class="img-fluid tampil-gambar mb-3 col-lg-5 d-block">
            @endif
            {{-- <img src="" alt="" width="500px" class="img-fluid tampil-gambar mb-3"> --}}
            <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="gambar" onchange="tampilGambar()">
            @error('foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Status Sekolah -->
        <div class="mb-3">
            <label for="status_sekolah" class="form-label">Status Sekolah</label>
            <select class="form-select @error('status_sekolah') is-invalid @enderror" id="status_sekolah" name="status_sekolah" value="{{ old('status_sekolah',$data->status_sekolah) }}" id="status_sekolah" name="status_sekolah">
                @if ($data->status_sekolah)
                <option value="{{ $data->status_sekolah }}">{{ $data->status_sekolah }}</option>
                @endif
                <option value="">Pilih Status Sekolah</option>
                <option value="Negeri">Negeri</option>
                <option value="Swasta">Swasta</option>
            </select>
            @error('status_sekolah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- kepala sekolah --}}
        <div class="mb-3">
            <label for="kepala_tk" class="form-label">Kepala Sekolah</label>
            <input type="text" class="form-control @error('kepala_tk') is-invalid @enderror" id="kepala_tk" name="kepala_tk" value="{{ old('kepala_tk',$data->kepala_tk) }}">
            @error('kepala_tk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Jumlah Guru -->
        <div class="mb-3">
            <label for="jumlah_guru" class="form-label">Jumlah Guru</label>
            <input type="number" class="form-control @error('jumlah_guru') is-invalid @enderror" id="jumlah_guru" name="jumlah_guru" value="{{ old('jumlah_guru',$data->jumlah_guru) }}">
            @error('jumlah_guru')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Email Sekolah -->
        <div class="mb-3">
            <label for="email" class="form-label">Email Sekolah</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email',$data->email) }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Alamat Sekolah -->
        <div class="mb-3">
            <label for="alamat_sekolah" class="form-label">Alamat Sekolah</label>
            @error('alamat_sekolah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <textarea class="form-control @error('alamat_sekolah') is-invalid @enderror" id="alamat_sekolah" name="alamat_sekolah" rows="3">{{ old('alamat_sekolah',$data->alamat_sekolah) }}</textarea>
        </div>

        <button type="submit" class="btn" style="background-color:#20aee3; color:white">Update</button>
    </form>
</div>
@endsection