@extends('Admin_Panel.master')

@section('content')

    <div class="card">
        <div class="card-header">BranchItem Table</div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th  scope="col">BranchItemID</th>
                        <th  scope="col">Item_Name</th>
                        <th  scope="col">Total_Quantity</th>
                        <th scope="col">Status</th>
                        <th scope="col">Branch_Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                    </tr>
                </thead>
                @foreach ($branchitem as $list )
                    <tbody>
                        <tr>
                            <td scope="row">{{$list->id}}</td>
                            <td>{{$list->itemname}}</td>
                            <td>{{$list->totalqty}}</td>
                            <td>{{$list->status}}</td>
                            <td>{{$list->branchname}}</td>
                            <td>{{$list->created_at}}</td>
                            <td>{{$list->updated_at}}</td>
                            <td>
                                <form action="{{url('branchitemprocess/'.$list->id.'/edit')}}">
                                    @csrf
                                    <input type="submit" value="Edit" class="btn btn-outline-success">
                                </form>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>




@endsection