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
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    {{-- script js link --}}
    <script type="text/javascript" src="{{asset('js/app.js')}}" defer></script>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/style.js')}}"></script>
   


    <title>Admin Panel</title>
</head>
@extends('branch.create')
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
                            <a href="#">Add Branch</a>
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
              <div class="container-fluid">
                <h2>Pro Sidebar</h2>
                <hr>
                <div class="row">
                  <div class="form-group col-md-12">
                    <p>This is a responsive sidebar template with dropdown menu based on bootstrap 4 framework.</p>
                    <p> You can find the complete code on <a href="https://github.com/azouaoui-med/pro-sidebar-template" target="_blank">
                        Github</a>, it contains more themes and background image option</p>
                  </div>
                  <div class="form-group col-md-12">
                    <iframe src="https://ghbtns.com/github-btn.html?user=azouaoui-med&repo=pro-sidebar-template&type=star&count=true&size=large"
                      frameborder="0" scrolling="0" width="140px" height="30px"></iframe>
                    <iframe src="https://ghbtns.com/github-btn.html?user=azouaoui-med&repo=pro-sidebar-template&type=fork&count=true&size=large"
                      frameborder="0" scrolling="0" width="140px" height="30px"></iframe>
                  </div>
                </div>
                <h5>More templates</h5>
                <hr>
                  <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">          
                    <div class="card rounded-0 p-0 shadow-sm">
                      <img src="https://user-images.githubusercontent.com/25878302/58369568-a49b2480-7efc-11e9-9ca9-2be44afacda1.png" class="card-img-top rounded-0" alt="Angular pro sidebar">
                      <div class="card-body text-center">
                          <h6 class="card-title">Angular Pro Sidebar</h6>
                          <a href="https://github.com/azouaoui-med/angular-pro-sidebar" target="_blank" class="btn btn-primary btn-sm">Github</a>
                          <a href="https://azouaoui-med.github.io/angular-pro-sidebar/demo/" target="_blank" class="btn btn-success btn-sm">Preview</a>
                      </div>
                    </div>          
                  </div>
                          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">          
                    <div class="card rounded-0 p-0 shadow-sm">
                      <img src="https://user-images.githubusercontent.com/25878302/58369258-33f20900-7ef8-11e9-8ff3-b277cb7ed7b4.PNG" class="card-img-top rounded-0" alt="Angular pro sidebar">
                      <div class="card-body text-center">
                          <h6 class="card-title">Angular Dashboard</h6>
                          <a href="https://github.com/azouaoui-med/lightning-admin-angular" target="_blank" class="btn btn-primary btn-sm">Github</a>
                          <a href="https://azouaoui-med.github.io/lightning-admin-angular/demo/" target="_blank" class="btn btn-success btn-sm">Preview</a>
                      </div>
                    </div>          
                  </div>
                </div>
              </div>
          
            </main>
            <!-- page-content" -->
          </div>
      <button class="btn btn-primary">App</button>
</body>
</html>