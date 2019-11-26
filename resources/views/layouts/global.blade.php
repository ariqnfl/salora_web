<!DOCTYPE html>
<!--[if IE 9]>
<html class="ie9 no-js" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Salora @yield("title")</title>
    <link rel="stylesheet" href="{{asset('polished/polished.min.css')}}">
    <link rel="stylesheet" href="{{asset('polished/iconic/css/open-iconic-bootstrap.min.css')}}">

    <style>
        .grid-highlight {
            padding-top: 1rem;
            padding-bottom: 1rem;
            background-color: #5c6ac4;
            border: 1px solid #202e78;
            color: #fff;
        }

        hr {
            margin: 6rem 0;
        }

        hr + .display-3,
        hr + .display-2 + .display-3 {
            margin-bottom: 2rem;
        }
    </style>
    <script type="text/javascript">
        document.documentElement.className = document.documentElement.className.replace('no-js', 'js') + (document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#BasicStructure", "1.1") ? ' svg' : ' no-svg');
    </script>
</head>

<body>

<nav class="navbar navbar-expand p-0">
    <a class="navbar-brand text-center col-xs-12 col-md-3 col-lg-2 mr-0" href="/panel"> Salora </a>
    <button class="btn btn-link d-block d-md-none" data-toggle="collapse" data-target="#sidebar-nav" role="button">
        <span class="oi oi-menu"></span>
    </button>

    <input class="border-dark bg-primary-darkest form-control d-none d-md-block w-50 ml-3 mr-2" type="text"
           placeholder="Search" aria-label="Search">
    <div class="dropdown d-none d-md-block">
        @if(\Auth::user())
            <button class="btn btn-link btn-link-primary dropdown-toggle" id="navbar-dropdown" data-toggle="dropdown">
                {{Auth::user()->name}}
            </button>
        @endif
        <div class="dropdown-menu dropdown-menu-right" id="navbar-dropdown">
            <a href="#" class="dropdown-item">Home</a>
            <div class="dropdown-divider"></div>
            <li>
                <form action="{{route("logout")}}" method="POST">
                    @csrf
                    <button class="dropdown-item" style="cursor:pointer">Sign Out</button>
                </form>
            </li>
        </div>
    </div>
</nav>

<div class="container-fluid h-100 p-0">
    <div style="min-height: 100%" class="flex-row d-flex align-items-stretch m-0">
        <div class="polished-sidebar bg-light col-12 col-md-3 col-lg-2 p-0 collapse d-md-inline" id="sidebar-nav">

            <ul class="polished-sidebar-menu ml-0 pt-4 p-0 d-md-block">
                <input class="border-dark form-control d-block d-md-none mb-4" type="text" placeholder="Search"
                       aria-label="Search"/>
                <li><a href="{{route('panel')}}"><span class="oi oi-home"></span> Home</a></li>
                @if(Auth::user()->role == "admin")
                    <li><a href="{{route('users.index')}}"><span class="oi oi-people"></span> User</a></li>
                @endif
                <li><a href="{{route('lapangans.index')}}"><span class="oi oi-document"></span> Lapangan</a></li>
                <li><a href="{{route('users.index')}}"><span class="oi oi-cart"></span> Order</a></li>

                <div class="d-block d-md-none">
                    <div class="dropdown-divider"></div>
                    <li><a href="#"> Profile</a></li>
                    <li><a href="#"> Setting</a></li>
                    <li>
                        <form action="{{route("logout")}}" method="POST">
                            @csrf
                            <button class="dropdown-item" style="cursor:pointer">Sign Out</button>
                        </form>
                    </li>
                </div>
            </ul>
        </div>
        <div class="col-lg-10 col-md-9 p-4">
            <div class="row ">
                <div class="col-md-12 pl-3 pt-2">
                    <div class="pl-3">
                        <h3>@yield("pageTitle")</h3>
                        <br/>
                    </div>
                </div>
            </div>

            @yield("content")

        </div>
    </div>
</div>

<script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/esm/popper-utils.min.js"
        integrity="sha256-1N0+7OfEs9pNPY5A9KGrCBvZMLgXF+t2m3AcNjn1pow=" crossorigin="anonymous">

</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

@yield('footer-script')
</body>
</html>
