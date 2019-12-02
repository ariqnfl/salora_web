@extends('welcome')
@section('title')Salora | Transaksi Sukses @endsection
@section('content')
    <div class="spacefromhead"></div>
    <div class="container">
        <h1>
            Transaksi Anda
        </h1>
        <hr>
        <div class="row mt-5">
            <div class="col-md-12">
                <center><h3> Pilih Salah Satu Metode Pembayaran </h3></center>
            </div>
            <div class="col-md-4">
                <img class="img-thumbnail w-100" src="{{asset('image/store.jpg')}}" alt="">
            </div>
            <div class="col-md-2">
                <img class="w-100" src="{{asset('image/')}}" alt="">
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-4 mb-4 ">
                <div class="card h-100 text-center">
                    <img class="card-img-top" src="{{asset('image/lap/bni.png')}}" alt="" height="100px" width="100x">
                    <div class="card-body">
                        <h4 class="card-title">BNI</h4>
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1"
                               role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Tata Cara
                                Pembayaran </a>
                        </p>
                        <div class="row">
                            <div class="col">
                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                    <div class="card card-body">
                                        <p>1. Pilih <b>Transfer</b> > <b>Virtual Account Billing</b></p>
                                        <p>2. Pilih <b>Rekening Debet</b> > Masukkan nomor Virtual Account
                                            156-00-11382209 pada menu <b>Input Baru</b></p>
                                        <p>3. Tagihan yang hrus dibayar akan muncul pada layar konfirmasi</p>
                                        <p>4. Periksa informasi yang tertera di layar. Pastikan <b>Merchant</b> adalah
                                            <b>SALORA, Total Harga</b> sudah benar, lalu klik <b>Lanjut</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4 ">
                <div class="card h-100 text-center">
                    <img class="card-img-top" src="{{asset('image/lap/alfa.png')}}" alt="" height="100px" width="100x">
                    <div class="card-body">
                        <h4 class="card-title">Merchant Alfamart</h4>
                        <button class="btn btn-primary" type="button" data-toggle="collapse"
                                data-target="#multiCollapseExample2" aria-expanded="false"
                                aria-controls="multiCollapseExample2">Tata Cara Pembayaran
                        </button>
                        <p>
                            <div class="row">
                                <div class="col">
                                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                                        <div class="card card-body">
                        <p>1. Pilih <b>Transfer</b> > <b>Virtual Account Billing</b></p>
                        <p>2. Pilih <b>Rekening Debet</b> > Masukkan nomor Virtual Account 156-00-11382209 pada menu <b>Input
                                Baru</b></p>
                        <p>3. Tagihan yang hrus dibayar akan muncul pada layar konfirmasi</p>
                        <p>4. Periksa informasi yang tertera di layar. Pastikan <b>Merchant</b> adalah <b>SALORA, Total
                                Harga</b> sudah benar, lalu klik <b>Lanjut</b></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    <div class="col-lg-4 mb-4 ">
        <div class="card h-100 text-center">
            <img class="card-img-top" src="{{asset('image/lap/gopay.png')}}" alt="" height="100px" width="100x">
            <div class="card-body">
                <h4 class="card-title">Gopay</h4>
                <button class="btn btn-primary" type="button" data-toggle="collapse"
                        data-target="#multiCollapseExample3" aria-expanded="false"
                        aria-controls="multiCollapseExample2">Tata Cara Pembayaran
                </button>
                <p>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapseExample3">
                                <div class="card card-body">
                <p>1. Pilih <b>Transfer</b> > <b>Virtual Account Billing</b></p>
                <p>2. Pilih <b>Rekening Debet</b> > Masukkan nomor Virtual Account 156-00-11382209 pada menu <b>Input
                        Baru</b></p>
                <p>3. Tagihan yang hrus dibayar akan muncul pada layar konfirmasi</p>
                <p>4. Periksa informasi yang tertera di layar. Pastikan <b>Merchant</b> adalah <b>SALORA, Total
                        Harga</b> sudah benar, lalu klik <b>Lanjut</b></p>
            </div>
        </div>
    </div>                        </div>
    </div>
    </div>

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
