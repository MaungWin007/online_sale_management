@extends('Admin_Panel.master')
@section('content')
    <div class="col-12">
        <form action="{{url('citysearch')}}">
        <div class="row">
            <div class="col-4">
                <input type="text" name="t1" class="form-control" placeholder="City Name">
            </div>
            <div class="col-4">
                <input type="submit" name="search" value="Search" class="btn btn-success">
            </div>
        </div>
    </form>
    </div>
    <h3>Branch List</h3>
    <table class="table table-dark table-striped">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Create_At</th>
            <th>Update_At</th>
            <th>Edit</th>
            <td>Delete</td>
        </tr>
    @foreach ($city as $citylist )
        <tr>
            <td>{{$citylist->name}}</td>
            <td>{{$citylist->description}}</td>
            <td>{{$citylist->status}}</td>
            <td>{{$citylist->created_at}}</td>
            <td>{{$citylist->updated_at}}</td>
            <td>
                <form action="{{url('cityprocess/'.$citylist->id.'/edit')}}">
                    <input type="submit" value="Edit" class="btn btn-outline-success">
                </form>
            </td>
            
            <td>
                <form action="{{url('cityprocess',[$citylist->id])}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE"/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" value="Delete" class="btn btn-outline-danger">
                </form>
            </td>
        </tr>
        
    @endforeach
    </table>
@endsection