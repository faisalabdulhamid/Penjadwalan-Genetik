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
        return view('jam.index', compact('jam'));
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

        $jam = new Jam();
        $jam->range_jam = $request->range_jam;
        $jam->save();
        return redirect()->route('jam.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jam  $jam
     * @return \Illuminate\Http\Response
     */
    public function show(Jam $jam)
    {
        //
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

        $jam->range_jam = $request->range_jam;
        $jam->save();
        return redirect()->route('jam.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jam  $jam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jam $jam)
    {
        //
    }
}
