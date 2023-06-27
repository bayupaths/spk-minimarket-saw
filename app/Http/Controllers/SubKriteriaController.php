<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubKriteria;
use App\Models\Kriteria;

class SubKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subKriteria = SubKriteria::with(['kriteria'])->get();
        $kriteria = Kriteria::all();
        return view('pages.sub_kriteria.index', [
            'subKriteria' => $subKriteria,
            'kriteria' => $kriteria
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
        $validateData = $request->validate([
            'kriteria_id' => 'required',
            'nilai' => 'required|between:0,99.99',
            'keterangan' => 'required'
        ]);

        $subKriteria = new SubKriteria();
        $subKriteria->create($validateData);
        return redirect()->route('sub_kriteria.index');
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
        $subKriteria = SubKriteria::with(['kriteria'])->get();
        $subKriteriaUpdate = SubKriteria::with('kriteria')->find($id);
        $kriteria = Kriteria::all();
        return view('pages.sub_kriteria.edit', [
            'subKriteria' => $subKriteria,
            'subKriteriaUpdate' => $subKriteriaUpdate,
            'kriteria' => $kriteria
        ]);
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
        $subKriteria = SubKriteria::findOrFail($id);
        $validateData = $request->validate([
            'kriteria_id' => 'required',
            'nilai' => 'required|between:0,99.99',
            'keterangan' => 'required'
        ]);
        $subKriteria->update($validateData);
        return redirect()->route('sub_kriteria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subKriteria = SubKriteria::findOrFail($id);
        $subKriteria->delete();
        return redirect()->route('sub_kriteria.index');
    }
}
