<?php

namespace App\Http\Controllers;
//require __DIR__.'/vendor/autoload.php';


use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Laravel\Firebase;
//use Kreait\Firebase\ServiceAccount;


use App\DebitTumpahRT;
use App\SungaiRT;

class DashboardController extends Controller
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
        $debittumpah = DebitTumpahRT::where('id','1')->get();
        $sungai = SungaiRT::where('id','1')->get();
        return view('pages.dashboard',compact('debittumpah', 'sungai'));
    }

    public function firebase(){

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebase.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $database = $firebase->getDatabase();
        $ref = $database->getReference('Raspi3/Debit')->gevalue();
        dd($ref);


        return response()->json($ref);

//        $key = $ref->push()->getKey();
//        $ref->getChild($key)->set([
//            'SubjectName' => 'Laravel'
//        ]);
//        return $key;

      //  $database   =   $factory->getDatabase();
//
//        dd($database);
//        $getDebit    =   $database->getReference('Raspi3/Debit')->getvalue();
//        $getSungai    =   $database->getReference('Raspi3/Sungai')->getvalue();
       //  $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebase.json');
//       $firebase = (new Factory)
//            ->withServiceAccount($serviceAccount)
//            ->withDatabaseUri('https://ibrebesf.firebaseio.com/')
//            ->create();
//        $database = $firebase->getDatabase();
//        $GetSungai = $database
//            ->getReference('Raspi3/Sungai')
//            ->push([
//                'title' => 'Post title',
//                'body' => 'This should probably be longer.'
//            ]);
        // $serviceAccount = ServiceAccount::fromValue(__DIR__.'/firebase.json');
        //$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebase.json');

        // $firebase = (new Factory)->withServiceAccount($serviceAccount)->withDatabaseUri('https://ibrebesf.firebaseio.com/')->create();



//        $firebase = (new Factory)
//            ->withServiceAccount($serviceAccount)
//            ->withDatabaseUri('https://ibrebesf.firebaseio.com/')
//            ->create();
//        $factory = (new Factory())
//            ->withDatabaseUri('https://ibrebesf.firebaseio.com/');
//
//        $database   =   $factory->getDatabase();
//
//        dd($database);
//        $getDebit    =   $database->getReference('Raspi3/Debit')->getvalue();
//        $getSungai    =   $database->getReference('Raspi3/Sungai')->getvalue();
//        return response()->json($getDebit);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
