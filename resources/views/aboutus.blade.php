@extends('welcome')
@section('title')Salora | About Us @endsection
@section('content')
    <div class="spacefromhead"></div>
    <div class="container">
        <h1>
            About Us
        </h1>
        <hr>
        <div class="row mt-5">
            <div class="col-md-12">
               <center><h3> SALORA</h3></center>
                <p>Aplikasi SALORA hadir untuk mempermudah pengguna dalam pemesanan lapangan olahraga. Dengan pemesanan lapangan olahraga berbasis web, dapat mempercepat pengguna dalam memesan lapangan olahraga yang diinginkan tanpa perlu membuang waktu untuk menghampiri tempat GOR yang ingin dipesan. Dan pada Salora juga terdapat panel news yang berisi berita tentang olahraga.</p>
            </div>
            <div class="col-md-4">
                <img class="img-thumbnail w-100" src="{{asset('image/store.jpg')}}" alt="">
            </div>
            <div class="col-md-2">
                <img class="w-100" src="{{asset('image/')}}" alt="">
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-4 mb-4 ">
                    <div class="card h-70 text-center">
                        <img class="card-img-top" src="{{asset('image/lap/ariq.jpg')}}" alt="" height="200px" width="150x">
                        <div class="card-body">
                            <h4 class="card-title">Muhammad Ariq Naufal</h4>
                            <h6 class="card-subtitle mb-2 text-muted">Back-End Dev</h6>
                            <p class="card-text">S1 Sistem Informasi - Telkom University</p>
                        </div>
                        <div class="card-footer">
                            <a href="https://mail.google.com/">nflariq17@gmail.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 ">
                <div class="card h-70 text-center">
                        <img class="card-img-top" src="{{asset('image/lap/haidar.png')}}" alt="" height="200px" width="150x">
                        <div class="card-body">
                            <h4 class="card-title">Haidar Alvinanda Sulistyo</h4>
                            <h6 class="card-subtitle mb-2 text-muted">Front-End Dev</h6>
                            <p class="card-text">S1 Sistem Informasi - Telkom University</p>
                        </div>
                        <div class="card-footer">
                            <a href="https://mail.google.com/">Haidaralvin@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-4 mb-4 ">
                    <div class="card h-70 text-center">
                        <img class="card-img-top" src="{{asset('image/lap/ferry.jpg')}}" alt="" height="200px" width="150x">
                        <div class="card-body">
                            <h4 class="card-title">Ferryansa</h4>
                            <h6 class="card-subtitle mb-2 text-muted">Front-End Dev</h6>
                            <p class="card-text">S1 Sistem Informasi - Telkom University</p>
                        </div>
                        <div class="card-footer">
                            <a href="https://mail.google.com/">Ferryansya@gmail.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 ">
                    <div class="card h-70 text-center">
                        <img class="card-img-top" src="{{asset('image/lap/ocha.jpg')}}" alt="" height="200px" width="150x">
                        <div class="card-body">
                            <h4 class="card-title">Rosalia Endri Sintia</h4>
                            <h6 class="card-subtitle mb-2 text-muted">Back-End Dev</h6>
                            <p class="card-text">S1 Sistem Informasi - Telkom University</p>
                        </div>
                        <div class="card-footer">
                            <a href="https://mail.google.com/">rosaliaens@gmail.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 ">
                    <div class="card h-70 text-center">
                        <img class="card-img-top" src="{{asset('image/lap/kesya.jpg')}}" alt="" height="200px" width="150x">
                        <div class="card-body">
                            <h4 class="card-title">Kesya Asih Zarinisa</h4>
                            <h6 class="card-subtitle mb-2 text-muted">Back-End Dev</h6>
                            <p class="card-text">S1 Sistem Informasi - Telkom University</p>
                        </div>
                        <div class="card-footer">
                            <a href="https://mail.google.com/">kesyaaz@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
