<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Kelas $kela)
    {
        if (request()->params) {
            return response()->json($kela->hasPengampu()->wherehas('tahunAjaran', function($q){
                $q->aktif();
            })->get());
        }

        if (!is_null(request()->tahun_ajaran)) {
            $thn = request()->tahun_ajaran;
            return response()->json($kela->wherehas('tahunAjaran', function($q) use($thn){
                $q->where('id', $thn);
            })->paginate(20));
        }

        return response()->json($kela->paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelas.create');
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
            'kelas' => 'required',
        ]);

        if ($request->banyak) {
            for ($i=1; $i <= $request->banyak; $i++) { 
                Kelas::create(['kelas' => $request->kelas.'-'.$i]);
            }
        }else{
            Kelas::create($request->all());    
        }
        

        return response()->json([
            'title' => 'Saved!',
            'message' => 'Berhasil disimpan',
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelas  $kela
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kela)
    {
        return response()->json($kela);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelas  $kela
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kela)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelas  $kela
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kela)
    {
        $this->validate($request, [
            'kelas' => 'required',
        ]);

        $kela->update($request->all());

        return response()->json([
            'title' => 'Updated!',
            'message' => 'Berhasil diubah',
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kela
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kela)
    {
        $kela->delete();
        
        return response()->json([
            'title' => 'Deleted!',
            'message' => 'Berhasil dihapus',
            'kelas' => $kela,
        ], 201);
    }
}
