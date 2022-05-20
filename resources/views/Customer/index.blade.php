@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
            <form action="{{url('adminsearch')}}">
                <div class="row">
                    <div class="col">
                        <input type="text" name="search_staff" class="form-control" placeholder="Staff Name"/>
                    </div>
                    <div class="col-2">
                        <input type="submit" name="search" value="search" class="btn btn-outline-primary"/>
                        <a href="{{url('customer')}}" class="btn btn-outline-success">Clear</a>
                        <a href="{{url('/customer/register')}}" class="btn btn-outline-dark">Add</a>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
    <h2>Customer List</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Image</th>
                <th>Branch</th>
                <th>Status</th>
                <th>Total Amount</th>
                <th>Point</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th></th>
                {{-- <th colspan="2"></th> --}}
            </tr>
        </thead>
        @foreach ($customer_list as $cus)
        <tbody>
            <tr>
                {{-- <td>{{$staff->name}}</td> --}}
                <td><a href="{{url('customer/'.$cus->id.'/detail')}}" class="btn btn-link" style="text-decoration: none;">{{$cus->name}}</a></td>
                <td>{{$cus->email}}</td>
                <td>{{$cus->phoneno}}</td>
                <td>{{$cus->images}}</td>
                <td>{{$cus->branchname}}</td>
                <td>{{$cus->status}}</td>
                <td>{{$cus->totalamount}}</td>
                <td>{{$cus->point}}</td>
                <td>{{$cus->created_at}}</td>
                <td>{{$cus->updated_at}}</td>
                <td><a href="{{url('customer/'.$cus->id.'/edit')}}" class="btn btn-outline-secondary">Edit</a></td>
                {{-- <td>
                    <form action="{{url('branch',[$staff->id])}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE"/>
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <input type="submit" value="Delete" class="btn btn-outline-danger"/>
                    </form>
                </td> --}}
            </tr>
        </tbody>
        @endforeach
    </table>
    {{-- <div>
        {{$all_staff_records->links()}}
    </div> --}}

@endsection