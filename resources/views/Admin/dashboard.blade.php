<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @auth
        
   
    <h1>Dashboard</h1>
    Welcome Back {{Auth()->user()->name}}
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
        <input type="submit" name="btn" value="Log Out">
    </form>
    @else
    No Permission to acces
    @endauth
</body>
</html>