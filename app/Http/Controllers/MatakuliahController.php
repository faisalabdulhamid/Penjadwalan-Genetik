<?php

namespace App\Http\Controllers;

use App\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Matakuliah $matakuliah)
    {
        if (request()->params) {
            return response()->json($matakuliah->orderBy('semester')->orderBy('id')->get());
        }
        return response()->json($matakuliah->orderBy('semester')->orderBy('id')->paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matkul.create');
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
            'kode_mk' => 'required|unique:matakuliah',
            'nama' => 'required',
            'sks' => 'required',
            'semester' => 'required',
            'jenis' => 'required',
        ]);

        Matakuliah::create($request->all());
        
        return response()->json([
            'title' => 'Saved!',
            'message' => 'Berhasil disimpan'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function show(Matakuliah $matakuliah)
    {
        return response()->json($matakuliah);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function edit(Matakuliah $matakuliah)
    {

//        return view('matkul.edit', compact('matakuliah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matakuliah $matakuliah)
    {
        $this->validate($request, [
            'kode_mk' => 'required',
            'nama' => 'required',
            'sks' => 'required',
            'semester' => 'required',
            'jenis' => 'required',
        ]);

        $matakuliah->update($request->all());

        return response()->json([
            'title' => 'Updated!',
            'message' => 'Berhasil diubah'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->delete();
        
        return response()->json([
            'title' => 'Deleted!',
            'message' => 'Berhasil dihapus'
        ], 201);
    }
}
