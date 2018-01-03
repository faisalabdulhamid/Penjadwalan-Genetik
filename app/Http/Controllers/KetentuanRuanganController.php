<?php

namespace App\Http\Controllers;

use App\KetentuanRuangan;
use Illuminate\Http\Request;

class KetentuanRuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(KetentuanRuangan $ketentuan)
    {

        return response()->json($ketentuan->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'ruangan_id' => 'required',
            'hari_id' => 'required',
        ]);

        KetentuanRuangan::updateOrCreate($request->all());

        return response()->json([
                    'title' => 'Saved!',
                    'message' => 'Berhasil ditambahkan'
                ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KetentuanRuangan  $ketentuanRuangan
     * @return \Illuminate\Http\Response
     */
    public function show(KetentuanRuangan $ketentuanRuangan)
    {
        return response()->json($ketentuanRuangan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KetentuanRuangan  $ketentuanRuangan
     * @return \Illuminate\Http\Response
     */
    public function edit(KetentuanRuangan $ketentuanRuangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KetentuanRuangan  $ketentuanRuangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KetentuanRuangan $ketentuanRuangan)
    {
        $this->validate($request, [
            'ruangan_id' => 'required',
            'hari_id' => 'required',
        ]);

        $ketentuanRuangan->update($request->all());

        return response()->json([
                    'title' => 'Updated!',
                    'message' => 'Berhasil diubah'
                ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KetentuanRuangan  $ketentuanRuangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(KetentuanRuangan $ketentuanRuangan)
    {
        $ketentuanRuangan->delete();
        return response()->json([
                        'title' => 'Deleted!',
                        'message' => 'Berhasil dihapus'
                    ], 201);
    }
}
