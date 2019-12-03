@extends('welcome')
@section('title')CamCam | Catalog
@endsection
@section('tambah-script')
    $("#filter-item-brand").hide();
    $("#filter-item-cat").hide();

    $("#filter-brand").click(function () {
    $("#filter-item-brand").slideToggle("slow");
    });
@endsection
@section('content')
    <div class="spacefromhead"></div>
    <div class="container mt-5">
        <div class="filter mb-5">
            <button type="button" class="btn btn-outline-success btn-block btn-sm" data-toggle="modal"
                    data-target="#myModal">
                Filter
            </button>
            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Filter</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div id="filter-brand" class="card-header">Jenis</div>
                                <div class="card-body" id="filter-item-brand">
                                    <div class="filter-shopbybrand">
                                        <ul class="nav flex-column">
                                            @foreach($jenis as $jns)
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                       href="{{route('lapangan',['jenis'=> $jns->id])}}">{{$jns->jenis}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div id="filter-cat" class="card-header">Kategori</div>
                                <div class="card-body" id="filter-item-cat">
                                    <div class="filter-shopbybrand">
                                        <ul class="nav flex-column">
                                            @foreach($kategoris as $category)
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                       href="{{route('lapangan',['kategori'=> $category->id])}}">{{$category->kategori}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="item" class="row">
                @foreach($lapangan as $item)
                    <div class="card m-1" style="width: 23%">
                        <a class="item-link" href="#">
                            <div class="product-card-body card-body">
                                <h5 class="card-title truncate">{{$item->nama_lapangan}}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{$item->kategori->kategori}}</h6>
                                <h6 class="card-subtitle mb-2 text-muted">{{$item->jenis->jenis}}</h6>
                                <a href="{{route('gambar',['id'=> $item->id])}}">
                                    <img class="card-img" src="{{asset('storage/'.$item->gambar)}}" alt="">
                                </a>
                                <h5 class="card-title">Rp. {{number_format($item->harga)}}</h5>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('script-bawah')
    <script>
        $(document).ready(function () {
            $("#filter-cat").click(function () {
                $("#filter-item-cat").slideToggle("slow");
            });
        });
    </script>
@endsection
