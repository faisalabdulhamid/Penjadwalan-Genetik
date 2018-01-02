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
    public function index(Matakuliah $matkul)
    {
        return view('matkul.index', compact('matkul'));
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

        $matkul = new Matakuliah();
        $matkul->kode_mk = $request->kode_mk;
        $matkul->nama = $request->nama;
        $matkul->sks = $request->sks;
        $matkul->semester = $request->semester;
        $matkul->jenis = $request->jenis;
        $matkul->save();
        return redirect()->route('matkul.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function show(Matakuliah $matakuliah)
    {
        //
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
    public function update(Request $request, Matakuliah $matkul)
    {
        $this->validate($request, [
            'kode_mk' => 'required',
            'nama' => 'required',
            'sks' => 'required',
            'semester' => 'required',
            'jenis' => 'required',
        ]);
        $matkul->kode_mk = $request->kode_mk;
        $matkul->nama = $request->nama;
        $matkul->sks = $request->sks;
        $matkul->semester = $request->semester;
        $matkul->jenis = $request->jenis;
        $matkul->save();
        return redirect()->route('matkul.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->destroy();
        return redirect()->route('matkul.index');
    }
}
