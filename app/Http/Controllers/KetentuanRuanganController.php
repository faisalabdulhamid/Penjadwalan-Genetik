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
        return view('ketentuan-ruangan.index', compact('ketentuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ketentuan-ruangan.create');
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
            'ruangan' => 'required',
            'hari' => 'required',
        ]);

        $ketentuan = new KetentuanRuangan();
        $ketentuan->ruangan_id = $request->ruangan;
        $ketentuan->hari_id = $request->hari;
        $ketentuan->save();

        return redirect()->route('ketentuan-ruangan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KetentuanRuangan  $ketentuanRuangan
     * @return \Illuminate\Http\Response
     */
    public function show(KetentuanRuangan $ketentuanRuangan)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KetentuanRuangan  $ketentuanRuangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(KetentuanRuangan $ketentuanRuangan)
    {
        //
    }
}
