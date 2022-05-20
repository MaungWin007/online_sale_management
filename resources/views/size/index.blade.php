@extends('layouts.app')

@section('content')

<h2>Size List</h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Size ID</th>
            <th> Size Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th></th>
            {{-- <th colspan="2"></th> --}}
        </tr>
    </thead>
    @foreach ($size as $sizelist)
    <tbody>
        <tr>
           
            <td>{{$sizelist->id}}</td>
            <td>{{$sizelist->sizename}}</td>
            <td>{{$sizelist->description}}</td>
            <td>{{$sizelist->status}}</td>
            <td>{{$sizelist->created_at}}</td>
            <td>{{$sizelist->updated_at}}</td>
            <td>
                <form action="{{url('sizeprocess/'.$sizelist->id.'/edit')}}">
                    <input type="submit" value="Edit" class="btn btn-outline-success">
                </form>
            </td>
            <td>
                <form action="{{url('sizeprocess',[$sizelist->id])}}" method="POST">
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