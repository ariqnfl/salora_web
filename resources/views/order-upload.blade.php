@extends('welcome')
@section('title')Salora | Order History @endsection
@section('content')
    <div class="spacefromhead"></div>
    <div class="container">
        <h1>Your Orders</h1>
        <hr>
        @foreach($order->lapangan as $item)
            <div class="form-group">
                <h3>{{$item->nama_lapangan}}</h3>
            </div>
            <div class="form-group">
                <img src="{{asset('storage/'.$item->gambar)}}" alt="" class="img-thumbnail w-25">
            </div>
        @endforeach
        <div class="form-group">
            <label for="">Waktu Sewa</label>
            <h3>{{$order->waktu_pesan}}</h3>
        </div>

        <div class="form-group">
            <label for="">Tanggal Sewa</label>
            <h3>{{$order->tanggal_pesan}}</h3>
        </div>

        <form enctype="multipart/form-data" method="POST" action="{{route('update-user',[$order->id])}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="bukti">Upload Bukti Transfer</label>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02" name="bukti">
                        <label class="custom-file-label" for="inputGroupFile02"
                               aria-describedby="inputGroupFileAddon02">Choose Picture</label>
                    </div>
                </div>
            </div>
            <input
                type="submit"
                class="btn btn-success"
                value="Upload"/>
        </form>
        <!--Order Upload-->


    </div>
@endsection
