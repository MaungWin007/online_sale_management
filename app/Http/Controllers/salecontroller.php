<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\item;
use App\Models\branch;
use App\Models\branchitem;
use App\Models\category;
use App\Models\sale;
use App\Models\saleitem;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\CarExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SaleExport;


class salecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sale=sale::all();

        
        return view('sale.index',compact('sale'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $item=item::where('status','=','Active')->get();
        $category=category::where('status','=','Active')->get();
        $user=Auth::user();
        $id=$user->branch_id;
        $branch=branch::find($id);
        $branchitem=branchitem::find($id);

        $searchdata=DB::table("branchitems")
        ->join("users","users.branch_id","=","branchitems.branch_id")
        ->join("items","items.id","=","branchitems.item_id")
        ->join("itemphotos","itemphotos.item_id","=","branchitems.item_id")
        ->where('model',"LIKE","%".$request->itemname."%")
        ->select("branchitems.*","items.model as model","items.saleprice as sale","itemphotos.photo as photo")->orderBy('branchitems.id', 'DESC')
        ->distinct()
        ->get();


        // dd($searchdata);
        return view('sale.create',compact('category','searchdata','branch'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sale=new sale();
        $sale->salecode=$request->salecode;
        $sale->customer_id=$request->customer_id;
        $sale->branch_id=1;
        $sale->paymenttype=$request->payment;
        $sale->totalamount=$request->totalamount;
        $sale->Totalqty=$request->totalqty;
        $sale->deliveryaddress=$request->deliveryaddress;
        $sale->township_id=1;
        $sale->bankimage="null";
        $sale->bank_id=1;
        $sale->paidamount=$request->paidamount;
        $sale->uuid = Str::uuid()->toString();

        // dd($request);
         $sale->save();

        if($request->session()->has('sale_data'))
        {
            $get=session()->get('sale_data');
            // dd($get);
            
            foreach ($get as $insert)
            {
                $saleitem=new saleitem();
                $saleitem->sale_id=$sale->id;
                $saleitem->itemdetails_id=$insert["id"];
                $saleitem->qty=$insert["qty"];
                $saleitem->unitprice=$insert["sale"];
                $saleitem->discount=0;
                $saleitem->uuid= Str::uuid()->toString();

                
                $saleitem->save();
                
            }
            $request->session()->forget('sale_data');
        }
        return redirect('saleprocess/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        

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
    public function detail(Request $request)
    {
        // return $request->itemid;

        $itemdetail=DB::table("itemdetails")
        ->join("branchitems","branchitems.item_id","=","itemdetails.item_id")
        ->join("colors","colors.id","=","itemdetails.color_id")
        ->join("sizes","sizes.id","=","itemdetails.size_id")
        ->where("branchitems.item_id",$request->itemid)
        ->select("colors.colorname","sizes.sizename","branchitems.item_id")
        ->get();
      return $itemdetail;
    }
    public function add_data(Request $request)
    {
        //  return $request->color;
        if(session()->has('sale_data'))
        {
            $tmp=session()->get('sale_data');
            $count=count($tmp); // count array room from data if array has 
            $tmp[$count]=[
                "id"=>$request->itemid,
                "color"=>$request->color,
                "size"=>$request->size,
                "qty"=>$request->qty,
                "sale"=>$request->sale
            ];
            session()->put('sale_data',$tmp);

            // dd("exit");
        }
        else
        {
            $tmp[0]=[
            "id"=>$request->itemid,
            "color"=>$request->color,
            "size"=>$request->size,
            "qty"=>$request->qty,
            "sale"=>$request->sale];
            session()->put('sale_data',$tmp);

            // dd($tmp);
        }
        
         $get=session()->get('sale_data');
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
    public function customersearch(Request $request)
    {
        $get=$request->type;

        // return $get;
        

        $getdata=user::where('type','=','customer')
                ->where('status','=','Active')
                ->select('id','name','phoneno','email')
                 ->get();
        // $data=User::where('type','=','customer')->get();

        // dd($getdata);
        return $getdata;
    }

    public function detail_data(Request $request)
    {
         $sale_record=DB::table('sales')
         ->join('users','users.id','=','sales.customer_id')
         ->join('branches','branches.id','=','sales.branch_id')
         ->join('townships','townships.id','=','sales.township_id')
         ->select('sales.*','users.name as uname','users.email as uemail','branches.name as bname','townships.name as tname')
         ->get();

         $sale_detail=DB::table('saleitems')
         ->join('itemdetails','itemdetails.id','=','saleitems.itemdetails_id')
         ->join('items','items.id','=','itemdetails.item_id')
         ->join('colors','colors.id','=','itemdetails.color_id')
         ->join('sizes','sizes.id','=','itemdetails.size_id')
         ->join('itemphotos','itemphotos.item_id','=','items.id')
         ->select('saleitems.*','itemdetails.*','items.model as mod','colors.colorname as cname','sizes.sizename as sname','itemphotos.photo as img')
         ->get();
        // $sale
        // dd($sale_detail);
        return view('sale.detail',compact('sale_record','sale_detail'));
        // return view('sale.index',compact('sale_detail'));

    }
    public function generatepdf()
    {
        $sale_record=DB::table('sales')
         ->join('users','users.id','=','sales.customer_id')
         ->join('branches','branches.id','=','sales.branch_id')
         ->join('townships','townships.id','=','sales.township_id')
         ->select('sales.*','users.name as uname','users.email as uemail','branches.name as bname','townships.name as tname')
         ->get();

         $sale_detail=DB::table('saleitems')
         ->join('itemdetails','itemdetails.id','=','saleitems.itemdetails_id')
         ->join('items','items.id','=','itemdetails.item_id')
         ->join('colors','colors.id','=','itemdetails.color_id')
         ->join('sizes','sizes.id','=','itemdetails.size_id')
         ->join('itemphotos','itemphotos.item_id','=','items.id')
         ->select('saleitems.*','itemdetails.*','items.model as mod','colors.colorname as cname','sizes.sizename as sname','itemphotos.photo as img')
         ->get();
         $data=[
            "sale_record"=>$sale_record,
            "sale_detail"=>$sale_detail
         ];

         $pdf=Pdf::loadView("generatedpdf",$data);
         dd($pdf);
         return $pdf->download('generatesalepdf.pdf');
    }
    public function export()
    {
        return Excel::download(new SaleExport,'salereport.xlsx');
    }
}
