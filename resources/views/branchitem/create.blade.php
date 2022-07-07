@extends('Admin_Panel.master')

@section('content')

<div class="container-fluid"> 
    {{-- <form action="{{url('/branchitemprocess/create')}}" method="POST" class="form-control"> --}}
       
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-4">
                        <input type="text" name="list" class="form-control" placeholder="ItemList">
                    </div>
                    <div class="col-4">
                        <select name="cid" id="" class="form-select">
                            @foreach ($category as $list )
                            <option value="{{$list->id}}">{{$list->categoryname}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="col-4"> 
                        <input type="submit" name="search" value="Search" class="btn btn-success">
                    </div>
                </div>
                <div class="row">
                    <table  id="displayTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Model</th>
                                <th scope="col">Sale_Price</th>
                                <th scope="col">Purchase_price</th>
                                <th scope="col">Selected</th>
                            </tr>
                        </thead>
                        <tbody id="btable">
                            @foreach ($searchdata as $data)
                            <tr>
                                <th id="id" scope="row">{{$data->id}}</th>
                                <th id="model">{{$data->model}}</th>
                                <th>{{$data->saleprice}}</th>
                                <th>{{$data->purchaseprice}}</th>
                                {{-- <th>{{$data->saleprice}}</th> --}}
                                <th>
                                    <input type="submit" id="select" name="select" onclick="showdata({{$data->id}},'{{$data->model}}')" class="btn btn-dark" value="Select"/>
                                       {{-- <button id="select" name="select" onclick="showdata({{$data->id}},'{{$data->model}}')" class="btn btn-dark">Select</button> --}}
                                </th>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-6">
                <div class="form-control">
                    <label for="">Item Name</label>
                    <input type="text" name="itemname" id="itemname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Detail</label>
                    <select multiple class="form-control" id="detail" name="detail">
                        
                      </select>
                    {{-- <textarea name="detail" id="detail" cols="30" rows="10" class="form-control"></textarea> --}}
                </div>
                
                <div class="form-control">
                    <label for="">Quantity</label>
                    <input type="text" name="qty" id="qty" class="form-control">
                </div>
                

                <div class="form-control">
                    <input type="submit" class="btn btn-success" onclick="add_data()" id="btn" value="ADD"/>
                    {{-- <button type="button" class="btn btn-success" onclick="add_data()" id="btn">ADD</button> --}}
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div id="list" class="col-6">

            </div>
            <div class="col-6">
                <form action="{{url('/branchitemprocess')}}" method="POST">
                    @csrf
                    <div class="row">
                        <input type="hidden" value="{{$branch->id}}" name="branchid" class="form-control"/>
                        <table>
                            <tr>
                                <td><label for="branchname">Branch Name :</label></td>
                                <td><input type="text" value="{{$branch->name}}" readonly  class="form-control"/></td>
                            </tr>
                            
                            <tr>
                                <td> <label for="Itemid">ITEM ID:</label></td>
                                <td><input type="text" name="itemid" id="itemid"  class="form-control"/></td>
                            </tr>
                            <tr>
                                <td> <label for="Itemid">Total Qty:</label></td>
                                <td><input type="text" name="totalqty" id="totalqty"   readonly class="form-control"/></td>
                            </tr>

                           
                        </table> 
                        <button class="btn btn-success" name="btn" id="btn">Assign</button>         
                    </div>
   
               
                    
                </form>
            </div>
        </div>

        {{-- {{$branch->id}}
        {{$branch->name}} --}}
{{-- {{$user->branch_id}} --}}
    {{-- </form> --}}
    
   
</div>


@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(e){

        $.ajaxSetup(
            {
                headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
             }
            }
        );

        
    
      
    });

    function showdata(id,model){
        // document.getElementById('').innerHTML="";
     //   var table=document.getElementById('id');
       // var row=table.rows.length;
        //   alert(id);
       $("#itemid").val(id);
    // alert(model);
        $("#itemname").val(model);
        
        // var detail=$("#detail").val();
        $.ajax({
            type:'POST',
            url:"{{url('detailid')}}",
            data:{itemid:id},
            success:function(data){
                // alert(JSON.stringify(data));
                
              
                $.each(data,function(key,value){
                    
                    $("#detail").append('<option value=\"'+value.id+'&'+value.colorname+'&'+value.sizename+'\" >'+value.colorname+"-"+value.sizename +'</option>');
                });
                // alert(value);
                // $("#detail").append('
                //     <option value="${id}">${colorname}</option>');
                // $("#detail").html(option);
            }
        });

        
    }

    function add_data(){
        // $("#itemid").val(id);
        // $("#itemname").val(model);
        // var id=$("#itemid").val();
        // var itemname=$("#itemname").val();
        var detail=$("#detail").val();
    //    alert(detail);
        var tmp=String(detail).split("&");
        // alert(tmp[0]);
        //0 detailid,1 color,2 size
        var qty=$("#qty").val();
    //    alert(id);

    $.ajax({
            type:'POST',
            url:"{{url('addinfo')}}",
            data:{id:tmp[0],color:tmp[1],size:tmp[2],qty:qty,},
            success:function(data){
                // alert(JSON.stringify(data));
                 var table="<table class='table table-bordered'>";
                    table=table+"<thead>";
                     table=table+"<tr><td scope='col'>ItemdetailID</td><td scope='col'>Color</td><td scope='col'>Size</td><td scope='col'>Qty</td><td scope='col'>Delete</td></tr>";
                // var itemdetailid="ItemdetailID";
                 // var tr1="Color Name";
                 // var tr2="Size Name";
                        var a=0;
                        var total=0;
                 $.each(data,function(key,value){
                    //  alert(value);
                    table=table+"<tbody>";
                      table=table+"<tr>";
                     table=table+"<td scope='row'>"+value.id+"</td>";
                     table=table+"<td scope='row'>"+value.color+"</td>";
                    table=table+"<td scope='row'>"+value.size+"</td>";
                     table=table+"<td scope='row'>"+value.qty+"</td>";
                     table=table+"<td><button class='delete'  id=detaildelete"+a+" value="+a+"><i class='delete fa fa-trash' style='color:red;' id=detaildelete"+a+" value="+a+"></i></button></td>";
                     table=table+"</tr>";
                     table=table+"</tbody>";
                        a++;
                        total=total+parseInt(value.qty);
                       
                     
                 });
                 table=table+"</thead>";
                  table=table+"</table>";
               
                 $('#list').html(table);
                 $('#totalqty').val(total);
            }
        });

   
    
    }

    $(document).on('click','.delete',function(){
        
        var id=$(this).attr('id');
        var value=$('#'+id).val();

        // alert(value);
        $.ajax({
            type:'POST',
            url:"{{url('branchitemdelete')}}",
            data:{deleteid:value},
            success:function(data){
                // alert(JSON.stringify(data));
                var table="<table class='table table-bordered'>";
                    table=table+"<thead>";
                     table=table+"<tr><td scope='col'>ItemdetailID</td><td scope='col'>Color</td><td scope='col'>Size</td><td scope='col'>Qty</td><td scope='col'>Delete</td></tr>";
                        var a=0;
                        var total=0;
                    $.each(data,function(key,value){
                    //  alert(value);
                    table=table+"<tbody>";
                      table=table+"<tr>";
                     table=table+"<td scope='row'>"+value.id+"</td>";
                     table=table+"<td scope='row'>"+value.color+"</td>";
                    table=table+"<td scope='row'>"+value.size+"</td>";
                     table=table+"<td scope='row'>"+value.qty+"</td>";
                     table=table+"<td><button class='delete'  id=detaildelete"+a+" value="+a+"><i class='delete fa fa-trash'style='color:red;' id=detaildelete"+a+" value="+a+"></i></button></td>";
                     table=table+"</tr>";
                     table=table+"</tbody>";
                        a++;
                        total=total+parseInt(value.qty);
                        
                     
                 });
                 table=table+"</table>";
                
                $('#list').html(table);
                $('#totalqty').val(total);

                
            }
        });

       

    });
    

    

   
</script>


@endsection