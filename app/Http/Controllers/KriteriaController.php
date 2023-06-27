<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua data kriteria
        $kriteria = Kriteria::all();
        // menembalikan
        return view('pages.kriteria.index', [
            'kriteria' => $kriteria,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        $request->validate([
            'kode' => 'required|unique:kriteria,kode',
            'nama' => 'required|max:125',
            'tipe' => 'required|in:cost,benefit',
            'bobot' => 'required|between:0,99.99',
            'keterangan' => 'required'
        ]);

        // Membuat objek Kriteria baru
        $kriteria = new Kriteria();
        $kriteria->kode = $request->input('kode');
        $kriteria->nama = $request->input('nama');
        $kriteria->tipe = $request->input('tipe');
        $kriteria->bobot = $request->input('bobot');
        $kriteria->keterangan = $request->input('keterangan');
        $kriteria->save();

        return redirect()->route('kriteria.index');

        // Mengembalikan respons sukses dengan data Kriteria yang baru dibuat
        // return response()->json($kriteria, 201);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Kriteria::findOrFail($id);
        $kriteria = Kriteria::all();
        return view('pages.kriteria.edit', [
            'item' => $item,
            'kriteria' => $kriteria
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $kriteria)
    {
        // Mengembalikan data Kriteria yang spesifik dalam bentuk response JSON
        return response()->json($kriteria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kriteria = Kriteria::findOrFail($id);
        // Validasi data yang diterima dari request
        $validateData = $request->validate([
            'nama' => 'required|max:125',
            'tipe' => 'required|in:cost,benefit',
            'bobot' => 'required|between:0,99.99',
            'keterangan' => 'required'
        ]);

        // Mengupdate kriteria
        $kriteria->update($validateData);

        // Mengembalikan respons sukses dengan data Kriteria yang telah diupdate
        return redirect()->route('kriteria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Menghapus data Kriteria
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete();
        return redirect()->route('kriteria.index');
    }
}
