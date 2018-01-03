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
        if (request()->tahun_ajaran) {
            $thn = request()->tahun_ajaran;
            $pengampu = $pengampu->whereHas('kelas.tahunAjaran', function($q) use($thn){
                $q->where('id', $thn);
            })->with(['matkul', 'dosen', 'kelas'])->paginate(20);
            return response()->json($pengampu);    
        }
        $pengampu = $pengampu->whereHas('kelas.tahunAjaran', function($q){
            $q->aktif();
        })->with(['matkul', 'dosen', 'kelas'])->paginate(20);
        return response()->json($pengampu);
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
            'matkul_id' => 'required',
            'dosen_id' => 'required',
            'kelas_id' => 'required',
            // 'tahun_akademik' => 'required',
        ]);

        Pengampu::updateOrCreate($request->all());

        return response()->json([
            'title' => 'Saved!',
            'message' => 'Berhasil disimpan',
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengampu  $pengampu
     * @return \Illuminate\Http\Response
     */
    public function show(Pengampu $pengampu)
    {
        return response()->json($pengampu);
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
        $this->validate($request, [
            'matkul_id' => 'required',
            'dosen_id' => 'required',
            'kelas_id' => 'required',
            // 'tahun_akademik' => 'required',
        ]);

        $pengampu->update($request->all());

        return response()->json([
            'title' => 'Updated!',
            'message' => 'Berhasil diubah',
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengampu  $pengampu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengampu $pengampu)
    {
        $pengampu->delete();

        return response()->json([
            'title' => 'Deleted!',
            'message' => 'Berhasil dihapus',
        ], 201);
    }
}
