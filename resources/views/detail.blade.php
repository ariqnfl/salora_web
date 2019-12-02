@extends('welcome')
@section('title')Salora | {{$lapangan->nama_lapangan}} @endsection
@section('content')
    <div class="spacefromhead"></div>
    <div class="container mt-5">
        <div id="item">
            <div class="row">
                <div class="col-6 image-item">
                    <img src="{{asset('storage/'.$lapangan->gambar)}}" alt="" class="img-thumbnail w-100">
                </div>
                <div class="col-6">
                    <h1>{{$lapangan->nama_lapangan}} </h1>
                    <br>
                    <label for="">Jenis Lapangan</label>
                    <h5>{{$lapangan->jenis->jenis}}</h5>
                    <br>
                    <label for="">Kategori Lapangan</label>
                    <h5>{{$lapangan->kategori->kategori}}</h5>
                    <br>
                    <label for="">Harga Lapangan</label>
                    <h5><strong>Rp. {{number_format($lapangan->harga)}}</strong></h5>
                    <br>
                    <div class="form-group">
                        <label for="">Waktu Lapangan</label>
                        <select name="waktu" id="waktu" class="form-control">
                            @foreach($lapangan->waktus as $waktu)
                                <option>{{$waktu->waktu}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    @if(Auth::check())
                        <a class=" btn btn-success" href="">Beli Sekarang</a>
                        <a class="btn btn-danger"
                           href=""><span><i class="fas fa-heart">
                            </i></span></a>
                    @else
                        <a class="btn btn-success" href="#" onclick="login()">Beli Sekarang</a>
                        <a class="btn btn-danger"
                           href="#" onclick="login()"><span><i class="fas fa-heart"></i></span></a>
                    @endif
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
        }
    </script>
@endpush
