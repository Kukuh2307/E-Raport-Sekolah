<?php

namespace App\Http\Controllers;

use App\Models\IndikatorSeni;
use Illuminate\Http\Request;

class IndikatorSeniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.indikator.Seni.index')->with([
            'url'           => 'Indikator Seni',
            'data'          => IndikatorSeni::orderBy('nomor','asc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.indikator.Seni.create-Seni')->with([
            'url'           => 'Tambah Indikator Seni'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nomor'                 => 'required',
            'keterangan'            => 'required',
        ],[
            'nomor.required'                         => 'Nomor Indikator harus di isi',
            'keterangan.required'                    => 'Keterangan indikator harus di isi',
        ]);
        IndikatorSeni::create($validasi);
        return redirect('/IndikatorSeni')->with('info','Berhasil menambahkan Indikator Seni');
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
        $indikator = IndikatorSeni::where('id',$id)->first();
        return view('dashboard.indikator.Seni.edit-Seni')->with([
            'url'           => 'Edit Indikator Seni',
            'data'          => $indikator,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $indikator = IndikatorSeni::find($id);

    if (!$indikator) {
        return redirect('/IndikatorSeni')->with('error', 'Indikator tidak ditemukan');
    }

    $validasi = $request->validate([
        'nomor' => 'required',
        'keterangan' => 'required',
    ], [
        'nomor.required' => 'Nomor Indikator harus di isi',
        'keterangan.required' => 'Keterangan indikator harus di isi',
    ]);

    $indikator->update($validasi);
    return redirect('/IndikatorSeni')->with('info', 'Indikator berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $indikator = IndikatorSeni::find($id);
        if(!$indikator){
            return redirect('/IndikatorSeni')->with('error','Indikator tidak di temukan');
        }
        $delete = $indikator->delete();
        return redirect('/IndikatorSeni')->with('info','Berhasil menghapus indikator');
    }
}
