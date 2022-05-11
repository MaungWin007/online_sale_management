<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Auth;
use App\Models\branch;
use App\Models\role;
use App\Models\User;
use App\Models\staff;
use App\Models\customer;

class admincontroller extends Controller
{
    function regform()
    {
        return view('Admin.register');
        
    }
    function admindashboard()
    {
        return view('Admin.dashboard');
    }
    function loginform()
    {
        return view('Admin.login');
    }
    function staffRegister()
    {
        $branch=DB::table('branches')->where('status','=','Active')->get();
        $role=DB::table('roles')->where('status','=','Active')->get();

        return view("Admin.register",compact('branch','role'));

    }
    function loginprocess(Request $request)
    {
        $input=$request->all();
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $login=array(
            'email'=>$input["email"],
            'password'=>$input["password"]
        );
        if(auth()->attempt($login))
        {
            $user=auth()->user();
            return redirect('/Admin/dashboard');
        }
        else{
            return redirect('/Admin/login');
        }

    }
    function Register(Request $request)
    {
        
        if(!isset($request["usertype"]))
        {
            $this->validate($request,[
                'name'=>['required','max:255'],
                'phoneno' => ['required', 'max:255'],
                'email' => ['required', 'email', 'max:255', 'unique:users'],
                'password' => ['required','max:255','confirmed'],
            ]);

            $request["usertype"]="customer";
            $request["branch_id"] = 6; 
        }
        else
        {
            $this->validate($request,[
                'name'=>['required','max:255'],
                'phoneno' => ['required', 'max:255'],
                'email' => ['required', 'email', 'max:255', 'unique:users'],
                'password' => ['required','max:255','confirmed'],
                'branch_id'=>['required'],
                'role_id'=>['required']
            ]);
        }

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phoneno' => $request['phoneno'],
            'password' => Hash::make($request['password']),
            'uuid'=> Str::uuid()->toString(),
            'images'=>$request['images'],
            'type'=>$request['usertype'],
            'branch_id'=>$request['branch_id'],
            'status' => 'Active',
        ]);

        if($user->type=="admin")
        {
            $staff = new staff();

            $staff->user_id = $user->id;
            $staff->role_id = $request["role_id"];
            $staff->uuid = Str::uuid()->toString();
            $staff->save();

            return redirect('/admin');
        }
        else
        {
            $customer = new customer();

            $customer->user_id = $user->id;           
            $customer->uuid = Str::uuid()->toString();
            $customer->save();

            return redirect('/customer/list');
        }

    }

    function stafflist()
    {
        $staff_list = DB::table('users')
                                ->join('staff','staff.user_id','=','users.id')
                                ->join('roles','roles.id','=','staff.role_id')
                                ->join('branches','branches.id','=','users.branch_id')
                                //->where('users.status',1)
                                ->where('users.type',"admin")
                                ->select('users.*','roles.name as rolename','branches.name as branchname')
                                ->get();

        
        //dd($staff_list);

        return view('Admin.index',compact('staff_list'));
    }
    function staffedit($id)
    {
        // dd('edit');
        $user = DB::table('users')
                    ->join('staff','staff.user_id','=','users.id')
                    ->join('roles','roles.id','=','staff.role_id')
                    ->join('branches','branches.id','=','users.branch_id')
                    ->select('users.*','roles.name as rolename','branches.name as branchname')
                    ->where('users.id',$id)
                    ->first();

        return view('Admin.update',compact('user'));


    }
    function staffupdate(Request $request,$id)
    {
        // dd($id);
        $user=user::find($id);
        $user->name=$request->name;
        $user->phoneno=$request->phoneno;
        $user->images=$request->images;
        // $user->status=$request->status;

        $user->save();
        return redirect('/admin');
    }
    function staffdetails($id)
    {
        
    }
    function staffsearch()
    {

    }

    // customer by admin
    function customerreg()
    {
        return view('Customer.register');
    }
    function customerlist()
    {
        
        // $customer_list = DB::table('users')
        //             ->join('customers','customers.user_id','=','users.id')
        //             ->join('branches','branches.id','=','users.branch_id')
        //             ->where('users.type',"customer")
        //             ->select('users.*','branches.name as branchname','customers.totalamount','customers.point')
        //             ->get();
        $customer_list=user::all();
                // dd($customer_list);
        return view('Customer.index',compact('customer_list'));
    }
    function customerdetail()
    {
        $cusedit = DB::table('users')
                    ->join('customers','customers.user_id','=','users.id')
                    ->join('branches','branches.id','=','users.branch_id')
                    ->select('users.*','branches.name as branchname','customers.totalamount','customers.point')
                    ->where('users.id',$id)
                    ->first();

        

        return view('Customer.index',compact('cusedit'));
    }
    function customeredit($id)
    {
        $edit=DB::table('users')
                ->join('customers','customers.user_id','=','users.id')
                ->join('branches','branches.id','=','users.branch_id')
                ->select('users.*','branches.name as branchname','customers.totalamount','customers.point')
                ->where('users.id',$id)
                ->first();
        return view('Customer.register',compact('edit'));

    }
    function customerupdate(Request $request,$id)
    {
        
        $user=user::find($id);
        $user->name=$request->name;
        $user->phoneno=$request->phoneno;
        $user->images=$request->images;
        $user->status = $request->status;
        
        $user->save();

        $customer = customer::where('user_id',$id)->first();
        $customer->totalamount = $request->totalamount;
        $customer->point = $request->point;
        $customer->save();

        $user = DB::table('users')
                    ->join('customers','customers.user_id','=','users.id')
                    ->join('branches','branches.id','=','users.branch_id')
                    ->where('users.id',$id)
                    ->select('users.*','branches.name as branchname','customers.totalamount','customers.point')
                    ->first();
        return redirect('/customer/list',compact('user'));
    }
}
