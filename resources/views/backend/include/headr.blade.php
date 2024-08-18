    <!doctype html>
    <html lang="en">

    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">
    <!-- Fonts CSS -->
    <link
        href="{{asset('backend/
https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap
')}}"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('backend/css/feather.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/select2.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/uppy.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/jquery.steps.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/quill.snow.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{asset('backend/css/daterangepicker.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('backend/css/app-light.css')}}" id="lightTheme">
    <link rel="stylesheet" href="{{asset('backend/css/app-dark.css')}}" id="darkTheme" disabled>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

    <script src=" https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
        <style>
            .label-info {
                background-color: blue;
                padding: 1px;
                border-radius: 4px;

            }
            
        </style>
    </head>

    <body class="vertical  light  ">
    <div class="wrapper">
        <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
            <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <form class="form-inline mr-auto searchform text-muted">
            <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search"
            placeholder="Type something..." aria-label="Search">
        </form>
        <ul class="nav">
            <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                <i class="fe fe-sun fe-16"></i>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
                <span class="fe fe-grid fe-16"></span>
            </a>
            </li>
            <li class="nav-item nav-notif">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
                <span class="fe fe-bell fe-16"></span>
                <span class="dot dot-md bg-success"></span>
            </a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="avatar avatar-sm mt-2">
                <img src="{{asset('backend/./assets/avatars/face-1.jpg')}}" alt="..." class="avatar-img rounded-circle">
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ route('user.logout') }}">Log Out</a>
            </div>
            </li>
        </ul>
    </nav>
