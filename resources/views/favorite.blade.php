@extends('welcome')
@section('title')
    Favorite
@endsection
@section('content')
    <div class="spacefromhead"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="card rounded-5">
                    <div class="card-header">
                        <h5>Your Favorite</h5>
                    </div>
                    <div class="card-body">
                        @if (Auth::user()->favorite->count())
                            @foreach ($favorites as $fav)
                                <div class="whislist-item row">
                                    <div class="col-md-3">
                                        <div class="foto-barang-whistlist">
                                            <img src="{{asset('storage/'.$fav->lapangan->gambar)}}" alt=""
                                                 width="100px">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <h5>{{$fav->lapangan->nama_lapangan}}</h5>
                                        <small>{{$fav->lapangan->jenis->jenis}}</small>
                                        <br>
                                        <strong>Rp. {{number_format($fav->lapangan->harga)}}</strong>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="btn-group">

{{--                                            {{route('shop',['id'=> $wishlist->camera->id])}}--}}
                                            <a class="btn btn-outline-success" href="{{route('gambar',['id'=> $fav->lapangan->id])}}" ><span class="fas fa-shopping-cart"></span></a>
                                            <form action="{{route('favorite.destroy',['id'=>$fav->id])}}" method="POST" onsubmit="return confirm('Unfavorite your Lapangan?')">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-outline-danger" type="submit"><span class="fas fa-trash-alt"></span></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
