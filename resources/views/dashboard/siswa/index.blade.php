@extends('dashboard.layout.main')
@section('content')
<div class="table-responsive mt-3 no-wrap">
    <table class="table vm no-th-brd pro-of-month" id="myTable">
        <div class="text-start mt-1">
            <a href="/Siswa/create"
                class="btn waves-effect waves-light btn-info hidden-md-down text-white"> Tambah</a>
            @if (Session::get('info'))
            <div class="alert alert-info mt-2">
                {{ Session::get('info') }}
            </div>
            @elseif($errors->any())
            <div class="alert alert-danger">
                {{ 'Error!!' }}
            </div>  
            @endif
        </div>
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Siswa</th>
                <th>Nomor Induk</th>
                <th>Guru</th>
                <th>Kelas</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            
    </table>
</div>
@endsection