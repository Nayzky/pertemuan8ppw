@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form action="{{ route('authenticate') }}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email Address</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email')) 
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @if ($errors->has('password')) 
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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

@endsection



