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
        return view('dosen.index', compact('dosen'));
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

        $dosen = new Dosen();
        $dosen->nidn = $request->nidn;
        $dosen->nama = $request->nama;
        $dosen->save();

        foreach(Hari::all() as $hari){
            foreach(Jam::all() as $jam){
                $ketentuan = new KetentuanDosen();
                $ketentuan->bobot_fitness = 5;
                $ketentuan->dosen_id = $dosen->id;
                $ketentuan->hari_id = $hari->id;
                $ketentuan->jam_id = $jam->id;
                $ketentuan->save();
            }
        }
//        $dosen->attach();

        return redirect()->route('dosen.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        //
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

        $dosen->nidn = $request->nidn;
        $dosen->nama = $request->nama;
        $dosen->save();
        return redirect()->route('dosen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->destroy();
        return redirect()->route('dosen.index');
    }
}
