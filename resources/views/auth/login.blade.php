@extends('layouts.app')

@section('content')
<header id="login-header" class="header-image text-white d-none d-md-block">
    <div class="header-overlay">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="display-1">Login</h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Alias ipsa autem deleniti corrupti. Et labore nihil optio qui
                        repellat, quos minus modi,magni doloremque laboriosam magnam
                        illo officia? Recusandae, nesciunt!
                    </p>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <h1 class="text-center">Login</h1>
            <hr>
            <form method="POST" action="{{route('login')}}">
                @csrf
                {{-- Input email --}}
                <div class="mb-3 row">
                    <label for="email" class="col-md-5 col-form-label text-md-end">
                        Email
                    </label>
                    <div class="col-md-5">
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{old('email')}}"required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$massage}}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- Input Password --}}
                <div class="mb-3 row">
                    <label for="password" class="col-md-5 col-form-lable text-md-end">
                        Password
                    </label>
                    <div class="col-md-5">
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" value="{{old('password')}}"required autocomplete="password" autofocus>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$massage}}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row col-md-5 offset-md-5 ">
                    <div class="form-check ms-2">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : ''}}">

                        <label class="form-check-label" for="remember">{{ __('Remember Me')}}</label>

                    </div>
                </div>

                <div class="form group row mb-o">
                    <div class="col-md-8 offset-md-5">
                        <button class="btn btn-primary">
                            {{__('Login')}}
                        </button>
                        @if (Route::has('password.request'))
                            <a href="{{route('password.request')}}" class="btn btn-link text-decoration-none">
                                {{__('Forget Your Password?')}}
                            </a>
                            @endIf
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
