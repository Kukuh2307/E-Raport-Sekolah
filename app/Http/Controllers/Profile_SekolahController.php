<?php

namespace App\Http\Controllers;

use App\Models\Profile_Sekolah;
use Illuminate\Http\Request;

class Profile_SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.profile.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_sekolah'          => 'required|max:100',
            'foto'                  => 'image|file|max:5120',
            'status_sekolah'        => 'required',
            'kepala_tk'             => 'required',
            'jumlah_guru'           => 'required',
            'email'                 => 'required',
            'alamat_sekolah'        => 'required',
        ],[
            'nama_sekolah.required'         => 'Nama Sekolah harus di isi',
            'status_sekolah.required'       => 'Status Sekolah harus di isi',
            'kepala_tk.required'            => 'Nama Kepala TK harus di isi',
            'jumlah_guru.required'          => 'jumlah guru harus di isi',
            'email.required'                => 'Alamat Email Sekolah harus di isi',
            'alamat_sekolah.required'       => 'Alamat Sekolah harus di isi',
            'foto.max'                      => 'Ukuran Maksimal Foto 5 MB',
            'foto.image'                    => 'Gambar harus format foto',
        ]);

        // jika ada foto yng di upload
        if($request->hasFile('foto') && $request->file('foto')->isValid()){

            $foto = $request->file('foto')->hashName();
            // upload ke folder
            $request->file('foto')->move(public_path('images'), $foto);
            $validasi['foto'] = $foto;
        }
        $profileSekolah = new Profile_Sekolah($validasi);
        $profileSekolah->save();
        return back()->with('info','Profile Sekolah Berhasil di update');
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
