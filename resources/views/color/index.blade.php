@extends('layouts.app')


@section('content')


<h2>Color List</h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Color ID</th>
            <th> Color Name</th>
            <th>Color Code</th>
            <th>Status</th>
            <th>Color Image</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th></th>
            {{-- <th colspan="2"></th> --}}
        </tr>
    </thead>
    @foreach ($color as $colorlist)
    <tbody>
        <tr>
         
            <td>{{$colorlist->id}}</td>
            <td>{{$colorlist->colorname}}</td>
            <td>{{$colorlist->colorcode}}</td>
            <td>{{$colorlist->status}}</td>
            <td>
                @if ($colorlist->colorimage!=null)
                <img src="{{asset('upload/'.$colorlist->colorimage)}}" style="max-height:100%; max-width:100%" />
                @endif
            </td>
           
                <td>{{$colorlist->created_at}}</td>
            <td>{{$colorlist->updated_at}}</td>
            <td>
                <form action="{{url('colorprocess/'.$colorlist->id.'/edit')}}">
                    <input type="submit" value="Edit" class="btn btn-outline-success">
                </form>
            </td>
            <td>
                <form action="{{url('categoryprocess',[$colorlist->id])}}" method="POST">
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