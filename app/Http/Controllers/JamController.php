<?php

namespace App\Http\Controllers;

use App\Jam;
use Illuminate\Http\Request;

class JamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Jam $jam)
    {
        if (request()->params) {
            return response()->json($jam->all());
        }
        return response()->json($jam->paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jam.create');
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
            'range_jam' => 'required|unique:jam'
        ]);

        Jam::create($request->all());

        return response()->json([
            'title' => 'Saved!',
            'message' => 'Berhasil disimpan',
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jam  $jam
     * @return \Illuminate\Http\Response
     */
    public function show(Jam $jam)
    {
        return response()->json($jam);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jam  $jam
     * @return \Illuminate\Http\Response
     */
    public function edit(Jam $jam)
    {
        return view('jam.edit', compact('jam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jam  $jam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jam $jam)
    {
        $this->validate($request, [
            'range_jam' => 'required'
        ]);

        $jam->update($request->all());

        return response()->json([
            'title' => 'Updated!',
            'message' => 'Berhasil ubah',
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jam  $jam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jam $jam)
    {
        $jam->delete();
        
        return response()->json([
            'title' => 'Deleted!',
            'message' => 'Berhasil dihapus',
        ], 201);
    }
}
