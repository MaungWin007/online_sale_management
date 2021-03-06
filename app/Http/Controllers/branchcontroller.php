<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\branch;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class branchcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branch=branch::all();
        return view('branch.index',compact('branch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("branch.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $branch=new branch();
        $branch->name=$request->name;
        $branch->address=$request->address;
        $branch->contact=$request->contact;
        $branch->email=$request->email;
        $branch->storemap=$request->storemap;
        $branch->uuid=Str::uuid()->toString();
        $branch->image=$request->image;
        $branch->save();

        $request->session()->flash('message','Successfully Save!');
        return redirect('/branchprocess');

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
        $branch=branch::find($id);
        return view('branch.create',compact('branch'));
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
        $branch=branch::find($id);
        $branch->name=$request->name;
        $branch->address=$request->address;
        $branch->contact=$request->contact;
        $branch->email=$request->email;
        $branch->storemap=$request->storemap;
        $branch->image=$request->image;
        $branch->save();

        return redirect('/branchprocess');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $branch=branch::find($id);
        $branch->delete();
        
        return redirect('/branchprocess');
    }
    // search processing to branch table
    public function searchprocess(Request $request)
    {
        $branch=array();

        if($request->t1!="")
        {
            $branch=branch::where('name','LIKE','%'.$request->t1.'%')->get();
        }
        // $branchlist->withPath($branchlist->path()."?t1=".$request->t1);
        return view("branch.index",compact("branch"));
    }
}
