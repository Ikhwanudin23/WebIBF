<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SungaiRT;
use App\Notifikasi;


class SungaiRTController extends Controller
{
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

    public function update(Request $request, SungaiRT $sungaiRT,$id)
    {
        $sungai = SungaiRT::find($id);


        $sungai->update([
            'ketinggian'     => $request->ketinggian,
            'status'   => $request->status,
        ]);

        $notifikasi = new Notifikasi;
        $data = (object) ['sungai' => $sungai->ketinggian, 'status' => $sungai->status];
        $notifikasi->sendNotify($data);
//
        return response()->json([
            'message' => 'Sungai Updated',
            'status' => true,
            'data'  => $sungai
        ], 201);

    }
}
