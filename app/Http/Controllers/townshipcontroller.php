<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\township;
use App\Models\city;
use Illuminate\Support\Facades\DB;

class townshipcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $township=township::all();
        $township=DB::table('townships')
        ->join('cities','cities.id','=','townships.city_id')
        ->select('townships.*','cities.name')
        ->where('townships.status','=','Active')
        ->get();
        return view('township.index',compact("township"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city=city::where('status','=','Active')
        ->get();
        return view('township.create',compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $township=new township();
        $township->name=$request->name;
        $township->description=$request->description;
        $township->city_id=$request->city_id;
        $township->save();

        return redirect('/townshipprocess');

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
        $township=township::find($id);
        $city=city::where('status','=','Active')->get();
        return view('township.create',compact('township','city'));
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
        $township=township::find($id);
        $township->name=$request->name;
        $township->description=$request->description;
        $township->city_id=$request->city_id;
        $township->save();

        return redirect('/townshipprocess');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $township=township::find($id);
        $township->delete();
        
        return redirect('/townshipprocess');
    }
    public function searchprocess(Request $request)
    {
        $township=array();

        if($request->t1!="")
        {
            $township=township::where('name','LIKE','%'.$request->t1.'%')->get();
        }
        // $branchlist->withPath($branchlist->path()."?t1=".$request->t1);
        return view("township.index",compact("township"));
    }
}
