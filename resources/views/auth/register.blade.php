@extends('layouts.app')

@section('content')
<header id="register-header" class="header-image text-white d-none d-md-block">
    <div class="header-overlay">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="display-1">Join our Community</h1>
                    <p>Bergabunglah dengan salah satu blog
                         komunitas terbaik di Indonesia</p>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-8">
            <h1>Form Pendaftaran</h1>
            <hr>
            <form  method="POST" action="{{route('register')}}" enctype="multipart/form-data">
                @method('POST')
                @include('layouts.form',['tombol'=>'Daftar'])
            </form>
        </div>
    </div>
</div>
@endsection
