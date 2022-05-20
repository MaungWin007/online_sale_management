<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\size;
use Illuminate\Support\Str;

class sizecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $size=size::all();
        return view('size.index',compact("size"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('size.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $size=new size();
        $size->sizename=$request->sizename;
        $size->description=$request->description;
        $size->uuid=Str::uuid()->toString();
        $size->status='Active';
        $size->save();
        return redirect('/sizeprocess');
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
        $size=size::find($id);
        return view('size.index',compact('size'));
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
        $size=size::find($id);
        $size->sizename=$request->sizename;
        $size->description=$request->description;
        $size->save();
        return redirect('/sizeprocess');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $size=size::find($id);
        $size->status="InActive";
        $size->save();
        return redirect('/sizeprocess');
    }
}
