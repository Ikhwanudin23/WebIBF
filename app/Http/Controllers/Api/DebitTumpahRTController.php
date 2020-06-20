<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DebitTumpahRT;
use App\Notifikasi;


class DebitTumpahRTController extends Controller
{
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
}
