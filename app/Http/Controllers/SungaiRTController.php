<?php

namespace App\Http\Controllers;

use App\SungaiRT;
use App\Response;
use Illuminate\Http\Request;

class SungaiRTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sungai = SungaiRT::all()->get();
        return view('pages.ketinggiansungai', compact('sungai'));
        return response() -> json(Response::transform(SungaiRT::get(), "ok" , 1), 200);
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
        $sungai = SungaiRT::create([
            'ketinggian' => $request->ketinggian,
            'status' => $request->status,
        ]);

        return response()->json([
            'message' => 'berhasil',
            'status' => 1,
            'data' => $sungai
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SungaiRT  $sungaiRT
     * @return \Illuminate\Http\Response
     */
    public function show(SungaiRT $sungaiRT, $id)
    {
        $sungaiRT = SungaiRT::find($id);
        if (is_null($sungaiRT)) {
            return response()->json(array('message'=>'
                record not found', 'status'=>0),201);
        }
        return response() -> json(Response::transform($sungaiRT,"found", 1), 200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SungaiRT  $sungaiRT
     * @return \Illuminate\Http\Response
     */
    public function edit(SungaiRT $sungaiRT)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SungaiRT  $sungaiRT
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SungaiRT $sungaiRT,$id)
    {
        $sungai = SungaiRT::find($id);

        $sungai->ketinggian = $request->input('ketinggian');
        $sungai->status = $request->input('status');

        $sungai->save();

        return response()->json([
            'error' => false,
            'sungai'  => $sungai,
        ], 200);
//        $sungaiRT = SungaiRT::find($id);
//        if(is_null($sungaiRT)){
//            return response() -> json(array('message'=>'cannot delete because record not found', 'status'=>0),200);
//        }
//        Bola::update($id);
//        return response() -> json(array('message'=>'succesfully deleted', 'status' => 1), 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SungaiRT  $sungaiRT
     * @return \Illuminate\Http\Response
     */
    public function destroy(SungaiRT $sungaiRT)
    {
        //
    }
}
