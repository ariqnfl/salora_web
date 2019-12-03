@extends('welcome')
@section('title')Salora | Home @endsection
@section('content')
    <!--container-->
    <div class="spacefromhead"></div>
    <div class="container mt-5">
        <!--Shop By Categories-->
        <div class="shopby">

            <h1 class="text-success text-center">Choose your Favorite Sports</h1>
            <br>
            <div class="row">
                <a class="shopbyitem col-sm-6" href="/lapangan?kategori=4">
                    <img class="padding-top-sm" style="width:50%;padding-left: 0px; padding-right: 0px;" alt="DSLR"
                         src="{{asset('image/tennis.png')}}">
                    <div class="tagshopby">
                        <h5>Badminton</h5>
                    </div>
                </a>
                <a class="shopbyitem col-sm-6" href="/lapangan?kategori=3">
                    <img class="padding-top-sm" style="width:50%;padding-left: 0px; padding-right: 0px;" alt="DSLR"
                         src="{{asset('image/sepakbola.png')}}">
                    <div class="tagshopby">
                        <h5>Sepak Bola</h5>
                    </div>
                </a>
            </div>
            <div class="row">
                <a class="shopbyitem col-sm-6" href="/lapangan?kategori=2">
                    <img class="padding-top-sm" style="width:50%;padding-left: 0px; padding-right: 0px;" alt="DSLR"
                         src="{{asset('image/basket.png')}}">
                    <div class="tagshopby">
                        <h5>Basket</h5>
                    </div>
                </a>
                <a class="shopbyitem col-sm-6" href="/lapangan?kategori=1">
                    <img class="padding-top-sm" style="width:50%;padding-left: 0px; padding-right: 0px;" alt="DSLR"
                         src="{{asset('image/futsal.png')}}">
                    <div class="tagshopby">
                        <h5>Futsal</h5>
                    </div>
                </a>
            </div>
        </div>
{{--        <!--Lihat kategori lapangan-->--}}
{{--        <div class="feat-product-text">--}}
{{--            <h4>Featured Lapangan</h4>--}}
{{--        </div>--}}
{{--        <div id="item" class="row">--}}
{{--            @foreach($lapangan as $item)--}}
{{--                <div class="card m-1" style="width: 23%" >--}}
{{--                    <a class="item-link">--}}
{{--                        <div class="product-card-body card-body">--}}
{{--                            <h5 class="card-title truncate">{{$item->nama_lapangan}}</h5>--}}
{{--                            <a href="{{route('gambar',['id'=> $item->id])}}">--}}
{{--                                <img class="card-img" src="{{asset('storage/'.$item->gambar)}}" alt="">--}}
{{--                            </a>--}}
{{--                            <h5 class="card-title">Rp. {{number_format($item->harga)}}</h5>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
    </div>
@endsection
