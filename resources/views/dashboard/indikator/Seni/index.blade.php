@extends('dashboard.layout.main')
@section('content')
<div class="table-responsive mt-3 no-wrap">
    <table class="table vm no-th-brd pro-of-month" id="myTable">
        <div class="text-start mt-1">
            <a href="/IndikatorSeni/create"
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
                <th>Nomor Indikator</th>
                <th class="text-center">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $dt)
            <tr>
                <td><h5>{{ $no++ }}</h5></td>
                <td class="text-center">
                    <h5>{{ $dt->nomor }}</h5>
                </td>
                <td>
                    <h5 class="text-wrap">{{ $dt->keterangan }}</h5>
                </td>    
                <td>
                    <a href="/IndikatorSeni/{{ $dt->id }}/edit"
                    class="btn waves-effect waves-light btn-warning hidden-md-down text-white"><i class="fa fa-pencil"></i></a>
                        <form action="/IndikatorSeni/{{ $dt->id }}" method="POST" onsubmit="return('Apakah anda yakin ingin menghapus kelas??')">
                        @csrf
                        @method('DELETE')
                        <button
                        class="btn waves-effect waves-light btn-danger hidden-md-down text-white"><i class="fa fa-trash"></i></button>
                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection