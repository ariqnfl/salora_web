@extends('layouts.global')

@section('title') Books list @endsection

@section('content')
    <h1>Lapangan</h1>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-stripped">
                <thead>
                <tr>
                    <th><b>Gambar</b></th>
                    <th><b>Nama Lapangan</b></th>
                    <th><b>Jenis Lapangan</b></th>
                    <th><b>Kategori Lapangan</b></th>
                    <th><b>Waktu Sewa</b></th>
                    <th><b>Harga</b></th>
                    <th><b>Action</b></th>
                </tr>
                </thead>
                <tbody>
                @foreach($lapangans as $lapangan)
                    <tr>
                        <td>
                            @if($lapangan->gambar)
                                <img src="{{asset('storage/' . $lapangan->gambar)}}" width="96px"/>
                            @endif
                        </td>
                        <td>{{$lapangan->nama_lapangan}}</td>
                        <td>{{$lapangan->jenis->jenis}}</td>
                        <td>
                            {{$lapangan->kategori->kategori}}
                        </td>
                        <td>
                            <ul class="pl-3">
                                @foreach($lapangan->waktus as $waktu)
                                    <li>{{$waktu->waktu}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{$lapangan->harga}}</td>
                        <td>
                            [TODO: actions]
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="10">
                        {{$lapangans->appends(Request::all())->links()}}
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
