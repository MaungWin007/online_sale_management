@extends('Admin_Panel.master')

@section('content')

h2>Item List</h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Item ID</th>
            <th>Model</th>
            <th>Sale Price</th>
            <th>Purchase Price</th>
            <th>Description</th>
            <th>Available Color</th>
            <th>Available Size</th>
            <th>Category Name</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th></th>
            {{-- <th colspan="2"></th> --}}
        </tr>
    </thead>
    @foreach ($item as $itemlist)
    <tbody>
        <tr>
            {{-- <td>{{$staff->name}}</td> --}}
            <td>{{$itemlist->id}}</td>
            <td>{{$itemlist->model}}</td>
            <td>{{$itemlist->saleprice}}</td>
            <td>{{$itemlist->purchaseprice}}</td>
            <td>{{$itemlist->description}}</td>
            <td>{{$itemlist->availablecolor}}</td>
            <td>{{$itemlist->availablesize}}</td>
            <td>{{$itemlist->categoryname}}</td>
            <td>{{$itemlist->created_at}}</td>
            <td>{{$itemlist->updated_at}}</td>
            <td>
                <form action="{{url('itemprocess/'.$itemlist->id.'/edit')}}">
                    <input type="submit" value="Edit" class="btn btn-outline-success">
                </form>
            </td>
            <td>
                <form action="{{url('itemprocess',[$itemlist->id])}}" method="POST">
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