<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Comeca</title>

    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Notification elements -->
        @unless(auth()->user()->unreadNotifications->isEmpty())
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fas fa-comments fa-2x"></i>
                    <span class="badge badge-danger navbar-badge">{{ auth()->user()->unreadNotifications->count() }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="width: max-content;">
                    @foreach(auth()->user()->unreadNotifications as $notification)
                    <a href="{{ route('contact.messages.read', ['notification' => $notification->id]) }}" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <div class="media-body">
                                <p class="text-sm">{{ $notification->data['messageTitle'] }}</p>
                                <p class="text-sm text-muted"><i class="fas fa-clock mr-1"></i> {{ \Carbon\Carbon::parse($notification->data['messageDate'])->diffForHumans() }}</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    @endforeach
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
        @else
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fas fa-comments fa-2x"></i>
                    <span class="badge badge-danger navbar-badge">0</span>
                </a>
            </li>
        </ul>
        @endunless
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link">
            <img src="./img/comeca.png" alt="Comeca Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Comeca</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ Auth::user()->profile->avatar }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <router-link to="/dashboard" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </router-link>
                    </li>
                    @can('isAdmin')
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cogs text-primary"></i>
                            <p>
                                Gerer
                                <i class="right fas fa-angle-left text-primary"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/users" class="nav-link">
                                    <i class="fas fa-users-cog nav-icon text-success"></i>
                                    <p>Utilisateurs</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/category" class="nav-link">
                                    <i class="fas fa-cog nav-icon"></i>
                                    <p>Categories</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/tag" class="nav-link">
                                    <i class="fas fa-tags nav-icon"></i>
                                    <p>Tags</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/discount" class="nav-link">
                                    <i class="fas fa-percentage nav-icon"></i>
                                    <p>Coupons</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/products" class="nav-link">
                                    <i class="far fa-circle-o nav-icon"></i>
                                    <p>Produits</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/messages-list" class="nav-link">
                                    <i class="fas fa-comment-dots nav-icon"></i>
                                    <p>Messages</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    @endcan
                    @can('isProducer')
                    <li class="nav-item">
                        <router-link to="/products" class="nav-link">
                            <i class="far fa-circle-o nav-icon"></i>
                            <p>Produits</p>
                        </router-link>
                    </li>    
                    @endcan
                    <li class="nav-item">
                        <router-link to="/orders" class="nav-link">
                            <i class="nav-icon fas fa-shopping-basket"></i>
                            <p>
                                Commandes
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/messages" class="nav-link">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p>
                                Chat
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/message" class="nav-link">
                            <i class="nav-icon fas fa-inbox"></i>
                            <p>
                                Inbox
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/profile" class="nav-link">
                            <i class="nav-icon fas fa-user-alt"></i>
                            <p>
                                Profile
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-power-off"></i>
                            <p>
                                Deconnexion
                            </p>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <router-view></router-view>
                <vue-progress-bar></vue-progress-bar>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2020 <a href="">Comeca</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

@auth
    <script>
        window.user = @json(auth()->user());
    </script>
@endauth

@routes
<script src="/js/app.js"></script>
</body>
</html>
