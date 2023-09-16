<?php

namespace App\Http\Controllers;

use App\Models\IndikatorSosem;
use Illuminate\Http\Request;

class IndikatorSosemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.indikator.Sosem.index')->with([
            'url'           => 'Indikator Sosial dan Emosional',
            'data'          => IndikatorSosem::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.indikator.Sosem.create-Sosem')->with([
            'url'           => 'Tambah Indikator Sosial dan Emosional'
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
            'nomor.required'            => 'Nomor Indikator harus di isi',
            'keterangan.required'           => 'Keterangan Indikator harus di isi',
        ]);
        IndikatorSosem::create($validasi);
        return redirect('/IndikatorSosem')->with('info','Berhasil menambahkan Indikator Sosial dan Emosional');
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
