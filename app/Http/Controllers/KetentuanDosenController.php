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
        $dosen = Dosen::first();
        return view('ketentuan-dosen.index', compact('dosen'));
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
        $dosen_id = $request->dosen;;

//        $dest = Dosen::find($dosen_id);
        KetentuanDosen::where('dosen_id', $dosen_id)->delete();

        $data = [];
        foreach($request->ketentuan as $hari_id => $value)
        {

            $row = [];
//            $row['value'] = $value;//hari
            foreach($value as $jam_id => $bobot)
            {

                if(intval($bobot) <> 1)
                {
//                    $row[$hari_id][$jam_id]['hari_id'] = $hari_id;//hari
//                    $row[$hari_id][$jam_id]['jam_id'] = $jam_id;//jam
//                    $row[$hari_id][$jam_id]['bobot'] = $bobot;//jam
                    $ketentuan = new KetentuanDosen();
                    $ketentuan->dosen_id = $dosen_id;
                    $ketentuan->hari_id = $hari_id;
                    $ketentuan->jam_id = $jam_id;
                    $ketentuan->bobot_fitness = $bobot;
                    $ketentuan->save();
                }
//                $row['hari'][$key2] = $key;
//                $row['jam'][$key2] = $value2;
            }
            $data[] = $row;
        }
//        return $data;

        return redirect()->back();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
