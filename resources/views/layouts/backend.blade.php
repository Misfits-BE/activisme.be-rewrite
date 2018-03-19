<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
        <title>{{ config('app.name') }} - @yield('page-title') </title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.0.0-18/collection/icon/icon.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/_all-skins.min.css') }}">

        <script src="https://use.fontawesome.com/b6d5ae3486.js"></script>

        {{-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --}}
        {{-- WARNING: Respond.js doesn't work if you view the page via file:// --}}
        
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-red sidebar-mini">
        <div class="wrapper">
            <header class="main-header"> {{-- Main Header --}}
                <a href="{{ url('home') }}" class="logo">               {{-- Logo --}}
                    <span class="logo-mini"><b>A</b>ct</span>           {{-- mini logo for sidebar mini 50x50 pixels --}}
                    <span class="logo-lg"><b>Activisme</b>BE</span>     {{-- logo for regular state and mobile devices --}}
                </a>

                <nav class="navbar navbar-static-top" role="navigation"> {{-- Header Navbar --}}
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"> {{-- Sidebar toggle button--}}
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu"> {{-- Navbar Right Menu --}}
                        <ul class="nav navbar-nav">
                            <li class="user user-menu"> {{-- User Account Menu --}}
                                <a href="#"> {{-- Menu Toggle Button --}}
                                    <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">  {{-- The user image in the navbar --}}
                                    <span class="hidden-xs">{{ $currentUser->name }}</span> {{-- hidden-xs hides the username on small devices so only the image appears. --}}
                                </a>
                            </li>
        
                            <li>
                                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="fa fa-fw fa-power-off"></i> Afmelden
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
  
            <aside class="main-sidebar">            {{-- Left side column. contains the logo and sidebar --}}
                <section class="sidebar">           {{-- sidebar: style can be found in sidebar.less --}}
                    <div class="user-panel">        {{-- Sidebar user panel (optional) --}}
                        <div class="pull-left image">
                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                            
                        <div class="pull-left info">
                            <p>{{ $currentUser->name }}</p>
                            <a href="#"> {{-- Status --}}
                                <i class="fa fa-circle text-success"></i> Online
                            </a>
                        </div>
                    </div>

                    <ul class="sidebar-menu" data-widget="tree"> {{-- Sidebar Menu --}}
                        <li class="header">MENU</li>
        
                        {{-- Optionally, you can add icons to the links --}}
                        <li class="">
                            <a href="{{ route('admin.categories.index') }}">
                                <i class="fa fa-fw fa-tags"></i> <span>Categorieen</span>
                            </a>
                        </li>

                        <li class="">
                            <a href="{{ route('admin.activities.index') }}">
                                <i class="fa fa-fw fa-list"></i> <span>Activiteits log</span>
                            </a>
                        </li>
                        
                    </ul> {{-- /.sidebar-menu --}}
                </section> {{-- /.sidebar --}}
            </aside>

            <div class="content-wrapper"> {{-- Content Wrapper. Contains page content --}}
                <section class="content-header"> {{-- Content Header (Page header) --}}
                    @yield('title')
                    @yield('breadcrumb')
                </section>

                <section class="content container-fluid"> {{-- Main content --}}
                    @yield('content')
                </section> {{-- /.content --}}
            </div> {{-- /.content-wrapper --}}

            <footer class="main-footer"> {{-- Main Footer --}}
                <div class="pull-right hidden-xs"> {{-- To the right --}}
                    <strong>Versie:</strong> 2.0.0
                </div>
    
                {{-- Default to the left --}}
                <strong>Copyright &copy; {{ date('Y')}} <a href="https://www.activisme.be">Activisme.be</a>.</strong> Alle rechten voorbehouden.
            </footer>
        </div> {{-- ./wrapper --}}

        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/adminlte.min.js') }}"></script>
        @stack('scripts') {{-- page specific JavaScript stack --}}
    </body>
</html>