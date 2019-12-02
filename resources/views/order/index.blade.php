@extends('layouts.global')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Orders</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form action="{{route('order.index')}}">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Filter by Order id"
                                   value="{{Request::get('id')}}" name="id">
                            <div class="input-group-append">
                                <input type="submit" value="Filter" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if(session('status'))
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-warning">
                            {{session('status')}}
                        </div>
                    </div>
                </div>
            @endif
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th><b>Nama Pelanggan</b></th>
                            <th><b>Total Harga</b></th>
                            <th><b>Bukti Transfer</b></th>
                            <th><b>Waktu Pesan</b></th>
                            <th><b>Tanggal Pesan</b></th>
                            <th><b>Status</b></th>
                            <th><b>Action</b></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->total_harga}}</td>
                                <td>
                                    @if($order->bukti)
                                        <img src="{{asset('storage/' . $order->bukti)}}" width="96px"/>
                                    @endif
                                </td>
                                <td>{{$order->waktu_pesan}}</td>
                                <td>{{$order->tanggal_pesan}}</td>
                                <td>
                                    @if($order->status == "cancel")
                                        <span class="badge badge-danger badge-pill">
                                            {{$order->status}}
                                        </span>
                                    @elseif($order->status == "process")
                                        <span class="badge badge-primary badge-pill">
                                            {{$order->status}}
                                        </span>
                                    @else
                                        <span class="badge badge-success badge-pill">
                                            {{$order->status}}
                                        </span>
                                    @endif
                                </td>
                                <td>
{{--                                    <a href="{{route('order.edit',['id'=> $order->id])}}"--}}
{{--                                       class="btn btn-info btn-sm">Edit</a>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="10">
                                {{$orders->appends(Request::all())->links()}}
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
