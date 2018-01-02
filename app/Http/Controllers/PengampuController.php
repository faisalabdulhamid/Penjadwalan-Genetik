<?php

namespace App\Http\Controllers;

use App\Pengampu;
use Illuminate\Http\Request;

class PengampuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Pengampu $pengampu)
    {
        return view('pengampu.index', compact('pengampu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengampu.create');
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
            'matakuliah' => 'required',
            'dosen' => 'required',
            'kelas' => 'required',
            'tahun_akademik' => 'required',
        ]);

        $pengampu = new Pengampu();
        $pengampu->matkul_id = $request->matakuliah;
        $pengampu->dosen_id = $request->dosen;
        $pengampu->kelas_id = $request->kelas;
        $pengampu->tahun_ajaran_id = $request->tahun_akademik;
        $pengampu->save();

        return redirect()->back();
            //->route('pengampu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengampu  $pengampu
     * @return \Illuminate\Http\Response
     */
    public function show(Pengampu $pengampu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengampu  $pengampu
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengampu $pengampu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengampu  $pengampu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengampu $pengampu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengampu  $pengampu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengampu $pengampu)
    {
        //
    }
}
