<?php

namespace App\Http\Controllers;

use App\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TahunAjaran $tahun_ajaran)
    {
        if (request()->tahun) {
            return response()->json($tahun_ajaran->all());
        }
        return response()->json($tahun_ajaran->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tahun-ajaran.create');
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
            'tahun_ajaran' => 'required|unique:tahun_ajaran',
        ]);

        TahunAjaran::create($request->all());

        return response()->json([
            'title' => 'Saved!',
            'message' => 'Berhasil Disimpan'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TahunAjaran  $tahunAjaran
     * @return \Illuminate\Http\Response
     */
    public function show(TahunAjaran $tahunAjaran)
    {
        return response()->json($tahunAjaran);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TahunAjaran  $tahunAjaran
     * @return \Illuminate\Http\Response
     */
    public function edit(TahunAjaran $tahunAjaran)
    {
        $id = $tahunAjaran->id;
        
        DB::table('tahun_ajaran')->where('aktif', '=', 1)->update(['aktif' => null]);

        $th = TahunAjaran::find($id);
        $th->aktif = 1;
        $th->save();

        return response()->json([
            'title' => 'Checked!',
            'message' => 'Berhasil diubah',
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TahunAjaran  $tahunAjaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TahunAjaran $tahunAjaran)
    {
        $this->validate($request, [
            'tahun_ajaran' => 'required',
        ]);

        $tahunAjaran->update($request->all());

        return response()->json([
            'title' => 'Updated!',
            'message' => 'Berhasil diubah'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TahunAjaran  $tahunAjaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(TahunAjaran $tahunAjaran)
    {
        $tahunAjaran->delete();
        return response()->json([
            'title' => 'Deleted!',
            'message' => 'Berhasil Dihapus'
        ], 201);
    }
}
