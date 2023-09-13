<?php

namespace App\Http\Controllers;

use App\Models\IndikatorKognitif;
use Illuminate\Http\Request;

class IndikatorKognitifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.indikator.Kognitif.index')->with([
            'url'           => 'Indikator Kognitif',
            'data'          => IndikatorKognitif::orderBy('nomor','asc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.indikator.Kognitif.create-Kognitif')->with([
            'url'           => 'Tambah Indikator Kognitif',
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
            'nomor.required'                        => 'Nomor Indikator harus di isi',
            'keterangan.required'                    => 'Keterangan indikator harus di isi',
        ]);
        IndikatorKognitif::create($validasi);
        return redirect('/IndikatorKognitif')->with('info','Berhasil menambahkan Indikator Kognitif');
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
        $indikator = IndikatorKognitif::where('id',$id)->first();
        return view('dashboard.indikator.Kognitif.edit-Kognitif')->with([
            'url'               => 'Edit Indikator Kognitif',
            'data'               => $indikator,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $indikator = IndikatorKognitif::find($id);

        if (!$indikator) {
            return redirect('/IndikatorKognitif')->with('error', 'Indikator tidak ditemukan');
        }
    
        $validasi = $request->validate([
            'nomor'         => 'required',
            'keterangan'    => 'required',
        ], [
            'nomor.required'        => 'Nomor Indikator harus di isi',
            'keterangan.required'   => 'Keterangan indikator harus di isi',
        ]);
    
        $indikator->update($validasi);
        return redirect('/IndikatorKognitif')->with('info', 'Indikator berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $indikator = IndikatorKognitif::find($id);
        if (!$indikator) {
            return redirect('/IndikatorKognitif')->with('error', 'Indikator tidak ditemukan');
        }
        $delete = $indikator->delete();
        return redirect('/IndikatorKognitif')->with('info','Berhasil menghapus indikatior');
    }
}
