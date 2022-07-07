@extends('Admin_Panel.master')

@section('content')

<h2>Category List</h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Category ID</th>
            <th> Category Name</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th></th>
            {{-- <th colspan="2"></th> --}}
        </tr>
    </thead>
    @foreach ($category as $list)
    <tbody>
        <tr>
            {{-- <td>{{$staff->name}}</td> --}}
            <td>{{$list->id}}</td>
            <td>{{$list->categoryname}}</td>
            <td>{{$list->status}}</td>
            <td>{{$list->created_at}}</td>
            <td>{{$list->updated_at}}</td>
            <td>
                <form action="{{url('categoryprocess/'.$list->id.'/edit')}}">
                    <input type="submit" value="Edit" class="btn btn-outline-success">
                </form>
            </td>
            <td>
                <form action="{{url('categoryprocess',[$list->id])}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE"/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" value="Delete" class="btn btn-outline-danger">
                </form>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>

@endsection