<!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="UTF-8">
    <meta name="viewport" contents="width-device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <title>Laravel 10 Custom User Registration & Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsAZYBKQhggwzxH7pPCAQD46MgQM88zW1RWH61DGLwZJEK2Kadq2F9CUG65" crossorigin="anonymous"> 
    <link rel="stylesheet" href="{{ asset('lightbox2/dist/css/lightbox.min.css') 
}}"> 
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f5f5f5;
    }

    .navbar {
        background-color: #6b6bff;
    }

    .navbar-brand {
        font-weight: bold;
        color: #ffffff;
    }

    .nav-link {
        color: #ffffff !important;
    }

    .nav-link.active {
        font-weight: bold;
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 400px;
        margin: 20px;
    }

    .card-header {
        text-align: center;
        background-color: #6b6bff;
        border-bottom: none;
        font-size: 1.5rem;
        font-weight: bold;
        color: #ffffff;
        border-radius: 10px 10px 0 0;
        padding: 15px;
    }

    .form-control {
        border: 1px solid #ced4da;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
    }

    .btn-primary {
        background-color: #6b6bff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 1rem;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #4d4dff;
    }

    .btn-primary:focus {
        box-shadow: 0 0 0 0.2rem rgba(107, 107, 255, 0.5);
    }

    .btn-link {
        color: #6b6bff;
        text-decoration: none;
        font-weight: bold;
    }

    .btn-link:hover {
        text-decoration: underline;
    }

    .table {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 20px;
    }

    .table th, .table td {
        border: none;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ URL('/') }}">Custom Login Registers</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">  
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                @guest
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('login')) ? 'active': ''}}" href="{{ route('login') }}">Login</a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('register')) ? 'active': '' }}" href="{{ route ('register') }}">Register</a>
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{Auth::user()->name}}
                            </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route ('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a> 

                                    <li class="nav-item">
                                        <a class="nav-link {{ (request()->is('gallery')) ? 'active' : '' }}" href="{{ 
                                            route('gallery.index') }}">Gallery</a>
                                        </li>

                                    <form id="Logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                        </ul>
                    </div>
                </div>
            </nav>

        <div class="container">
            @yield('content')
        </div>
        <script src="{{ asset('lightbox2/dist/js/lightbox-plus-jquery.min.js') 
}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBI4zVF@@GIMS4hcpxy09F7jL+jjxkk+Q2h455rYXK/Auo31+014" crossorigine="anonymous"></script>
    </body>
</html>

