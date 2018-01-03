<?php

namespace App\Http\Controllers;

use App\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Ruangan $ruangan)
    {
        if (request()->params) {
            return response()->json($ruangan->all());
        }
        
        return response()->json($ruangan->paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ruangan.create');
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
            'nama' => 'required|unique:ruangan',
            'kapasitas' => 'numeric',
            'jenis' => 'required'
        ]);

        Ruangan::create($request->all());

        return response()->json([
            'title' => 'Saved!',
            'message' => 'Berhasil disimpan',
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function show(Ruangan $ruangan)
    {
        return response()->json($ruangan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function edit(Ruangan $ruangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ruangan $ruangan)
    {
        $this->validate($request, [
            'nama' => 'required',
            'kapasitas' => 'numeric',
            'jenis' => 'required'
        ]);

        $ruangan->update($request->all());
        return response()->json([
            'title' => 'Updated!',
            'message' => 'Berhasil disimpan',
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ruangan $ruangan)
    {
        $ruangan->delete();

        return response()->json([
            'title' => 'Deleted!',
            'message' => 'Berhasil dihapus',
        ], 201);
    }
}
