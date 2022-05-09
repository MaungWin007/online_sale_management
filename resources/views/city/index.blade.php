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
    <title>City List</title>
</head>
<body>
    <div class="col-12">
        <form action="{{url('citysearch')}}">
        <div class="row">
            <div class="col-4">
                <input type="text" name="t1" class="form-control" placeholder="City Name">
            </div>
            <div class="col-4">
                <input type="submit" name="search" value="Search" class="btn btn-success">
            </div>
        </div>
    </form>
    </div>
    <h3>Branch List</h3>
    <table class="table table-dark table-striped">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Create_At</th>
            <th>Update_At</th>
            <th>Edit</th>
            <td>Delete</td>
        </tr>
    @foreach ($city as $citylist )
        <tr>
            <td>{{$citylist->name}}</td>
            <td>{{$citylist->description}}</td>
            <td>{{$citylist->status}}</td>
            <td>{{$citylist->created_at}}</td>
            <td>{{$citylist->updated_at}}</td>
            <td>
                <form action="{{url('cityprocess/'.$citylist->id.'/edit')}}">
                    <input type="submit" value="Edit" class="btn btn-outline-success">
                </form>
            </td>
            
            <td>
                <form action="{{url('cityprocess',[$citylist->id])}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE"/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" value="Delete" class="btn btn-outline-danger">
                </form>
            </td>
        </tr>
        
    @endforeach
    </table>
</body>
</html>