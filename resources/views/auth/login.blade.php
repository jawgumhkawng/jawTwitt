@extends('layout.layout')

@section('title', 'Login')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6">
                <form class="form mt-5" action="{{ route('login') }}" method="post">
                    @csrf
                    <h3 class="text-center text-dark">Login</h3>
                    @error('error')
                        <span class="fs-6 text-danger py-2">{{ $message }}</span>
                    @enderror
                    <div class="form-group mt-3">
                        <label for="email" class="text-dark">Email:</label><br>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                            required>
                        @error('email')
                            <span class="fs-6 text-danger py-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="password" class="text-dark">Password:</label><br>
                        <input type="password" name="password" id="password" class="form-control" required>
                        @error('password')
                            <span class="fs-6 text-danger py-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="remember-me" class="text-dark"></label><br>
                        <input type="submit" name="submit" class="btn btn-dark btn-md" value="submit">
                        <a href="/register" class="text-dark float-end fs-6 mt-2">Register here</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
