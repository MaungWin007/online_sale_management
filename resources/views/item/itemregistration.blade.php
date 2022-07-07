@extends('Admin_Panel.master')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Item Registration') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{url('/itemprocess')}}" enctype="multipart/form-data">
                            @csrf
                            {{-- @if ($update==true)
                                @method('PATCH')
                            @endif --}}
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Model Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="model" type="text" class="form-control @error('name') is-invalid @enderror" name="model"  required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Sales Price') }}</label>
    
                                <div class="col-md-6">
                                    <input id="sale" type="text" class="form-control @error('name') is-invalid @enderror" name="saleprice" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Purchase Price') }}</label>
    
                                <div class="col-md-6">
                                    <input id="purchase" type="text" class="form-control @error('name') is-invalid @enderror" name="purchaseprice" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
    
                                <div class="col-md-6">
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description"  required autocomplete="name" autofocus id="description" cols="30" rows="5" type="text"></textarea>
                                   
    
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>
                                <div class="col-md-6">
                                    <select class="form-select @error('category_id') is-invalid @enderror" aria-label="Default select example" name="category_id" required autocomplete="category_id" autofocus>
                                        <option selected disabled hidden>Select Category</option>
                                        @foreach ($category as $categorylist)
                                        <option  value="{{$categorylist->id}}">{{$categorylist->categoryname}}</option>
                                        @endforeach
                                    </select>
                                   
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="itemimage" class="col-md-4 col-form-label text-md-end">{{ __('Color Image') }}</label>
    
                                <div class="col-md-6">
                                    <input id="itemimage" type="file" class="form-control @error('name') is-invalid @enderror" name="itemimage" >
    
                                    
                                </div>
                            </div>
                            
                            <div>
                                <button type="submit" class="btn btn-success">Save</button>
                                <button>Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <div id='image' style="width:200px;height:200px;">
                            <img id="img" src="{{asset('upload/23160e40-9acf-4e39-833e-f9824dac337b.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">

                        <div class="row mb-3">
                            <label for="color_id" class="col-md-4 col-form-label text-md-end">{{ __('Color') }}</label>
                            <div class="col-md-6">
                                <select id="colorid" class="form-select @error('color_id') is-invalid @enderror" name="color_id"  >
                                 
                                    @foreach ($color as $colorlist)
                                    <option  value="{{$colorlist->id}}&{{$colorlist->colorcode}}&{{$colorlist->colorimage}}&{{$colorlist->colorname}}">{{$colorlist->colorname}}</option>
                                    @endforeach
                                </select>
                               
                                @error('color_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="size" class="col-md-4 col-form-label text-md-end">{{ __('Size') }}</label>
                            <div class="col-md-6">
                                <select id="sizeid" class="form-select @error('size_id') is-invalid @enderror"  name="size_id">
                                  
                                    @foreach ($size as $sizelist)
                                    <option  value="{{$sizelist->id}}&{{$sizelist->sizename}}&{{$sizelist->description}}">{{$sizelist->sizename}}</option>
                                    @endforeach
                                </select>
                               
                                @error('size_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div style="margin-left: 80%">   
                             <button id="btn">
                                <i class="fa fa-plus"></i> 
                            </button> 
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="card" id="list">
                </div>
            </div>
        </div>
        
    </div>

@endsection
@section('scripts')

<script type="text/javascript">

$(document).ready(function(e){

    $("#colorid").change(function(){
         var colorValue=  $("#colorid").val().split("&");
         
         if(colorValue[2]!=null || colorValue[2]!="")
         {
            var path="<?php echo asset('upload');?>";
           // alert(path);
             $("#img").attr('src',path+"/"+colorValue[2]);
         }

         if(colorValue[1]!=null || colorValue[1]!="")
         {
            //  alert(colorValue[1]);
             $("#image").css("background-color",colorValue[1]);
         }

      });

    //   $("#btn").click(function(){
    //     alert('HELLO');
    // });




    $.ajaxSetup(
        {
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        }
    );

    $('#btn').click(function(e){
        e.preventDefault();
        //alert("btn");
        var color=$('#colorid').val().split("&");
        var size=$('#sizeid').val().split("&");
        
        $.ajax({
            type:'POST',
            url:"{{route('buttonrequest')}}",
            data:{colorid:color[0],colorname:color[3],sizeid:size[0],sizename:size[1]},
            success:function(data)
            {
               alert(JSON.stringify(data));
                
                var table="<table>";
                    table=table+"<tr><td>C</td><td>S</td><td>S</td><td>S</td></tr>";
                var tr1="Color Name";
                var tr2="Size Name";
                var d=0;
                
                $.each(data,function(key,value){
                    table=table+"<tr>"; 
                    table=  table+"<td>"+ value.colorname+"</td>";
                    table=  table+"<td>"+ value.sizename+"</td>";
                    table=table+"<td><button type=button class=delete btn-danger id=deleteid"+d+" value="+d+">"+"DELETE</button></td>";
                    table=table+"</tr>"; 

                    d++;
                });
              
                table=table+"</table>";
                
                $('#list').html(table);


            }
        });
    });

    $(document).on('click','.delete',function(){
        var id=$(this).attr('id');//deleteid0
        var value=$('#'+id).val();
        // alert(value);
        $.ajax({
            type:'POST',
            url:"{{route('delete')}}",
            data:{id:value},
            success:function(data){
                // alert(JSON.stringify(data));
                var table="<table>";
                    table=table+"<tr><td>C</td><td>S</td><td>S</td><td>S</td></tr>";
                var tr1="Color Name";
                var tr2="Size Name";
                var d=0;
                
                $.each(data,function(key,value){
                    table=table+"<tr>"; 
                    table=  table+"<td>"+ value.colorname+"</td>";
                    table=  table+"<td>"+ value.sizename+"</td>";
                    table=table+"<td><button type=button class=delete btn-danger id=deleteid"+d+" value="+d+">"+"DELETE</button></td>";
                    table=table+"</tr>"; 

                    d++;
                });
              
                table=table+"</table>";
                
                $('#list').html(table);
            }
        });
       
       
    });
});
</script>
@endsection