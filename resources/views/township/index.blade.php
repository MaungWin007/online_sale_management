@extends('Admin_Panel.master')

@section('content')
    <div class="col-12">
        <form action="{{url('townshipsearch')}}">
        <div class="row">
            <div class="col-4">
                <input type="text" name="t1" class="form-control" placeholder="Township Name">
            </div>
            <div class="col-4">
                <input type="submit" name="search" value="Search" class="btn btn-success">
            </div>
        </div>
    </form>
    </div>
    <h3>TOwnship List</h3>
    <table class="table table-dark table-striped">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>City ID</th>
            <th>Status</th>
            <th>Create_At</th>
            <th>Update_At</th>
            <th>Edit</th>
            <td>Delete</td>
        </tr>
    @foreach ($township as $tslist )
        <tr>
            <td>{{$tslist->name}}</td>
            <td>{{$tslist->description}}</td>
            <td>{{$tslist->status}}</td>
            <td>{{$tslist->city_id}}</td>
            <td>{{$tslist->created_at}}</td>
            <td>{{$tslist->updated_at}}</td>
            <td>
                <form action="{{url('townshipprocess/'.$tslist->id.'/edit')}}">
                    <input type="submit" value="Edit" class="btn btn-outline-success">
                </form>
            </td>
            
            <td>
                <form action="{{url('townshipprocess',[$tslist->id])}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE"/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" value="Delete" class="btn btn-outline-danger">
                </form>
            </td>
        </tr>
        
    @endforeach
    </table>
@endsection