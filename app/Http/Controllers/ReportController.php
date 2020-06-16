<?php

namespace App\Http\Controllers;

use App\Report;
use Barryvdh\DomPDF\PDF;
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
        //$report = Report::whereDay('created_at', Carbon::now()->format('d'))->get();

        $report = Report::select('created_at', DB::raw('AVG(sungai) as sungai'),
            DB::raw('AVG(debittumpah) as debittumpah'))
            ->groupBy('created_at');



//         $report = Report::select('created_at', DB::raw('AVG(sungai) as sungai'),
//             DB::raw('AVG(debittumpah) as debittumpah'))
//             ->groupBy(function($d) {
//                 return Carbon::parse($d->created_at)->format('d-m-y');
//             })->get();


        $bulan = 1;
        return view('pages.datareport', compact('report', 'bulan'));
    }

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

    public function printreport(){
        $report = Report::all();

        $pdf = PDF::loadview('../pages/printreport',['report'=>$report]);
        return $pdf->download('report-pdf');

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


    public function show(Report $report)
    {
        //
    }

    public function edit(Report $report)
    {
        //
    }


    public function update(Request $request, Report $report)
    {
        //
    }


    public function destroy(Report $report)
    {
        //
    }
}
