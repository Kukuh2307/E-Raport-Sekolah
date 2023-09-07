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
    <form action="/Kelas/{{ $data->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Nama Kelas -->
        <div class="mb-3">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas" name="nama_kelas" value="{{ old('nama_kelas',$data->nama_kelas) }}">
            @error('nama_kelas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Guru Pengajar -->
        <div class="mb-3">
            <label for="status_sekolah" class="form-label">Guru Pengajar</label>
            <select class="form-select @error('guru_id') is-invalid @enderror" id="guru_id" name="guru_id" value="{{ old('guru_id',$data->guru_id) }}" id="guru_id" name="guru_id">
                @if ($data->guru_id)
                <option value="{{ $data->guru_id }}">{{ $data->guru_id }}</option>
                @endif
                <option value="">Pilih Guru Pengajar</option>
                <option value="1">Sri Endah S.Pd</option>
                <option value="2">Sumiatin S.Pd</option>
                <option value="3">Muyamah S.Pd</option>
                <option value="4">Neneng Indrawati</option>
            </select>
            @error('guru_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Tahun Ajaran -->
        <div class="mb-3">
            <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
            <input type="text" class="form-control @error('tahun_ajaran') is-invalid @enderror" id="tahun_ajaran" name="tahun_ajaran" value="{{ old('tahun_ajaran',$data->tahun_ajaran) }}">
            @error('tahun_ajaran')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- semester --}}
        <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <input type="number" class="form-control @error('semester') is-invalid @enderror" id="semester" name="semester" value="{{ old('semester',$data->semester) }}">
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