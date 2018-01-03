<?php

namespace App\Http\Controllers;

use App\KetentuanMatkul;
use Illuminate\Http\Request;

class KetentuanMatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(KetentuanMatkul $ketentuan)
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
        return view('ketentuan-matkul.create');
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
            'matkul_id' => 'required',
            'ruangan_id' => 'required',
        ]);

        KetentuanMatkul::updateOrCreate($request->all());

        return response()
            ->json([
                'title' => 'Saved!',
                'message' => 'Berhasil disimpan'
            ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KetentuanMatkul  $ketentuanMatkul
     * @return \Illuminate\Http\Response
     */
    public function show(KetentuanMatkul $ketentuanMatkul)
    {
        return response()->json($ketentuanMatkul);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KetentuanMatkul  $ketentuanMatkul
     * @return \Illuminate\Http\Response
     */
    public function edit(KetentuanMatkul $ketentuanMatkul)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KetentuanMatkul  $ketentuanMatkul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KetentuanMatkul $ketentuanMatkul)
    {
        $this->validate($request, [
            'matkul_id' => 'required',
            'ruangan_id' => 'required',
        ]);

        $ketentuanMatkul->update($request->all());

        return response()
            ->json([
                'title' => 'Updated!',
                'message' => 'Berhasil diubah'
            ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KetentuanMatkul  $ketentuanMatkul
     * @return \Illuminate\Http\Response
     */
    public function destroy(KetentuanMatkul $ketentuanMatkul)
    {
        $ketentuanMatkul->delete();

        return response()->json([
                        'title' => 'Deleted!',
                        'message' => 'Berhasil dihapus'
                    ], 201);
    }
}
