<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\Hari;
use App\Jam;
use App\KetentuanDosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Dosen $dosen)
    {
        if (request()->params) {
            return response()->json($dosen->orderBy('nama')->get());
        }
        return $dosen->paginate(15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dosen.create');
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
            'nidn' => 'required|unique:dosen',
            'nama' => 'required'
        ]);

        Dosen::create($request->all());

        return response()->json([
            'title' => 'Saved!',
            'message' => 'Data Berhasil disimpan'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        return response()->json($dosen);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen)
    {
//        dd($dosen);
        return view('dosen.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dosen $dosen)
    {
        $this->validate($request, [
            'nidn' => 'required',
            'nama' => 'required'
        ]);
        
        $dosen->update($request->all());

        return response()->json([
            'title' => 'Updated!',
            'message' => 'Data Berhasil diubah'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        
        return response()->json([
            'title' => 'Deleted!',
            'message' => 'Data Berhasil Dihapus'
        ], 201);
    }
}
