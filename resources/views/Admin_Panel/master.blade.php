<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    {{-- link with css/js --}}
    {{-- css link --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    {{-- script js link --}}
    <script type="text/javascript" src="{{asset('js/app.js')}}" defer></script>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    @yield('scripts')
    <script type="text/javascript" src="{{asset('js/style.js')}}"></script>
   


    <title>Admin Panel</title>
</head>

<body>
        <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="header">
                <a href="#default" class="logo">CompanyLogo</a>
                <div class="header-right">
                  <a class="active" href="#home">Home</a>
                  <a href="#contact">Contact</a>
                  <a href="#about">About</a>
                </div>
              </div>
        </div>
    </div>
</div>
        <!-- start side bar-->
        <div class="page-wrapper chiller-theme toggled">
            <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
                <i class="fas fa-bars"></i>
              </a>

            <nav id="sidebar" class="sidebar-wrapper">
              <div class="sidebar-content">
                <div class="sidebar-brand">
                  <a href="#">CompanyLogo</a>
                  <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                  </div>
                </div>
                <div class="sidebar-menu">
                  <ul>
                    <li class="header-menu">
                      <span>General</span>
                    </li>
                    <li class="sidebar-dropdown">
                      <a href="#">
                        <i class="fa fa-tachometer-alt"></i>
                        <span>Branch</span>
                      </a>
                      <div class="sidebar-submenu">
                        <ul>
                          <li>
                            <a href="{{route('branchprocess.create')}}">Add Branch</a>
                          </li>
                          <li>
                            <a href="#">View Category</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="sidebar-dropdown">
                      <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Movies</span>
                      </a>
                      <div class="sidebar-submenu">
                        <ul>
                          <li>
                            <a href="#">Add Movies</a>
                          </li>
                          <li>
                            <a href="#">View Movies</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fas fa-book"></i>
                        <span>Sign Out</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <!-- sidebar-menu  -->
              </div>
            </nav>
            <!-- sidebar-wrapper  -->
            

            <main class="page-content">
              @yield('content')
            </main>
            <!-- page-content" -->
          </div>
      {{-- <button class="btn btn-primary">App</button> --}}
</body>
</html>