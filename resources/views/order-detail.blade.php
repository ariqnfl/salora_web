@extends('welcome')
@section('title')Salora | Order History @endsection
@section('content')
    <div class="spacefromhead"></div>
    <div class="container">
        <h1>Your Orders</h1>
        <hr>
        <!--Order Item-->
        <div class="row shadow p-2 m-3">
            @if(Auth::user()->orders->count())
                @foreach($orders as $item)
                    @foreach($item->lapangan as $data)
                        <div class="col-md-2 text-center border">
                            <img class="w-75" src="{{asset('storage/'.$data->gambar)}}" alt="">
                        </div>
                        <div class="col-md-5 border">
                            <ul class="list-group ">
                                <li class="border-0 list-group-item"><strong>{{$data->nama_lapangan}}</strong></li>
                                <li class="border-0 list-group-item">{{$item->tanggal_pesan}}</li>
                                <li class="border-0 list-group-item"><strong>{{$item->waktu_pesan}}</strong> |
                                    Rp. {{number_format($data->harga)}}</li>
                            </ul>
                        </div>
                        <div class="col-md-5 border">
                            <ul class="list-group ">
                                <li class="border-0 list-group-item"><strong>Status</strong></li>
                                @if($item->status == "cancel")
                                    <li class="border-0 list-group-item list-group-item-danger">Permainan Dibatalkan</li>
                                @elseif($item->status == "process")
                                    <li class="border-0 list-group-item list-group-item-primary">Segera Transfer
                                    </li>
                                    <a href="{{route('edit-user',['id'=> $item->id])}}" class="btn btn-success">Upload Bukti Transfer</a>
                                @else
                                    <li class="border-0 list-group-item list-group-item-success">Selamat Bermain</li>
                                @endif
                            </ul>
                        </div>
                    @endforeach
                @endforeach
            @endif

        </div>
    </div>
@endsection
