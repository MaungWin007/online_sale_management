
<!DOCTYPE html>
<html>
<head>
    <title>Admin Register Form </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    {{-- <link rel="stylesheet" href="style.css"> --}}
    <link rel="stylesheet" href="{{asset('css/style1.css')}}">
</head>
<body> 
     <div class="wrapper">
         <div class="headline">
             <h1>Welcome Our Phoenix Fashion.</h1>
         </div>
         <form method="POST" action="{{url('/admin/save')}}" class="form">
            @csrf
                <input type="hidden" name="usertype" value="admin"/>
            <div class="signup">
                <div class="form-group">
                    <input type="text" placeholder="Full name" name="name" required="">
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="text" name="phoneno" placeholder="Phone No" required="">
                </div>
                <div class="form-group">
                    <input type="file" name="images" placeholder="Image" required="">
                </div>
                <div class="form-group">
                    <select class="form-select" name="branch_id" required >
                        <option selected disabled hidden>Select Branch</option>
                        @foreach ($branch as $branchlist)
                        <option value="{{$branchlist->id}}">{{$branchlist->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-select"  name="role_id" required >
                        <option selected disabled hidden>Select Role</option>
                        @foreach ($role as $rolelist)
                        <option value="{{$rolelist->id}}">{{$rolelist->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn">{{ __('Register') }}</button>
                <div class="account-exist">
                    Already have an account? <a href="{{url('Admin/login')}}" id="login">Login</a>
                </div>
            </div>
         </form>
     </div>

     <script type="text/javascript" src="{{asset('js/style1.js')}}" defer></script>
</body>
</html>