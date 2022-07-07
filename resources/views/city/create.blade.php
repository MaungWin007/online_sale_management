@extends('Admin_Panel.master')
<?php 

    $updateStatus=false;
    if(isset($city))
    {
        $updateStatus=true;
    }
?>
@section('content')
    
    <form action="{{$updateStatus==true?url('cityprocess',[$city->id]):url('/cityprocess')}}" method="POST" class="form-control form">

        @if ($updateStatus==true)
            @method('PATCH')
        @endif
        @csrf
        <div class="container-fluid">
        <h3>City Form</h3>
        <div class="form-group">
            <label for="">City Name</label>
            <input type="text" name="name" class="form-control" id="" value="{{$updateStatus==true?$city->name:""}}">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <input type="text" name="description" class="form-control" id="" value="{{$updateStatus==true?$city->description:""}}">
        </div>
        
        <button type="submit" class="btn btn-success">{{$updateStatus==true?"Update":"Save"}}</button>
    </div>
    </form>

@endsection