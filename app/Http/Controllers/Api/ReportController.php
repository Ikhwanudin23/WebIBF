<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Report;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class ReportController extends Controller
{
    public function store(Request $request)
    {
        $report = Report::create([
            'sungai' => $request->sungai,
            'debittumpah' => $request->debittumpah,
        ]);

        return response()->json([
            'message' => 'berhasil',
            'status' => 1,
            'data' => $report
        ], 201);

    }
    public function monthnow(){
        $report = Report::select
        ('avg(debittumpah) as debittumpah', 'avg(sungai) as sungai', 'DATE(created_at) day')
            ->groupBy('day')->whereMonth('created_at','=', date('m'))->get();


//        $report = Report::select
//        (DB::raw('avg(debittumpah) as debittumpah, avg(sungai) as sungai, DATE(created_at) day'))
//            ->groupBy('day')->whereMonth('created_at','=', date('m'))->get();


        return response()->json([
            'message' => 'berhasil',
            'status' => 1,
            'data' => $report
        ]);
    }

    public function daynow(){
        $report = Report::select('sungai','debittumpah','created_at')->whereDay('created_at', '=', date('d'))->get();

        return response()->json([
            'message' => 'berhasil',
            'status' => 1,
            'data' => $report
        ]);
    }
}
