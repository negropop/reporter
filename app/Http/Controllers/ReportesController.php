<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use \App\Models\Reportes;
use \App\Http\Requests\ReportRequest;
use \App\Models\User;

use Illuminate\Http\Request;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $rep = Reportes::all();
        return view('-+_/reportes/index')->with('rep' , $rep );
    } 
       public function index2(){


    $users = DB::table('users')->count();
    $docs = DB::table('reportes')->count();


    return view('-+_/dashboard', ['users' => $users])->with('docs' , $docs);
} 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {       $id = Reportes::find($id);

        $id->status = 1;
        $id->save();
        return redirect()->back();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send(ReportRequest $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|max:255',
        //     'sface' => 'title:name|required',
        // ]);

            $send = new Reportes;
        $send->userid = $request->userid;
        $send->name = $request->name;
        $send->sender_phone= $request->sphone;
        $send->sender_facebook= $request->sface;
        $send->thief = $request->thief;
        $send->facebook = $request->tface;
        // $send->thief_email = $request->temail;
        $send->number = $request->tmobile;
        $send->screen = $request->screen->store('reportes' , 'public');
        $send->save();
        $request->session()->flash('success', 'Report Sent successfuly!');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Reportes::find($id);
        $user = User::find($id);

//         $report = DB::table('reportes')
//         ->join('users', 'reportes.userid', 'users.id')
//         ->get();
// print_r( $report);


    return view('-+_/reportes/show')->with('rep' , $id )->with('user' ,  $user);


    }


    public function show2($id)
    {
        $id = Reportes::find($id);
        $user = User::find($id);

//         $report = DB::table('reportes')
//         ->join('users', 'reportes.userid', 'users.id')
//         ->get();
// print_r( $report);


    return view('/show')->with('rep' , $id )->with('user' ,  $user);


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
