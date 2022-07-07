@extends('Admin_Panel.master')

@section('content')

<div class="card">
    <div class="card-header">Sale Form</div>
    <div class="card-body">
        <div class="card">
        <div class="row">
            <div class="col-6">
                <div class="row">
                <div class="col-2">
                    <input type="text" name="itemname"  class="form-control" placeholder="Item Model">
                </div>
                <div class="col-2" >
                    <select name="categoryname" id="categoryname" class="form-select">
                        @foreach ($category as $cname)
                            <option value="{{$cname->id}}">{{$cname->categoryname}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <input type="submit" name="search" id="search" value="Search" class="btn btn-success">
                </div>
            </div>
            <div class="row " style="margin: 0;padding:0;" >
                <?php $i=0;?>
            @foreach ($searchdata as $insert)
            
                <div class="col-3  m-0 p-0" style="margin: 0;padding:0;" >
                    <div id="img_container" class="card my-3 mx-2"  >
                        <img src="{{asset('item_upload/'.$insert->photo)}}" style="width:160px; height:140px;margin-top:10px;" name="photo" class="rounded-top card-img-top" alt="Responsive image"/>
                        <button class="button" id="add{{$i}}" value={{$insert->id}} onclick="showdata({{$insert->id}},'{{$insert->model}}',{{$insert->sale}})" data-bs-toggle="modal" data-bs-target="#staticBackdrop" ><i class="fa-solid fa-cart-plus"></i></button>
                        <div class="card-body">
                          <div>
                            <p class="card-text" id="model" value={{$insert->model}}>{{$insert->model}}</p>
                          </div>
                          <div>
                            <p class="card-text" id="saleitem" value={{$insert->sale}}>{{$insert->sale."/Kyats"}}</p>
                          </div>
                        </div>
                      </div>
                </div>
            <?php $i++;?>
            @endforeach
        </div>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Selected Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
            
              
               <table>
                <tr>
                  <th><Label>Item ID:</Label></th>
                  <th><input type="text" name="" id="branchitemid" readonly></th>
                </tr>
                <tr>
                  <th><Label>Item Name:</Label></th>
                  <th><input type="text" name="itemname" id="itemname"  readonly></th>
                </tr>
                <tr>
                  <th><Label>Sale Price:</Label></th>
                  <th><input type="text" name="sale" id="sale"  readonly></th>
                </tr>
                <tr>
                 <th><Label>Detail</Label></th>
                 <th>
                   <select multiple name="detail" id="detail"></select>
                 </th>
                </tr>
               
                <tr>
                  <th><Label>Qty</Label></th>
                  <th><input type="text" name="qty" id="qty"></th>
                </tr>
              </table>
           
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="addbutton"  class="btn btn-primary" onclick="add_data()">ADD</button>
              </div>
            </div>
          </div>
        </div>
        </div>
            <div class="col-6">
              
                <div class="row-2">

                  <form action="{{url('saleprocess')}}" method="POST" class="container-fluid">
                    @csrf
                    <div class="row g-3">
                      <div class="col-6">
                        <label for="inputEmail4" class="form-label">Sale_Code</label>
                        <input type="text" class="form-control" name="salecode" id="salecode">
                      </div>
                      <div class="col-6">
                        <label for="inputEmail4" class="form-label">Customer Name</label>

                      <div class="input-group mb-3">
                        <input type="hidden" name="customer_id" id="customer_id">
                        <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Customer_Name" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary"  type="button" class="customer_add" data-bs-toggle="modal" href="#customermodel" id="customer_add">Add</button>
                      </div>
                    </div>
                    <div class="col-6">
                      <label class="col-6 form-label">Payment Type
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="payment" id="payment" value="cash" >
                        <label class="form-check-label" for="inlineRadio1">Cash</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="payment" id="payment" value="card">
                        <label class="form-check-label" for="inlineRadio2">Card</label>
                      </div>
                    </label>
                      
                    </div>
                    <div class="col-6">
                      <label for="inputAddress" class="form-label">Address</label>
                      <input type="text" class="form-control" name="address" id="address" value="{{$branch->name}}" readonly>
                    </div>
                    <div class="col-6">
                      <label for="inputAddress2" class="form-label">Delivery Address</label>
                      <input type="text" class="form-control" name="deliveryaddress" id="deliveryaddress" value="{{$branch->name}}" readonly>
                    </div>
                    <div class="col-6">
                    <label for="inputCity" class="form-label">Total_Amount</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="totalamount" id="totalamount" readonly>
                      <span class="input-group-text">/KS</span>
                    </div>
                  </div>
                   
                    <div class="col-md-4">
                      <label for="inputZip" class="form-label">Discount_Amount</label>
                      <div class="input-group">
                      <input type="text" class="form-control" id="disc_amount" name="disc_amount" value="0" readonly>
                      <span class="input-group-text">/KS</span>
                    </div>
                    </div>
                    <div class="col-md-4">
                      <label for="inputZip" class="form-label">Net_Amount</label>
                      <div class="input-group">
                      <input type="text" class="form-control" id="net_amount" name="net_amount" value="0" readonly>
                      <span class="input-group-text">/KS</span>
                    </div>
                    </div>
                    <div class="col-md-4">
                      <label for="inputCity" class="form-label">Total_Point</label>
                      <div class="input-group">
                      <input type="text" class="form-control" id="totalpoint" name="totalpoint" value="0" readonly>
                      <span class="input-group-text">Point</span>
                    </div>
                    </div>
                    <div class="col-md-4">
                      <label for="inputCity" class="form-label">Total_Qty</label>
                      <div class="input-group">
                      <input type="text" class="form-control" id="totalqty" name="totalqty" value="0" readonly>
                      <span class="input-group-text">/Qty</span>
                    </div>
                    </div>

                    <div class="col-md-4">
                      <label for="inputCity" class="form-label">Paid_Amount</label>
                      <div class="input-group">
                      <input type="text" class="form-control" id="paidamount" name="paidamount">
                      <span class="input-group-text">/KS</span>
                    </div>
                    </div>
                    <div class="col-md-4">
                      <label for="inputCity" class="form-label">Change Amount</label>
                      <div class="input-group">
                      <input type="text" class="form-control" id="changeamount" name="changeamount" readonly>
                      <span class="input-group-text">/KS</span>
                    </div>
                    </div>
                    
                    
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                  </div>



                  {{-- Model for customer add button --}}
                  <div class="modal fade"  id="customermodel" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                         
                          <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="col-md-4">Name</th>
                                    <th class="col-md-3">Phone</th>
                                    <th class="col-md-4">Email</th>
                                    <th class="col-md-1"></th>
                                </tr>
                            </thead>
                            <tbody id="customerlist"></tbody>
                        </table>
                      
                        </div>
                        
                      </div>
                    </div>
                  </div>
                
                  {{-- End model --}}
                  </form>

                  <hr>
                  
                  <div class="container-fluid">
                    <div id="list" class="col-6">
                      
                    </div>
                  </div>
                </div>
             
            
            </div>
        </div>
    </div>
    </div>
</div>

@endsection
@section('scripts')

    <script type="text/javascript">
//alert(":");
$(document).ready(function(){

    $.ajaxSetup(
            {
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            }
        );

        // $(document).on('click','.button',function(){
        //     var id=$(this).attr("id");
        //     var value=$('#'+id).val();

        //     //  alert(value);
        //     // $('#branchitemid').val(value);
            
            
        // });

        // start paid amount - total amount
          $("#paidamount").keyup(function(){
            $("#changeamount").val($("#totalamount").val()-$("#paidamount").val());
          });
        // end this

        $('#customer_add').click(function(){
          // var insert="aa";
          var type="all";
      // alert("success");
      $.ajax({
        type:'GET',
        url:"{{route('btncustomer')}}",
        data:{type:type},
        success:function(result){
          //  alert(JSON.stringify(result));
          var list;
          $.each(result,function(key,value){
                        list += "<tr>";
                        list += "<td>"+value["name"]+"</td>";
                        list += "<td>"+value["phoneno"]+"</td>";
                        list += "<td>"+value["email"]+"</td>";
                        list += "<td><span id='"+value["id"]+'|'+value["name"]+"' class='btnselect btn btn-outline-secondary btn-sm'><i class='fa-solid fa-arrow-right-from-bracket'></i></span></td>";
                        list += "</tr>";
                    });
                    $('#customerlist').html(list);
        }
      });
    });

    $(document).on('click','.btnselect',function(){
        var data=$(this).attr('id').split('|');
        // alert(data);
         $('#customer_id').val(data[0]);
         $('#customer_name').val(data[1]);
         $('#customermodel').modal('hide');
       
         
    });
           

});
function clearSelectList(list) {
    // when length is 0, the evaluation will return false.
    while (list.options.length) {
        // continue to remove the first option until no options remain.
        list.remove(0);
    }
}


  function showdata(id,model,sale){
    $('#branchitemid').val(id);
    // alert(id);
    $('#itemname').val(model);
    // alert(model);
    $('#sale').val(sale);
    // alert(sale);

    $.ajax({
      type:'POST',
      url:"{{url('detail')}}",
      data:{itemid:id},
      success:function(data){

        var list=document.getElementById("detail");
        clearSelectList(list);
        // alert(JSON.stringify(data));
        $.each(data,function(key,value){
          $('#detail').append('<option value=\"'+value.id+'&'+value.colorname+'&'+value.sizename+'\" >'+value.colorname+"-"+value.sizename +'</option>');
        });

        
      }
    });

  }

  function add_data(){
        // $("#itemid").val(id);
        // $("#itemname").val(model);
        var id=$("#branchitemid").val();
        // var itemname=$("#itemname").val();
        var detail=$("#detail").val();
       // alert(detail);
        var tmp=String(detail).split("&");
        //alert(tmp[1]);
        //0 detailid,1 color,2 size
        var qty=$("#qty").val();
        var sale=$("#sale").val();
        // alert(sale);
    //    alert(id);

    $.ajax({
            type:'POST',
            url:"{{url('add_data')}}",
            data:{itemid:id,color:tmp[1],size:tmp[2],qty:qty,sale:sale},
            success:function(result){
                // alert(JSON.stringify(result));
                 var table="<table class='table table-bordered'>";
                    table=table+"<thead>";
                     table=table+"<tr><td scope='col'>Item_lID</td><td scope='col'>Color</td><td scope='col'>Size</td><td scope='col'>Qty</td><td scope='col'>Sale_Price</td><td scope='col'>Delete</td></tr>";
                // var itemdetailid="ItemdetailID";
                 // var tr1="Color Name";
                 // var tr2="Size Name";
                        var a=0;
                        var sale_price=0;
                        var total_qty=0;
                        // var total=0;
                 $.each(result,function(key,value){
                    //  alert(value);
                    table=table+"<tbody>";
                      table=table+"<tr>";
                     table=table+"<td scope='row'>"+value.id+"</td>";
                     table=table+"<td scope='row'>"+value.color+"</td>";
                    table=table+"<td scope='row'>"+value.size+"</td>";
                     table=table+"<td scope='row'>"+value.qty+"</td>";
                     table=table+"<td scope='row'>"+value.sale+"</td>";
                     table=table+"<td><button class='delete'  id=detaildelete"+a+" value="+a+"><i class='delete fa fa-trash' style='color:red;' id=detaildelete"+a+" value="+a+"></i></button></td>";
                     table=table+"</tr>";
                     table=table+"</tbody>";
                        a++;
                        sale_price=sale_price+parseInt(value.sale);
                        total_qty=total_qty+parseInt(value.qty);
                        // total=total+parseInt(value.qty);
                       
                     
                 });
                 table=table+"</thead>";
                  table=table+"</table>";
               
                 $('#list').html(table);
                //  alert(sale_price);
                 $('#totalamount').val(sale_price);
                 $('#totalqty').val(total_qty);
                 
            }
        });

        $(document).on('click','.delete',function(){
        
        var id=$(this).attr('id');
        var value=$('#'+id).val();

        //  alert(value);
         $.ajax({
            type:'POST',
            url:"{{url('branchitemdelete')}}",
            data:{deleteid:value},
            success:function(result){
                // alert(JSON.stringify(data));
                var table="<table class='table table-bordered'>";
                    table=table+"<thead>";
                     table=table+"<tr><td scope='col'>ItemdetailID</td><td scope='col'>Color</td><td scope='col'>Size</td><td scope='col'>Qty</td><td scope='col'>Sale_Price</td><td scope='col'>Delete</td></tr>";
                        var a=0;
                        var sale_price=0;
                        var total_qty=0;
                        // var total=0;
                    $.each(result,function(key,value){
                    //  alert(value);
                    table=table+"<tbody>";
                      table=table+"<tr>";
                     table=table+"<td scope='row'>"+value.id+"</td>";
                     table=table+"<td scope='row'>"+value.color+"</td>";
                    table=table+"<td scope='row'>"+value.size+"</td>";
                     table=table+"<td scope='row'>"+value.qty+"</td>";
                     table=table+"<td scope='row'>"+value.sale+"</td>";
                     table=table+"<td><button class='delete'  id=detaildelete"+a+" value="+a+"><i class='delete fa fa-trash'style='color:red;' id=detaildelete"+a+" value="+a+"></i></button></td>";
                     table=table+"</tr>";
                     table=table+"</tbody>";
                        a++;
                        sale_price=sale_price+parseInt(value.sale);
                        total_qty=total_qty+parseInt(value.qty);
                        // total=total+parseInt(value.qty);
                        
                     
                 });
                 table=table+"</table>";
                
                $('#list').html(table);
                $('#totalamount').val(sale_price);
                $('#totalqty').val(total_qty);
                // $('#totalqty').val(total);

                
            }
        });

       

    });

   

   
    
    }

    


    
    

    </script>


@endsection