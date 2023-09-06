<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('dashboard.kelas.index')->with([
            'url'       => 'Kelas',
            'data'      => $kelas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kelas.create-kelas')->with([
            'url'       => 'Tambah Kelas',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_kelas'        => 'required|max:10',
            'tahun_ajaran'      => 'required',
            'semester'          => 'required|max:10',
            'guru_id'           => 'required',
        ],[
            'nama_kelas.required'       => 'Nama Kelas harus di isi',
            'tahun_ajaran.required'     => 'Tahun Ajaran harus di isi',
            'semester.required'         => 'Semester harus di isi',
            'guru_id.required'          => 'Nama Kelas harus di isi',
            'nama_kelas.max'            => 'Nama Kelas maksimal 10',
        ]);
        $kelas = Kelas::create($validasi);
        return redirect('/Kelas')->with('info','Nama Kelas berhasil di tambah');
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
        $kelas = Kelas::where('id',$id)->first();
        return view('dashboard.kelas.edit-kelas')->with([
            'url'       => 'Edit Kelas',
            'data'      => $kelas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Kelas::where('id',$id)->first();
        if($data){
            $validasi = $request->validate([
                'nama_kelas'        => 'required|max:10',
                'tahun_ajaran'      => 'required',
                'semester'          => 'required|max:10',
                'guru_id'           => 'required',
            ],[
                'nama_kelas.required'       => 'Nama Kelas harus di isi',
                'tahun_ajaran.required'     => 'Tahun Ajaran harus di isi',
                'semester.required'         => 'Semester harus di isi',
                'guru_id.required'          => 'Nama Kelas harus di isi',
                'nama_kelas.max'            => 'Nama Kelas maksimal 10',
            ]);
            $data->update($validasi);
            return redirect('/Kelas')->with('info','Nama Kelas berhasil di update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelas = Kelas::where('id',$id)->first();
        $delete = $kelas->delete();
        return redirect('/Kelas')->with('info','Kelas Berhasil di hapus');
    }
}
