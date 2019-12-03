<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="icon" href="{{asset('image/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('fonts/fontawesome-free-5.5.0-web/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/fontawesome-free-5.5.0-web/js/all.js')}}">
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/sweetalert/dist/sweetalert.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script>
        $(document).ready(function () {
            @yield('tambah-script')
            $(".card").hover(
                function () {
                    $(this).addClass('shadow').css('cursor', 'pointer');
                }, function () {
                    $(this).removeClass('shadow');
                }
            );
        });
    </script>
</head>

<body>
<header>
    <!-- top -->
    <div class="topbar navbar fixed-top">
        <!--Logo-->
        <div class="logo px-2 d-flex">
            <a href="/">
                <img src="{{asset('image/Salora.png')}}" width="150" alt="salora">
            </a>
        </div>
        <!--Navbar-->
        <div class="d-flex">
            <nav class="navbar navbar-expand-sm bg-white">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link text-success" href="/"><strong>HOME</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success" href="{{route('lapangan')}}"><strong>LAPANGAN</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success" href="/news"><strong>BERITA</strong></a>
                    </li>
                    @if (Auth::user())
                        <li class="nav-item">
                            <a class="nav-link text-success" href="{{route('favorite.index')}}"><strong>FAVORITE </strong><span><i
                                        class="fas fa-heart"></i></span></a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link text-success" href="/about"><strong>ABOUT US</strong></a>
                    </li>
                </ul>
            </nav>
        </div>
        <!--Search-->
        <div class="d-flex">
            <form class="input-group" action="">
                <span class="input-group-prepend">
                </span>
                <input class="form-control" value="{{Request::get('name')}}" type="text" name="name"
                       placeholder="Search on Salora ..">
                <button class="btn btn-success" type="submit">Cari</button>
            </form>
            {{--<form class="input-group" action="{{route('hasil')}}">--}}
            {{--<input class="form-control" value="{{Request::get('name')}}" name="name" type="text"--}}
            {{--placeholder="Search on Salora...">--}}
            {{--<button type="submit" class="btn btn-danger btn-danger"></button>--}}
            {{--</form>--}}
        </div>
        <!--Navbar Login & Signup-->
        <div class="d-flex">

            <nav class="navbar navbar-expand-sm ">
                @guest
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Masuk &nbsp|
                                &nbsp
                                Daftar</a>
                        </li>


                    </ul>
                @else
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" v-pre style="color: #008f45">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->role == "admin")
                                    <a class="dropdown-item" href="{{route('panel')}}">Admin Panel</a>
                                @elseif (Auth::user()->role == "mitra")
                                    <a class="dropdown-item" href="{{route('panel')}}">Mitra Panel</a>
                                @endif
                                <a href="{{route('showOrder')}}" class="dropdown-item">Order Details</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                @endguest
            </nav>
        </div>
    </div>
</header>
<div class="modal fade" id="loginModal">
    <div class="modal-dialog">
        <div class="modal-content rounded-1">
            <div class="card" id="login-form">
                <div class="card-body">
                    <div class="login-logo">
                        <img class="mx-auto d-block" src="{{asset('image/Salora.png')}}" width="250px">
                    </div>
                    <div class="login-form">
                        <form action="{{route('login')}}"
                              method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="text"
                                       class="form-control form-control-lg rounded-1 {{ $errors->has('username') ? ' is-invalid' : '' }}"
                                       name="email"
                                       id="username" value="{{old('username')}}"
                                       required autofocus>
                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password"
                                       class="form-control form-control-lg rounded-1 {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       id="password"
                                       name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="btn-group-vertical w-100">
                                <button type="submit" class="btn btn-outline-primary btn-lg w-100" name="btnLogin"
                                        id="btnLogin">Login
                                </button>
                                <br>
                                <a href="{{url('/auth/twitter')}}" class="btn btn-info btn-sm w-100">Masuk dengan
                                    Twitter <i class="fa fa-twitter" style="font-size:26px"></i></a>
                                <a href="{{url('/auth/github')}}" class="btn btn-dark btn-sm w-100"> Masuk dengan
                                    Github <i class="fa fa-github" style="font-size:26px"></i> </a>
                                <a href="{{url('/auth/google')}}" class="btn btn-danger btn-sm w-100"> Masuk dengan
                                    Google <i class="fa fa-google" style="font-size:26px"></i></a>
                                <br>
                                <a href="#" id="btn-dont-have" class="btn btn-outline-primary btn-sm w-100">Belum
                                    Punya Akun ?</a>
                                <br>
                                <center><h6><strong>Jadi mitra kami, daftarkan lapanganmu, dapatkan keuntunganya
                                            ! </strong></h6></center>
                                <a href="#" id="btn-mitra" class="btn btn-outline-danger btn-sm w-100">Daftar Mitra</a>
                            </div>
                        </form>
                    </div>
                    <div class="regist-form">`
                        <form class="form" action="{{route('register')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"
                                       class="form-control form-control-lg rounded-1{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       name="name" id="name"
                                       required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email"
                                       class="form-control form-control-lg rounded-1{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email"
                                       id="email"
                                       required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password"
                                       class="form-control form-control-lg rounded-1 {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       id="password"
                                       name="password"
                                       required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password verification</label>
                                <input type="password" class="form-control form-control-lg rounded-1"
                                       id="password_confirmation"
                                       name="password_confirmation" required>

                            </div>
                            <div class="btn-group-vertical w-100">
                                <input type="hidden" name="role" id="role" value="user">
                                <button type="submit" class="btn btn-outline-primary btn-lg w-100" name="btn-regist"
                                        id="btn-regist">Daftar
                                </button>
                                <br>
                                <a href="#" id="btn-have" class="btn btn-outline-success btn-sm w-100">Sudah Punya Akun
                                    ?</a>
                                <br>
                            </div>
                        </form>
                    </div>
                    <!-- batasnya -->
                    <div class="regist-mitra">
                        <form class="form" action="{{route('register')}}" method="POST">
                            <br>
                            <a href="#" id="btn-close-mitra" class="btn btn-outline-secondary btn-sm w-100">Tutup
                                Form</a>
                            <br>
                            @csrf

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"
                                       class="form-control form-control-lg rounded-1{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       name="name" id="name"
                                       required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email"
                                       class="form-control form-control-lg rounded-1{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email"
                                       id="email"
                                       required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password"
                                       class="form-control form-control-lg rounded-1 {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       id="password"
                                       name="password"
                                       required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password verification</label>
                                <input type="password" class="form-control form-control-lg rounded-1"
                                       id="password_confirmation"
                                       name="password_confirmation" required>

                            </div>

                            <div class="btn-group-vertical w-100">
                                <input type="hidden" name="role" id="role" value="mitra">
                                <button type="submit" class="btn btn-outline-primary btn-lg w-100" name="btn-regist"
                                        id="btn-regist">Daftar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@yield('content')
{{--<footer class="footer font-small pt-4" style="background-color: #F0F8FF">--}}
{{--<div class="container text-center text-md-left">--}}
{{--<div class="row">--}}
{{--<div class="col-md-4">--}}
{{--<h3>Links</h3>--}}
{{--<hr>--}}
{{--<div class="list-group">--}}
{{--<a href="/" class="list-group-item list-group-item-action">Home</a>--}}
{{--<a href="{{route('catalog')}}" class="list-group-item list-group-item-action">Catalog</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-md-2"></div>--}}
{{--<div class="isi-footer col-md-6 mt-md-0 mt-3 text-right">--}}
{{--<h5 class="text-uppercase"><img src="{{asset('image/Salora.png')}}" alt="" style="width: 50px;"> Salora.--}}
{{--</h5>--}}
{{--<p>Here our website that made with much of our love. <i class="fas fa-heart"></i></p>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="footer-copyright text-center py-3">© 2019 Copyright:--}}
{{--<a href="#"> Salora</a>--}}
{{--</div>--}}
{{--</footer>--}}
<footer class="site-footer text-white mt-5 " id="footer">
    <div class="container pt-3 pb-3 pt-md-5 pb-md-5">
        <div class="row mb-2">
            <div class="col-md-6 mr-auto">
                <h2 class="brand-budayaku brand-lg"><img src="{{asset('image/output-onlinepngtools.png')}}" alt=""
                                                         style="width: 200px">
                </h2>
            </div>
            <div class="col-md-3">
                <h3 class="heading-footer">Learn More</h3>
                <li class="learn-more"><a href="{{route('login')}}">Masuk</a></li>
                <li class="learn-more"><a href="#">Syarat dan Ketentuan</a></li>
                <li class="learn-more"><a href="#">Kebijakan Privasi</a></li>
            </div>
            <div class="col-md-3">
                <h3 class="heading-footer">Stay Connect!</h3>
                <div class="sosmed-button mb-3 mt-3">
                    <a href="#"><span class="social-footer fab fa fa-facebook"></span></a>
                    <a href="#"><span class="social-footer fab fa fa-twitter"></span></a>
                    <a href="#"><span class="social-footer fab fa fa-instagram"></span></a>
                    <a href="#"><span class="social-footer fab fa fa-twitch"></span></a>
                </div>
            </div>
        </div>
    </div>
</footer>
@yield('script-bawah')
@stack('js')
<script src="{{asset('js/myjs.js')}}"></script>
<script>
    function login() {
        $('#loginModal').modal('show');
    };
</script>
</body>
</html>
