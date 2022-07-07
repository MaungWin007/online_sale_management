@extends('Admin_Panel.master')
@section('content')
  <div class="form-group">
    <div class="card ">
        <div class="card-header">Branch List</div>
      
        
     
            <div class="col-12" style="padding-top: 10px">
                <form action="{{url('branchsearch')}}" class="form-group">
                <div class="row">
                    <div class="col-8">
                        <input type="text" name="t1" class="form-control" placeholder="Branch Name">
                    </div>
                    <div class="col-4">
                        <input type="submit" name="search" value="Search" class="btn btn-success">
                    </div>
                  
                </div>
            </form>
            </div>

        <table class="table table-bordered" >
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Contact No</th>
                    <th scope="col">Email</th>
                    <th scope="col">Store Map</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Create_At</th>
                    <th scope="col">Update_At</th>
                    <th scope="col">Edit</th>
                    <td scope="col">Delete</td>
                </tr>
            </thead>
           <tbody>
            @foreach ($branch as $branchlist )
            <tr>
                <th scope="row">{{$branchlist->name}}</th>
                <th>{{$branchlist->address}}</th>
                <th>{{$branchlist->contact}}</th>
                <th>{{$branchlist->email}}</th>
                <th>{{$branchlist->storemap}}</th>
                <th>{{$branchlist->image}}</th>
                <th>{{$branchlist->status}}</th>
                <th>{{$branchlist->created_at}}</th>
                <th>{{$branchlist->updated_at}}</th>
                <th>
                    <form action="{{url('branchprocess/'.$branchlist->id.'/edit')}}">
                        <input type="submit" value="Edit" class="btn btn-outline-success">
                    </form>
                </th>
                
                <th>
                    <form action="{{url('branchprocess',[$branchlist->id])}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE"/>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="submit" value="Delete" class="btn btn-outline-danger">
                    </form>
                </th>
            </tr>
            
        @endforeach
           </tbody>
       
        </table>
       
    </div>
  </div>
@endsection