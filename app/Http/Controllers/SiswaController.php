<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.siswa.index')->with([
            'url'           => 'Siswa',
            // 'data'          => Siswa::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.siswa.create-siswa')->with([
            'url'       => 'Tambah Siswa',
            'kelasList' => Kelas::all(),
            'guruList'  => Guru::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'foto'          => 'image|file|max:5120',
            'nama'          => 'required|max:255',
            'alamat'        => 'required|',
            'nomor_induk'   => 'required',
            'kelas_id'      => 'required',
            'guru_id'       => 'required',
        ], [
            'nama.required'           => 'Nama guru harus di isi',
            'foto.max'                => 'Nama Kelas maksimal 10 karakter',
            'alamat.required'         => 'Alamat harus di isi',
            'nomor_induk.required'    => 'Nomor Induk harus di isi',
            'kelas_id.required'       => 'Kelas harus di isi',
            'guru_id.required'        => 'Guru harus di isi',
        ]);
        // cek foto
        if($request->file('foto')->isValid()){
            $foto = $request->file('foto')->hashName();
            $request->file('foto')->move(public_path('images'),$foto);
            $validasi['foto'] = $foto;
        }
        $siswa = Siswa::create($validasi);
        return redirect('/Siswa')->with('info','Berhasil Menambahkan siswa baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
