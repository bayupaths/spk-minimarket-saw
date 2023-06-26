<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Minimarket;

class MinimarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $minimarkets = Minimarket::all();
        return view('pages.minimarket.index', [
            'minimarkets' => $minimarkets
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
            'kode' => 'required|unique:minimarkets,kode',
            'nama' => 'required|max:225',
            'alamat' => 'required',
            'telepon' => 'required'
        ]);

        $data = $validateData;
        Minimarket::create($data);
        return redirect()->route('minimarket.index');
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
        $minimarket = Minimarket::findOrFail($id);
        $minimarkets = Minimarket::all();
        return view('pages.minimarket.edit', [
            'minimarket' => $minimarket,
            'minimarkets' => $minimarkets,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Minimarket $minimarket)
    {
        $validateData = $request->validate([
            'kode' => 'required|unique:minimarkets,kode' . $minimarket->id,
            'nama' => 'required|max:225',
            'alamat' => 'required',
            'telepon' => 'required'
        ]);

        $minimarket->update($validateData);
        return redirect()->route('minimarket.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Minimarket $minimarket)
    {
        $minimarket->delete();
        return redirect()->route('minimarket.index');
    }
}