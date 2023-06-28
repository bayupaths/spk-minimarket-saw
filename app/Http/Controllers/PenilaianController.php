<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Minimarket;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\Penilaian;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $minimarkets = Minimarket::all();
        $kriteria = Kriteria::all();
        $subKriteria = SubKriteria::all();
        return view('pages.penilaian.index', [
            'minimarkets' => $minimarkets,
            'kriteria' => $kriteria,
            'subKriteria' => $subKriteria,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'minimarket_id' => 'required',
            'kriteria_id' => 'required',
            'sub_kriteria_id' => 'required',
        ]);

        $kriterias = $request->input('kriteria_id');
        $subKriteria = $request->input('sub_kriteria_id');
        foreach ($kriterias as $key => $kriteria) {
            $data = new Penilaian;
            $data->minimarket_id = $request->input('minimarket_id');
            $data->kriteria_id = $kriteria;
            $data->sub_kriteria_id = $subKriteria[$key];
            $data->save();
        }
        return redirect()->route('penilaian.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
