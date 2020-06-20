<?php

namespace App\Http\Controllers;

use App\Report;
use Barryvdh\DomPDF\Facade as PDF;
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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
//        $data = DB::table('reports')
//            ->select(DB::raw('avg(debittumpah) as debittumpah, avg(sungai) as sungai, DATE(created_at) day'))
//            ->groupBy('day')->whereMonth('created_at','=', date('m'))
//            ->get();
        //$report = Report::whereDay('created_at', Carbon::now()->format('d'))->get();

        //$report = Report::select(DB::raw('AVG(sungai) as sungai, AVG(debittumpah) as debittumpah, DATE(created_at)created_at'))
            //->groupBy('created_at');

        $bulan = Carbon::now()->month;
        $report = Report::select('created_at', DB::raw('AVG(sungai) as sungai'), DB::raw('AVG(debittumpah) as debittumpah'))
            ->groupBy('created_at')->whereMonth('created_at', $bulan)->get();

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


        return view('pages.datareport', compact('reports', 'bulan', 'tanggal'));
        //return view('pages.datareport', compact('report', 'bulan'));
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

    public function printreport($bulan){
        $report = Report::select('created_at', DB::raw('AVG(sungai) as sungai'), DB::raw('AVG(debittumpah) as debittumpah'))
            ->groupBy('created_at')->whereMonth('created_at', $bulan)->get();


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

        $arr_bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
            'September', 'Oktober', 'November', 'Desember'];

        $nama_bulan = $arr_bulan[$bulan-1];

        $pdf =PDF::loadview('pages.printreport', compact(['reports','bulan','tanggal', 'nama_bulan']));
        return $pdf->stream();

    }
}
