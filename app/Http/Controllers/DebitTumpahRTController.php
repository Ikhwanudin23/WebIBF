<?php

namespace App\Http\Controllers;

use App\DebitTumpahRT;
use App\Response;
use Illuminate\Http\Request;
use App\Notifikasi;

class DebitTumpahRTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $debitt = DebitTumpahRT::create([
            'ketinggian' => $request->ketinggian,
            'status' => $request->status,
        ]);

        return response()->json([
            'message' => 'berhasil',
            'status' => 1,
            'data' => $debitt
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DebitTumpahRT  $debitTumpahRT
     * @return \Illuminate\Http\Response
     */
    public function show(DebitTumpahRT $debitTumpahRT)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DebitTumpahRT  $debitTumpahRT
     * @return \Illuminate\Http\Response
     */
    public function edit(DebitTumpahRT $debitTumpahRT)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DebitTumpahRT  $debitTumpahRT
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DebitTumpahRT $debitTumpahRT, $id)
    {
        $debitt = DebitTumpahRT::find($id);

        $debitt->update([
            'ketinggian'     => $request->ketinggian,
            'status'   => $request->status,
        ]);

        $notifikasi = new Notifikasi;
        $data = (object) ['debit' => $debitt->ketinggian, 'status' => $debitt->status];
        $notifikasi->sendNotify($data);

        return response()->json([
            'message' => 'Debit Updated',
            'debitt'  => $debitt,
            'status' => '1'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DebitTumpahRT  $debitTumpahRT
     * @return \Illuminate\Http\Response
     */
    public function destroy(DebitTumpahRT $debitTumpahRT)
    {
        //
    }
}
