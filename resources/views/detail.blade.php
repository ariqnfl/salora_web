@extends('welcome')
@section('title')Salora | {{$lapangan->nama_lapangan}} @endsection
@section('content')
    <div class="spacefromhead"></div>
    <div class="container mt-5">
        <div id="item">
            <div class="row">
                <div class="col-6 image-item">
                    <h1>{{$lapangan->nama_lapangan}} </h1>
                    <img src="{{asset('storage/'.$lapangan->gambar)}}" alt="" class="img-thumbnail w-100">
                    <br>
                    <label for="">Jenis Lapangan</label>
                    <h5>{{$lapangan->jenis->jenis}}</h5>
                    <br>
                    <label for="">Kategori Lapangan</label>
                    <h5>{{$lapangan->kategori->kategori}}</h5>
                    <br>
                </div>
                <div class="col-6">
                    <br>
                    <label for="">Harga Lapangan / Jam</label>
                    <h5><strong>Rp. {{number_format($lapangan->harga)}}</strong></h5>
                    <br>
                    <form action="{{route('order.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Waktu Sewa Lapangan</label>
                            <select name="waktu_pesan" id="waktu" class="form-control">
                                @foreach($lapangan->waktus as $waktu)
                                    <option>{{$waktu->waktu}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <input type="hidden" value="{{$lapangan->harga}}" name="total_harga">
                        <input type="hidden" value="{{$lapangan->id}}" name="lapangan_id">
                        <label for="">Tanggal Sewa Lapangan</label>
                        <input id="datepicker" width="276" name="tanggal_pesan"/>
                        <br>
                        @if(Auth::check())
                            <input type="submit" class="btn btn-success" value="Beli Sekarang">
                            <a class="btn btn-danger"
                               href=""><span><i class="fas fa-heart">
                            </i></span></a>
                        @else
                            <input type="submit" class="btn btn-success" value="Beli Sekarang" onclick="login()">
                            <a class="btn btn-danger"
                               href="#" onclick="login()"><span><i class="fas fa-heart"></i></span></a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function login() {
            $('#loginModal').modal('show');
        };

        function habis() {
            swal("Gagal!", "Barang Sudah Habis!", "error");
        };

        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
@endpush
