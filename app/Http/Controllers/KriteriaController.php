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

        // Mengembalikan data dalam bentuk response JSON
        return response()->json($kriteria);
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
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        // Membuat objek Kriteria baru
        $kriteria = new Kriteria();
        $kriteria->nama = $request->input('nama');
        $kriteria->keterangan = $request->input('keterangan');
        $kriteria->save();

        // Mengembalikan respons sukses dengan data Kriteria yang baru dibuat
        return response()->json($kriteria, 201);
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
    public function update(Request $request, Kriteria $kriteria)
    {
        // Validasi data yang diterima dari request
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        // Mengupdate data Kriteria
        $kriteria->nama = $request->input('nama');
        $kriteria->keterangan = $request->input('keterangan');
        $kriteria->save();

        // Mengembalikan respons sukses dengan data Kriteria yang telah diupdate
        return response()->json($kriteria);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kriteria $kriteria)
    {
        // Menghapus data Kriteria
        $kriteria->delete();

        // Mengembalikan respons sukses
        return response()->json(null, 204);
    }
}
