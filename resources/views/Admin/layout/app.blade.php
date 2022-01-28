<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{$mySettings->name}} || CMS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href=" https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('admin/plugins/daterangepicker/daterangepicker.css')}}">
 
 
  @yield('my_css')

  <!-- ck editor -->
  <!-- <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script> -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>

   

    <ul class="navbar-nav ml-auto">
     
      <li class="nav-item dropdown">
       
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
      </li>
     
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('getAdminHome') }}" class="brand-link">
      <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ Auth::user()->name }} </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    

     

      <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          
            <li class="nav-item">
                <a href="{{ route('getAdminHome') }}" class="nav-link">
                <i class="fas fa-newspaper nav-icon"></i>
                <p>
                    News
                
                
                </p>
                </a>
            
            </li>
         
            <li class="nav-item">
                <a href="{{route('getAdminAuthor')}}" class="nav-link">
                  <i class="fas fa-at nav-icon"></i>
                  <p>
                      Authors
                  
                  
                  </p>
                </a>
            
            </li>

            <li class="nav-item">
                <a href="{{ route('getAdminCategory') }}" class="nav-link">
                <i class="fas fa-hashtag nav-icon"></i>
                <p>
                    Categories
                
                
                </p>
                </a>
            
            </li>
            <li class="nav-item">
                <a href="{{route('getComments')}}" class="nav-link">
                <i class="fas fa-comments nav-icon"></i>
                <p>
                    Comments
                
                
                </p>
                </a>
            
            </li>
            <li class="nav-item">
                <a href="{{ route('getAdminSubs') }}" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                <p>
                    Subscribers
                
                
                </p>
                </a>
            
            </li>
            <li class="nav-item">
                <a href="{{route('getAdmin')}}" class="nav-link">
                <i class="fas fa-users-cog nav-icon"></i>
                <p>
                    Admins
                
                
                </p>
                </a>
            
            </li>
            <li class="nav-item">
                <a href="{{route('getAdminSetting')}}" class="nav-link">
                <i class="fas fa-cogs nav-icon"></i>
                <p>
                    Settings
                
                
                </p>
                </a>
            
            </li>
        </ul>
    </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   @yield('content')
  
  </div>
 

  
</div>

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- daterangepicker -->
<script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<!-- overlayScrollbars -->
<script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js')}}"></script>


@yield('my_js')



</body>
</html>
