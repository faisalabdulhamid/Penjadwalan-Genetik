<?php

namespace App\Http\Controllers;

use App\Hari;
use Illuminate\Http\Request;

class HariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Hari $hari)
    {
        if (request()->params) {
            return response()->json($hari->all());
        }
        return response()->json($hari->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hari.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|unique:hari'
        ]);

        Hari::create($request->all());

        return response()->json([
            'title' => 'Saved!',
            'message' => 'Data Berhasil disimpan',
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hari  $hari
     * @return \Illuminate\Http\Response
     */
    public function show(Hari $hari)
    {
        return response()->json($hari);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hari  $hari
     * @return \Illuminate\Http\Response
     */
    public function edit(Hari $hari)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hari  $hari
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hari $hari)
    {
        $this->validate($request, [
            'nama' => 'required|unique:hari'
        ]);

        $hari->update($request->all());

        return response()->json([
            'title' => 'Updated!',
            'message' => 'Data Berhasil diubah',
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hari  $hari
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hari $hari)
    {
        $hari->delete();
        
        return response()->json([
            'title' => 'Deleted!',
            'message' => 'Data Berhasil di hapus',
        ], 201);
    }
}
