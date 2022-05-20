<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\color;
use Illuminate\Support\Str;

class colorcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $color=color::all();
        return view('color.index',compact('color'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $imagename="";
        // image store code
        if(isset($request->colorimage))
        {
          
                $uuid=Str::uuid()->toString();
                $imagename=$uuid.'.'.$request->colorimage->extension();
                $request->colorimage->move(public_path('upload'),$imagename);
          
           
        }
 
        // dd($imagename);
        $color=new color();
        $color->colorname=$request->colorname;
        $color->colorcode=$request->colorcode;
        $color->colorimage=$imagename;
        $color->uuid=Str::uuid()->toString();
        $color->status='Active';
        $color->save();
        return redirect('/colorprocess');
        
       
        
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
        $color=color::find($id);
        return view('color.create',compact("color"));
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
        $uuid=Str::uuid()->toString();
        $imagename=$uuid.'.'.$request->colorimage->extension();
        $request->colorimage->move(public_path('upload'),$imagename);
     

        $color=color::find($id);
        $color->colorname=$request->colorname;
        $color->colorcode=$request->colorcode;
        $color->colorimage=$imagename;
        $color->save();
        return redirect('/colorprocess');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color=color::find($id);
        $color->status="InActive";
        $color->save();
        return redirect('/colorprocess');
    }
}
