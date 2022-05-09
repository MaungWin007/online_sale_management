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
    <title>city</title>
</head>
<?php 

    $updateStatus=false;
    if(isset($city))
    {
        $updateStatus=true;
    }
?>
<body>
    
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

</body>
</html>