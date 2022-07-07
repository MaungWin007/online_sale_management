
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
                        <form method="POST" action="{{ url('/admin/loginprocess') }}">
                            @csrf
                            
                            <div class="form-group">
                                <input type="email" placeholder="Email" name="email" required="">
                            </div>
    
                            <div class="form-group">
                                <input type="password" placeholder="Password" name="password" required="">
                            </div>
                            <div class="forget-password">
                                <div class="check-box">
                                    <input type="checkbox" id="checkbox">
                                    <label for="checkbox">Remember me</label>
                                </div>
                                <a href="#">Forget password?</a>
                            </div>
                            <button type="submit" class="btn">LOGIN</button>
                            <div class="account-exist">
                                Create New a account? <a href="{{url('admin/register')}}" id="signup">Signup</a>
                            </div>
                           
                            
    
                         
                        </form>
                    
                    </div>
    
            
{{-- <script type="text/javascript" src="{{asset('js/style1.js')}}" defer></script> --}}
</body>
</html>