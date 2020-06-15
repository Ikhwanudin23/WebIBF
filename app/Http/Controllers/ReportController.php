<?php

namespace App\Http\Controllers;

use App\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        $report = Report::select('created_at', DB::raw('AVG(sungai) as sungai'),
            DB::raw('AVG(debittumpah) as debittumpah'))->groupBy('created_at')->get();
//        $report = DB::table('reports as r')
//            ->select(array(DB::Raw('AVG(r.debittumpah) as debittumpah'), DB::Raw('AVG(r.sungai) as sungai') ,DB::Raw('DATE(r.created_at) created_at')))
//            ->groupBy('created_at')
//            ->get();
        //$created_at = Carbon::parse()->format('d-M-Y');

//
//        $report = Report::select('created_at', DB::raw('AVG(sungai) as sungai'),
//        DB::raw('AVG(debittumpah) as debittumpah'))->groupBy(DB::raw('DATE(created_at)'));




//        $orderbydate = DB::table('sales_flat_orders as w')
//            ->select(array(DB::Raw('sum(w.total_item_count) as Day_count'),DB::Raw('DATE(w.created_at) day')))
//            ->groupBy('day')
//            ->orderBy('w.created_at')
//            ->get();


        $bulan = 1;
        return view('pages.datareport', compact('report', 'bulan'));
    }

//Post::all()->groupBy(function($date) {
//    return \Carbon\Carbon::parse($date->created_at)->format('d-M-y');
//});

    public function sungai()
    {
        $sungai = Report::select('created_at', 'sungai')->get();
        return view('pages.ketinggiansungai', compact('sungai'));
    }

    public function debittumpah()
    {
        $debittumpah = Report::select('created_at', 'debittumpah')->get();
        return view('pages.ketinggiandebittumpah', compact('debittumpah'));
    }


    public function search(Request $request)
    {
        //$report = Report::select('created_at',DB::raw('AVG(sungai) as sungai'),DB::raw('AVG(debittumpah) as debittumpah'))->groupBy('created_at')->get();
        $report = Report::select('created_at', DB::raw('AVG(sungai) as sungai'), DB::raw('AVG(debittumpah) as debittumpah'))
            ->groupBy('created_at')->whereMonth('created_at', $request->bulan)->get();

        $bulan = $request->bulan;
        $t = Carbon::now()->month($bulan)->endOfMonth()->format('d');
        $tanggal = (int)$t;

        $reports = [];
        foreach ($report as $item) {
            $date = date_format($item->created_at, "d");
            $reports["$date"] = [
                'created_at' => $item->created_at,
                'sungai' => $item->sungai,
                'debit_tumpah' => $item->debittumpah
            ];
        }
        return view('pages.datareportsearch', compact('reports', 'bulan', 'tanggal'));
    }



    public function monthnow()
    {
        $report = Report::whereMonth('created_at', Carbon::now()->format('m'))->get();
        return response()->json([
            'message' => 'berhasil',
            'status' => 1,
            'data' => $report
        ]);
    }

    public function daynow(){
        $report = Report::whereDay('created_at', Carbon::now()->format('d'))->get();
        return response()->json([
            'message' => 'berhasil',
            'status' => 1,
            'data' => $report
        ]);
    }

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Report $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Report $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
