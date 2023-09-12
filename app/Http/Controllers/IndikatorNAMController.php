<?php

namespace App\Http\Controllers;

use App\Models\IndikatorNAM;
use Illuminate\Http\Request;

class IndikatorNAMController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.indikator.NAM.index')->with([
            'url'           => 'Indikator NAM',
            'data'          => IndikatorNAM::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.indikator.NAM.create-NAM')->with([
            'url'           => 'Tambah Indikator NAM',
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
            'nomor.required'                => 'Nomor Indikator harus di isi',
            'keterangan.required'                    => 'Keterangan indikator harus di isi',
        ]);
        IndikatorNAM::create($validasi);
        return redirect('/IndikatorNAM')->with('info','Berhasil menambahkan Indikator Nilai Agama dan Moral');
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
        $indikator = IndikatorNAM::where('id',$id)->first();
        return view('dashboard.indikator.NAM.edit-NAM')->with([
            'url'           => 'Edit Indikator Nilai Agama dan Moral',
            'data'          => $indikator,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $indikator = IndikatorNAM::find($id);

    if (!$indikator) {
        return redirect('/IndikatorNAM')->with('error', 'Indikator tidak ditemukan');
    }

    $validasi = $request->validate([
        'nomor' => 'required',
        'keterangan' => 'required',
    ], [
        'nomor.required' => 'Nomor Indikator harus di isi',
        'keterangan.required' => 'Keterangan indikator harus di isi',
    ]);

    $indikator->update($validasi);
    return redirect('/IndikatorNAM')->with('info', 'Indikator berhasil di update');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $indikator = IndikatorNAM::find($id);
        if (!$indikator) {
            return redirect('/IndikatorNAM')->with('error', 'Indikator tidak ditemukan');
        }
        $delete = $indikator->delete();
        return redirect('/IndikatorNAM')->with('info','Berhasil menghapus indikatior');
    }
}
