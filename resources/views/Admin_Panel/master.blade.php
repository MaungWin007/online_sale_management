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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
                <a href="#default" class="logo">Phoenix</a>
                <div class="header-right">
                  <a  href="#home">Home</a>
                  <a href="#contact">Contact</a>
                  <a href="#about">About</a>
                </div>
              </div>
        </div>
    </div>
</div>
        <!-- start side bar-->
        <div class="page-wrapper chiller-theme toggled">
          <a id="show-sidebar" class="btn btn-sm bg-dark text-white" href="#">
              <i class="fas fa-bars"></i>
            </a>

          <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
              <div class="sidebar-brand">
                <a href="#">Phoenix</a>
                <div id="close-sidebar">
                  <i class="fas fa-times"></i>
                </div>
              </div>
              <div class="sidebar-menu">
                <ul>
                  <li class="header-menu">
                    <span>MANAGEMENT OF E-COMMERCE</span>
                  </li>
                  <li class="sidebar-dropdown">
                    <a href="#">
                      <i class="fa-solid fa-shop"></i>
                      <span>Branch</span>
                    </a>
                    <div class="sidebar-submenu">
                      <ul>
                        <li>
                          <a href="{{route('branchprocess.create')}}">Add Branch</a>
                        </li>
                        <li>
                          <a href="{{route('branchprocess.index')}}">View Branch</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="sidebar-dropdown">
                    <a href="#">
                      <i class="fa fa-shopping-cart"></i>
                      <span>Items</span>
                    </a>
                    <div class="sidebar-submenu">
                      <ul>
                        <li>
                          <a href="{{route('itemprocess.create')}}">Add Items</a>
                        </li>
                        <li>
                          <a href="{{route('itemprocess.index')}}">View Items</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="sidebar-dropdown">
                    <a href="#">
                      <i class="fa-solid fa-sitemap"></i>
                      <span>Branch-Items</span>
                    </a>
                    <div class="sidebar-submenu">
                      <ul>
                        <li>
                          <a href="{{route('branchitemprocess.create')}}">Add BranchItem</a>
                        </li>
                        <li>
                          <a href="{{route('branchitemprocess.index')}}">View BranchItems</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="sidebar-dropdown">
                    <a href="#">
                      <i class="fa-brands fa-salesforce"></i>
                      <span>Sales</span>
                    </a>
                    <div class="sidebar-submenu">
                      <ul>
                        <li>
                          <a href="{{route('saleprocess.create')}}">Add Sales</a>
                        </li>
                        <li>
                          <a href="{{route('saleprocess.index')}}">View Sales</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="sidebar-dropdown">
                    <a href="#">
                      <i class="fa-solid fa-code-branch"></i>
                      <span>Categories</span>
                    </a>
                    <div class="sidebar-submenu">
                      <ul>
                        <li>
                          <a href="{{route('categoryprocess.create')}}">Add Categories</a>
                        </li>
                        <li>
                          <a href="{{route('categoryprocess.index')}}">View Categories</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="sidebar-dropdown">
                    <a href="#">
                      <i  class="fa fa-users" aria-hidden="true"></i>
                      <span>Roles</span>
                    </a>
                    <div class="sidebar-submenu">
                      <ul>
                        <li>
                          <a href="{{route('roleprocess.create')}}">Add Roles</a>
                        </li>
                        <li>
                          <a href="{{route('roleprocess.index')}}">View Roles</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="sidebar-dropdown">
                    <a href="#">
                      <i class="fa fa-paint-brush" aria-hidden="true"></i>
                      <span>Color</span>
                    </a>
                    <div class="sidebar-submenu">
                      <ul>
                        <li>
                          <a href="{{route('colorprocess.create')}}">Add Color</a>
                        </li>
                        <li>
                          <a href="{{route('colorprocess.index')}}">View Color</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="sidebar-dropdown">
                    <a href="#">
                      <i class="fa-solid fa-ruler-combined"></i>
                      <span>Size</span>
                    </a>
                    <div class="sidebar-submenu">
                      <ul>
                        <li>
                          <a href="{{route('sizeprocess.create')}}">Add Size</a>
                        </li>
                        <li>
                          <a href="{{route('sizeprocess.index')}}">View Size</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="sidebar-dropdown">
                    <a href="#">
                      <i class="fa-solid fa-city"></i>
                      <span>Cities</span>
                    </a>
                    <div class="sidebar-submenu">
                      <ul>
                        <li>
                          <a href="{{route('cityprocess.create')}}">Add Cities</a>
                        </li>
                        <li>
                          <a href="{{route('cityprocess.index')}}">View Cities</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="sidebar-dropdown">
                    <a href="#">
                      <i class="fa-solid fa-building"></i>
                      <span>Township</span>
                    </a>
                    <div class="sidebar-submenu">
                      <ul>
                        <li>
                          <a href="{{route('townshipprocess.create')}}">Add Township</a>
                        </li>
                        <li>
                          <a href="{{route('townshipprocess.index')}}">View Township</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <hr>
                  <li>
                    @auth
                    <form action="{{route('logout')}}" method="POST">
                      @csrf
                      
                      <button>
                        <i class="fas fa-book"></i>
                        <span>Sign Out</span>
                      </button>
                    </form>
                    @else
                        No Permission to acces
                        @endauth
                    
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