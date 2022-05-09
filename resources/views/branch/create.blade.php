<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- link with css/js --}}
    {{-- css link --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    {{-- script js link --}}
    <script type="text/javascript" src="{{asset('js/app.js')}}" defer></script>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/style.js')}}"></script>
    <title>Branch</title>
</head>
<?php 

    $updateStatus=false;
    if(isset($branch))
    {
        $updateStatus=true;
    }
?>
<body>
    
    <form action="{{$updateStatus==true?url('branchprocess',[$branch->id]):url('/branchprocess')}}" method="POST" class="form-control form">

        @if ($updateStatus==true)
            @method('PATCH')
        @endif
        @csrf
        <div class="container-fluid">
        <h3>Branch Form</h3>
        <div class="form-group">
            <label for="">Branch Name</label>
            <input type="text" name="name" class="form-control" id="" value="{{$updateStatus==true?$branch->name:""}}">
        </div>
        <div class="form-group">
            <label for="">Branch Address</label>
            <input type="text" name="address" class="form-control" id="" value="{{$updateStatus==true?$branch->address:""}}">
        </div>
        <div class="form-group">
            <label for="">Branch Contact No</label>
            <input type="text" name="contact" class="form-control" id="" value="{{$updateStatus==true?$branch->contact:""}}">
        </div>
        <div class="form-group">
            <label for="">Branch Email</label>
            <input type="email" name="email" class="form-control" id="" value="{{$updateStatus==true?$branch->email:""}}">
        </div>
        <div class="form-group">
            <label for="">Branch StoreMap</label>
            <input type="text" name="storemap" class="form-control" id="" value="{{$updateStatus==true?$branch->storemap:""}}">
        </div>
        <div class="form-group">
            <label for="">Branch Image</label>
            <input type="text" name="image" class="form-control" id="" value="{{$updateStatus==true?$branch->image:""}}">
        </div>
        <button type="submit" class="btn btn-success">{{$updateStatus==true?"Update":"Save"}}</button>
    </div>
    </form>

</body>
</html>