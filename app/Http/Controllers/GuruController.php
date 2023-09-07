<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.guru.index')->with([
            'url'           => 'Guru',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.guru.create-guru')->with([
            'url'           => 'Tambah Guru',
            'kelasList'     => Kelas::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validasi data kelas
        $validasi = $request->validate([
            'nama'          => 'required|max:255',
            'email'         => 'required|email|unique:gurus',
            'tanggal_lahir' => 'required|date',
            'foto'          => 'image|file|max:5120', // Sesuaikan dengan aturan validasi foto.
            'kelas_id'      => 'required', // Sesuaikan dengan aturan validasi kelas_id.
        ], [
            'nama.required'           => 'Nama guru harus di isi',
            'email.required'          => 'Tahun Ajaran harus di isi',
            'tanggal_lahir.required'  => 'tanggal lahir harus di isi',
            'foto.max'                => 'Nama Kelas maksimal 10 karakter',
            'kelas_id.required'       => 'Kelas harus di isi',
        ]);
         // jika ada foto yng di upload
        if($request->hasFile('foto') && $request->file('foto')->isValid()){
    
            $foto = $request->file('foto')->hashName();
            // upload ke folder
            $request->file('foto')->move(public_path('images'), $foto);
            $validasi['foto'] = $foto;
        }
        $validasi['sekolah_id'] = 3;
        // dd($validasi);    
        $guru = Guru::create($validasi);
        return redirect('/Guru')->with('info','Berhasil menambahkan guru baru');
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
