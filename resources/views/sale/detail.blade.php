@extends('Admin_Panel.master')
@section('content')
<style>
    label{
        font-weight: bolder;
    }
    .large{
        font-weight: bolder;
    }
</style>
<div class="card">
    
    <div class="row">
        @foreach ($sale_record as $rec )
        <div class="row">
            <div class="col-6">

            </div>
            <div class="col-6">
                <div class="form-group row ">
                    <label  class="col-sm-2 col-form-label">SaleCode:</label>
                    <div class="col-sm-10">
                      <input readonly class="form-control-plaintext" value="{{$rec->salecode}}">
                    </div>
                  </div>
                  <div class="form-group row ">
                    <label  class="col-sm-2 col-form-label">Date:</label>
                    <div class="col-sm-10">
                      <input readonly class="form-control-plaintext" value="{{$rec->created_at}}">
                    </div>
                  </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <h2>Sale Information</h2>
            <div class="col-6">
                <div class="mb-3">
                    <label  class="form-label">Customer Name</label>
                    <input class="form-control-plaintext" value="{{$rec->uname}}">
                  </div>
                  <div class="mb-3">
                    <label  class="form-label">Customer Email</label>
                    <input class="form-control-plaintext" value="{{$rec->uemail}}">
                  </div>
                  <div class="mb-3">
                    <label  class="form-label"> Delivery Address</label>
                    <input class="form-control-plaintext" value="{{$rec->deliveryaddress}}">
                  </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label  class="form-label">Branch Name</label>
                    <input class="form-control-plaintext" value="{{$rec->bname}}">
                  </div>
                  <div class="mb-3">
                    <label  class="form-label">Township Name</label>
                    <input class="form-control-plaintext" value="{{$rec->tname}}">
                  </div>
                  <div class="mb-3">
                   <a href="{{url('generatesalepdf/'.$rec->id)}}">Print</a>
                  </div>
            </div>
        </div>
       
        @endforeach
    </div>
    <hr>
    <div class="row">
        <h2>Sale_Item Information</h2>
        <table class="table border">
            <thead class="table-dark">
                <tr>
                    <th >Item_Name</th>
                    <th >Color_Name</th>
                    <th >Size_Name</th>
                    <th >Quantity</th>
                    <th >Price</th>
                    <th></th>
                    <th></th>
                    
                </tr>
            </thead>
           
                @foreach ($sale_detail as $detail)
                <tbody>
                    <td>{{$detail->mod}}</td>
                    <td>{{$detail->cname}}</td>
                    <td>{{$detail->sname}}</td>
                    <td>{{$detail->qty}}</td>
                    <td>{{$detail->unitprice}}</td>
                    <td></td>
                    <td></td>
                 
                </tbody>
                @endforeach

                @foreach ($sale_record as $srec)
                <tbody>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="large">Total Quantity:</td>
                    <td class="large">{{$srec->Totalqty}}</td>
                    <td></td>
                </tbody>
                <tbody>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="large">Total Price:</td> 
                    <td class="large">{{$srec->totalamount}}<span>/ Kyats</span></td>
                    <td></td>
                    <td></td>
                </tbody>
                <tbody>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="large">Discount Price:</td>
                    <td class="large" >{{$srec->discountamount}}<span>/ Kyats</span></td>
                    <td></td>
                </tbody>
                <tbody>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="large">Paid Price:</td>
                    <td class="large" >{{$srec->paidamount}} <span>/ Kyats</span></td>
                    <td></td>
                </tbody>
                <tbody>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="large">Total Point:</td>
                    <td class="large" >{{$srec->totalpoint}}</td>
                    <td></td>
                </tbody>
                    
                @endforeach
           
        </table>
    </div>
</div>

@endsection