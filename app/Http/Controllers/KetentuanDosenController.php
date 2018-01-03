<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\KetentuanDosen;
use Illuminate\Http\Request;

class KetentuanDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->dosen) {
            $id = request()->dosen;
            $ketentuan = KetentuanDosen::where('dosen_id', $id)->get();
            return response()->json($ketentuan);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'hari_id' => 'required',
            'jam_id' => 'required',
            'dosen_id' => 'required',
        ]);

        KetentuanDosen::create($request->all());

        return response()->json([
            'title' => 'Saved!',
            'message' => 'Berhasil disimpan'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Dosen $dosen)
    {
        $dosen = $dosen->find($id);
        return view('ketentuan-dosen.index', compact('dosen', 'ketentuan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'hari_id' => 'required',
            'jam_id' => 'required',
            'dosen_id' => 'required',
        ]);

        $ketentuan = KetentuanDosen::find($id);
        $ketentuan->update($request->all());

        return response()->json([
            'title' => 'Updated!',
            'message' => 'Berhasil diubah'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ketentuan = KetentuanDosen::find($id);
        $ketentuan->delete();

        return response()->json([
            'title' => 'Deleted!',
            'message' => 'Berhasil dihapus'
        ], 201);
    }
}
