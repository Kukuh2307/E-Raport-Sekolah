@extends('dashboard.layout.main')
@section('content')
<div class="row">
    <h1>Tambah Indikator Seni</h1>
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
    <form action="/IndikatorSeni" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nomor" class="form-label">Nomor Indikator</label>
            <input type="text" class="form-control @error('nomor') is-invalid @enderror" id="nomor" name="nomor" value="{{ old('nomor') }}">
            @error('nomor')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            @error('keterangan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="7">{{ old('keterangan') }}</textarea>
        </div>
        
        <button type="submit" class="btn" style="background-color:#20aee3; color:white">Simpan</button>
    </form>
</div>
@endsection