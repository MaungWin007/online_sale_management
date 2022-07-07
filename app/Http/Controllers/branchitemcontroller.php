<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\category;
use App\Models\item;
use App\Models\itemdetail;
use App\Models\color;
use App\Models\size;
use App\Models\branch;
use App\Models\branchitem;
use App\Models\branchitemdetail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class branchitemcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branchitem=DB::table('branchitems')
        ->join('items','items.id','=','branchitems.item_id')
        ->join('branches','branches.id','=','branchitems.branch_id')
        ->where('branchitems.status','=','Active')
        ->select('branchitems.*','items.model as itemname','branches.name as branchname')
        ->get();
        return view('branchitem.index',compact('branchitem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $category=category::where('status','=','Active')->get();
        $item=item::where('status','=','Active')->get();

        // $categorylist=["categoryname","LIKE","%".$request->categoryid."%"];
        $searchdata=DB::table("items")
        ->join("categories","categories.id","=","items.category_id")
        ->where('model',"LIKE","%".$request->list."%")
        ->where('categoryname',"LIKE","%".$request->cid."%")
        ->select("items.*","categories.categoryname as ctgname")
        ->get();
        $user=Auth::user();//Get login user
        $id=$user->branch_id;
        $branch=branch::find($id);

        return view('branchitem.create',compact('category','item','searchdata','branch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $branchitem=new branchitem();
        $branchitem->item_id=$request->itemid;
        $branchitem->totalqty=$request->totalqty;
        $branchitem->uuid=Str::uuid()->toString();
        $branchitem->branch_id=$request->branchid;

        // dd($request);
        $branchitem->save();

        if($request->session()->has('data'))
        {
            $reget=session()->get('data');

            foreach($reget as $loop)
            {
                $branchitemdetail=new branchitemdetail();
                $branchitemdetail->itemdetail_id=$loop["id"];
                $branchitemdetail->branchitem_id= $branchitem->id;
                $branchitemdetail->qty=$loop["qty"];
                $branchitemdetail->uuid=Str::uuid()->toString();
                $branchitemdetail->save();
            }
            $request->session()->forget('data');
        }
        return redirect('/branchitemprocess');
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
        $branchitem=branchitem::find($id);
        return view('branchitem.index',compact('branchitem'));
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
    public function searchbutton(Request $request)
    {
        
        // $record=array();
        $categorylist=["categoryname","LIKE","%".$request->categoryid."%"];
        $searchdata=DB::table("items")
        ->join("categories","categories.id","=","items.category_id")
        ->Orwhere($categorylist)
        ->select("items.*","categories.categoryname as ctgname")
        ->get();

        return $searchdata;
    }
    public function btnselected(Request $request)
    {
      //  return "testid".$request->itemid;
      $itemid=$request->itemid;
    //   return $itemid;
      $itemdetail=DB::table("itemdetails")
      ->join("colors","colors.id","=","itemdetails.color_id")
      ->join("sizes","sizes.id","=","itemdetails.size_id")
      ->where("item_id",$itemid)
      ->select("itemdetails.id","colors.colorname","sizes.sizename")
      ->get();
      return $itemdetail;


        // $itemdetail=DB::table("items")
        // ->join("itemdetails","itemdetails.item_id","=","items.id")
        // ->
        // ->select("items.*","itemdetails.item_id as detailid")
        // ->get();

        // return $itemdetail;
        // dd("itemdetail");


    }
    public function add_data(Request $request)
    {
        // dd($request);
        //  return $request->color;
        if(session()->has('data'))
        {
            $tmp=session()->get('data');
            $count=count($tmp); // count array room from data if array has 
            $tmp[$count]=[
                "id"=>$request->id,
                "color"=>$request->color,
                "size"=>$request->size,
                "qty"=>$request->qty
            ];
            session()->put('data',$tmp);

            // dd("exit");
        }
        else
        {
            $tmp[0]=[
            "id"=>$request->id,
            "color"=>$request->color,
            "size"=>$request->size,
            "qty"=>$request->qty];
            session()->put('data',$tmp);

            // dd($tmp);
        }
        
         $get=session()->get('data');
            // $count=count($get);
        
        return $get;
        
            

    }
    public function branchitemdelete(Request $request)
    {
        $key=$request->deleteid;
        // return $key;
        $deletedata=session()->get('data');
     
        //  return $deletedata;
        unset($deletedata[$key]);
        $deletedata=array_values($deletedata);
        session()->put('data',$deletedata);
        $insert=session()->get('data');
        return $insert;
    }
}
