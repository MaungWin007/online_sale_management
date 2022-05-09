<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\city;

class citycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city=city::all();
        return view('city.index',compact('city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("city.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $city=new city();
        $city->name=$request->name;
        $city->description=$request->description;
        $city->save();

        return redirect('/cityprocess');
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
        $city=city::find($id);
        return view('city.create',compact('city'));
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
        $city=city::find($id);
        $city->name=$request->name;
        $city->description=$request->description;
        $city->save();

        return redirect('/cityprocess');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city=city::find($id);
        $city->delete();
        return redirect('/cityprocess');
    }
    public function searchprocess(Request $request)
    {
        $city=array();
        if($request->t1!="")
        {
            $city=city::where('name','LIKE','%'.$request->t1.'%')->get();
        }
        return view('city.index',compact("city"));
    }
}
