<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\role;

class rolecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role=role::all();
        return view('role.index',compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("role.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role=new role();
        $role->name=$request->name;
        $role->description=$request->description;
        $role->save();

        $request->session()->flash('message','Successfully Save!');
        return redirect('/roleprocess');
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
        $role=role::find($id);
        return view('role.create',compact('role'));
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
        $role=role::find($id);
        $role->name=$request->name;
        $role->description=$request->description;
        $role->save();

        return redirect('/roleprocess');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role=role::find($id);
        $role->delete();
        
        return redirect('/roleprocess');
    }
    public function searchprocess(Request $request)
    {
        $role=array();

        if($request->t1!="")
        {
            $role=role::where('name','LIKE','%'.$request->t1.'%')->get();
        }
        // $branchlist->withPath($branchlist->path()."?t1=".$request->t1);
        return view("role.index",compact("role"));
    }
}
