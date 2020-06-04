<?php

namespace App\Http\Controllers;

use App\SungaiRT;
use App\Response;
use Illuminate\Http\Request;
use App\Notifikasi;

class SungaiRTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sungai = SungaiRT::all();
//        return view('pages.ketinggiansungai', compact('sungai'));
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

        return [
            'message' => 'success',
            'data' => $sungaiRT
        ];

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


        $sungai->update([
            'ketinggian'     => $request->ketinggian,
            'status'   => $request->status,
        ]);

        $notifikasi = new Notifikasi;
        $data = (object) ['ketinggian' => $sungai->ketinggian, 'status' => $sungai->status];
        $notifikasi->sendNotify($data);
//
        return response()->json([
            'message' => 'Sungai Updated',
            'status' => true,
            'data'  => $sungai
        ], 201);

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
