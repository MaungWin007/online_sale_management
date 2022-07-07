@extends('Admin_Panel.master')
<?php 

    $updateStatus=false;
    if(isset($role))
    {
        $updateStatus=true;
    }
?>

@section('content') 
    <form action="{{$updateStatus==true?url('roleprocess',[$role->id]):url('/roleprocess')}}" method="POST" class="form-control form">

        @if ($updateStatus==true)
            @method('PATCH')
        @endif
        @csrf
        <div class="container-fluid">
        <h3>Role Form</h3>
        <div class="form-group">
            <label for="">Role Name</label>
            <input type="text" name="name" class="form-control" id="" value="{{$updateStatus==true?$role->name:""}}">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <input type="text" name="description" class="form-control" id="" value="{{$updateStatus==true?$role->description:""}}">
        </div>
        
        <button type="submit" class="btn btn-success">{{$updateStatus==true?"Update":"Save"}}</button>
    </div>
    </form>
@endsection
