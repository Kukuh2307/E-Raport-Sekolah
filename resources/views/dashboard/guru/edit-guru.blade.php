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
    <form action="/Guru/{{ $data->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Foto Guru -->
        <div class="mb-3">
            <label for="foto" class="form-label">Foto Guru</label>
            <input type="hidden" value="{{ $data->foto }}" name="gambarLama">
            @if ($data->foto)
                <img src="{{ asset('images/'.$data->foto) }}" alt="{{ $data->nama }}" width="70px" class="img-fluid tampil-gambar mb-3 col-lg-5 d-block">
            @else
                <img src="" alt="{{ $data->nama }}" width="70"class="img-fluid tampil-gambar mb-3 col-lg-5 d-block">
            @endif
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
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama',$data->nama) }}">
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- email --}}
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email',$data->email) }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- tanggal lahir --}}
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="date" name="tanggal_lahir" value="{{ old('tanggal_lahir',$data->tanggal_lahir) }}">
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
                @if ($data->tabelKelas)
                    <option value="{{ $data->tabelKelas->id }}">{{ $data->tabelKelas->nama_kelas }}</option>
                @endif
                <option value="">Pilih Kelas</option>
                @foreach ($kelasList as $kelas)
                    <option value="{{ $kelas->id }}" {{ old('kelas_id', $data->kelas_id) == $kelas->id ? 'selected' : '' }}>
                        {{ $kelas->nama_kelas }}
                    </option>
                @endforeach
            </select>
            @error('kelas_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <button type="submit" class="btn" style="background-color:#20aee3; color:white">Update</button>
    </form>
</div>
@endsection