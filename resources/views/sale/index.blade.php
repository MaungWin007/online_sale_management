@extends('Admin_Panel.master')
@section('content')

<div class="card">
   
   
    <table  class="table">
        <thead >
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Total_Qty</th>
                <th scope="col">Address</th>
                <th scope="col">Total_Amount</th>
                <th scope="col">Detail</th>
                <th scope="col">Excel Sheet</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sale as $data)
            <tr>
                <td scope="row">{{$data->created_at}}</td>
                <td scope="row">{{$data->customer_id}}</td>
                <td scope="row">{{$data->Totalqty}}</td>
                <td scope="row">{{$data->deliveryaddress}}</td>
                <td scope="row">{{$data->totalamount}}</td>
                <td>
                   
                   <a href="{{url('sale_detail/'.$data->id)}}"><i class="fa-solid fa-d"></i></a>
                </td>
                <td>
                    <a href="{{'exportexcel/'.$data->id}}"><i class="fa-solid fa-file-csv"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
