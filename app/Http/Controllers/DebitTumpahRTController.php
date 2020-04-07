<?php

namespace App\Http\Controllers;

use App\DebitTumpahRT;
use Illuminate\Http\Request;

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
        //
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

        $debitt->ketinggian = $request->input('ketinggian');
        $debitt->status = $request->input('status');

        $debitt->save();

        return response()->json([
            'error' => false,
            'debitt'  => $debitt,
        ], 200);
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
