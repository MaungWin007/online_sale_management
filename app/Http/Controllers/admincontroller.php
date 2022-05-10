<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\branch;
use App\Models\role;
use App\Models\User;
use App\Models\staff;

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
    function Register(Request $request)
    {
        if(!isset($request["usertype"]))
        {
            $request["usertype"]="customer";
            $request["branch_id"] = 1; 
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

            return redirect('/customer');
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

        
        //dd($all_staff_records);

        return view('Admin.index',compact('staff_list'));
    }
    function staffedit($id)
    {
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
        $user=user::find($id);
        $user->name=$request->name;
        $user->phoneno=$request->phoneno;
        $user->images=$request->images;
        $user->status=$request->status;

        $user->save();
        return view('Admin.update',compact('user'));
    }
    function staffdetails($id)
    {
        
    }
    function staffsearch()
    {

    }
}
