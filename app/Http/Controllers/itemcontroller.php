<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\item;
use App\Models\category;
use App\Models\color;
use App\Models\size;
use App\Models\itemdetail;
use App\Models\itemphoto;

class itemcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $item=item::all();
        $item=DB::table('items')
        ->join('categories','categories.id','=','items.category_id')
        ->select('items.*','categories.categoryname')
        ->where('items.status','=','Active')
        ->get();
        return view('item.index',compact("item"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=category::where('status','=','Active')
        ->get();
        $color=color::where('status','=','Active')
        ->get();
        $size=size::where('status','=','Active')
        ->get();
        return view('item.itemregistration',compact('category','color','size'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item=new item();
        $item->model=$request->model;
        $item->saleprice=$request->saleprice;
        $item->purchaseprice=$request->purchaseprice;
        $item->description=$request->description;
        $item->category_id=$request->category_id;
        $item->uuid=Str::uuid()->toString();
        $item->save();

     
        $uuid=Str::uuid()->toString();
        $image=$uuid.'.'.$request->itemimage->extension();
        $request->itemimage->move(public_path('item_upload'),$image);
        
        $itemphoto=new itemphoto();
        $itemphoto->item_id=$item->id;
        $itemphoto->photo=$image;
        $itemphoto->uuid=Str::uuid()->toString();
        $itemphoto->save();
        
        if($request->session()->has('data'))
        {
            $tmp=session()->get('data');
             // count array room from data if array has
            // $tmp[$count]=[
            //     "colorid"=>$request->colorid,
            //     "colorname"=>$request->colorname,
            //     "sizeid"=>$request->sizeid,
            //     "sizename"=>$request->sizename
            // ];
            // session()->put('data',$tmp);
            
            foreach($tmp as $loop)
            {
                $itemdetail= new itemdetail();
                $itemdetail->item_id=$item->id;
                $itemdetail->color_id=$loop["colorid"];
                $itemdetail->size_id=$loop["sizeid"];
                $itemdetail->uuid=Str::uuid()->toString();
                $itemdetail->save();
            }
            $request->session()->forget('data');
            
        }
        return redirect('itemprocess');


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
    public function edit(Request $request,$id)
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

    public function buttonreq(Request $request)
    {
        // return $request->colorid;
        // // $count=0;
        if(session()->has('data'))
        {
            $tmp=session()->get('data');
            $count=count($tmp); // count array room from data if array has 
            $tmp[$count]=[
                "colorid"=>$request->colorid,
                "colorname"=>$request->colorname,
                "sizeid"=>$request->sizeid,
                "sizename"=>$request->sizename
            ];
            session()->put('data',$tmp);

            // dd("exit");
        }
        else
        {
            $tmp[0]=[
            "colorid"=>$request->colorid,
            "colorname"=>$request->colorname,
            "sizeid"=>$request->sizeid,
            "sizename"=>$request->sizename];
            session()->put('data',$tmp);

            // dd($tmp);
        }
        
         $get=session()->get('data');
            // $count=count($get);
        
        return $get;
       

        

        
    }
    public function ajaxdelete(Request $request)
    {
        $key=$request->id;
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
