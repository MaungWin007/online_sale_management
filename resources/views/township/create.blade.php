@extends('Admin_Panel.master')
<?php 

    $updateStatus=false;
    if(isset($township))
    {
        $updateStatus=true;
    }
?>
@section('content')
    
    <form action="{{$updateStatus==true?url('townshipprocess',[$township->id]):url('/townshipprocess')}}" method="POST" class="form-control form">

        @if ($updateStatus==true)
            @method('PATCH')
        @endif
        @csrf
        <div class="container-fluid">
        <h3>Township Form</h3>
        <div class="form-group">
            <label for="">Township Name</label>
            <input type="text" name="name" class="form-control" id="" value="{{$updateStatus==true?$township->name:""}}">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <input type="text" name="description" class="form-control" id="" value="{{$updateStatus==true?$township->description:""}}">
        </div>
        <div class="form-group">
            <select name="city_id" id="" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <option selected disabled hidden>Select City Name</option>
                    @foreach ($city as $cityname )
                    <option {{$updateStatus==true?$township->city_id==$cityname->id?"selected":"":""}} value="{{$cityname->id}}">{{$cityname->name}}</option>
                    @endforeach
            </select>
            <input type="text" name="desc" class="form-control" id="" value="{{$updateStatus==true?$township->desc:""}}">
        </div>
        <button type="submit" class="btn btn-success">{{$updateStatus==true?"Update":"Save"}}</button>
    </div>
    </form>
@endsection