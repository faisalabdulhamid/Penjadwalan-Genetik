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
        return view('ketentuan-matkul.index', compact('ketentuan'));
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
            'matkul' => 'required',
            'ruangan' => 'required',
        ]);

        $ketentuan = new KetentuanMatkul();
        $ketentuan->matkul_id = $request->matkul;
        $ketentuan->ruangan_id = $request->ruangan;
        $ketentuan->save();

        return redirect()->route('ketentuan-matkul.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KetentuanMatkul  $ketentuanMatkul
     * @return \Illuminate\Http\Response
     */
    public function show(KetentuanMatkul $ketentuanMatkul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KetentuanMatkul  $ketentuanMatkul
     * @return \Illuminate\Http\Response
     */
    public function edit(KetentuanMatkul $ketentuanMatkul)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KetentuanMatkul  $ketentuanMatkul
     * @return \Illuminate\Http\Response
     */
    public function destroy(KetentuanMatkul $ketentuanMatkul)
    {
        //
    }
}
