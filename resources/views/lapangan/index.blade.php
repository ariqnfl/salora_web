@extends('layouts.global')

@section('title') List Lapangan @endsection

@section('content')
    <h1>Lapangan</h1>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="row mb-3">
                <div class="col-md-12 text-right">
                    <a
                        href="{{route('lapangans.create')}}"
                        class="btn btn-primary"
                    >Tambahkan Lapangan</a>
                </div>
            </div>
            <table class="table table-bordered table-stripped">
                <thead>
                <tr>
                    <th><b>Nama Lapangan</b></th>
                    <th><b>Gambar</b></th>
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
                        <td>{{$lapangan->nama_lapangan}}</td>
                        <td>
                            @if($lapangan->gambar)
                                <img src="{{asset('storage/' . $lapangan->gambar)}}" width="96px"/>
                            @endif
                        </td>
                        <td>{{$lapangan->jenis->jenis}}</td>
                        <td>
                            {{$lapangan->kategori->kategori}}
                        </td>
                        <td>
                            <ul class="pl-3">
                                @foreach($lapangan->waktus as $waktu)
                                    <a href="#" class="badge badge-success">{{$waktu->waktu}}</a>
                                @endforeach
                            </ul>
                        </td>
                        <td>Rp.{{$lapangan->harga}}</td>
                        <td>
                            <form action="{{ route('lapangans.destroy',$lapangan->id) }}" method="POST">
                                <a
                                    href="{{route('lapangans.edit', [$lapangan->id])}}"
                                    class="btn btn-info btn-sm"> Edit </a>
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
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
