@extends('layouts.global')

@section('title') Menambahkan Lapangan @endsection

@section('content')
    <h1>Tambahkan Lapangan</h1>
    <br>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <div class="row">
        <div class="col-md-8">
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <form action="{{route('lapangans.store')}}" method="POST" enctype="multipart/form-data"
                  class="shadow-sm p-3 bg-white">

                @csrf

                <label for="nama_lapangan">Nama Lapangan</label> <br>
                <input type="text" class="form-control" name="nama_lapangan" placeholder="Nama Lapangan">
                <br>

                <div class="form-group">
                    <label for="">Kategori Lapangan</label>
                    <select name="kategori_id" id="kategoris" class="form-control">
                        <option selected>Choose...</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Jenis Lapangan</label>
                    <select name="jenis_id" id="jenis" class="form-control">
                        <option selected>Choose...</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="waktus">Waktu Sewa</label>
                    <select name="waktus[]" multiple id="waktus" class="custom-select">
                    </select>
                </div>

                <label for="gambar">Gambar</label>
                <input type="file" class="form-control" name="gambar">
                <br>

                <label for="harga">Harga</label> <br>
                <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga Lapangan per Jam">
                <br>


                <input
                    type="submit"
                    class="btn btn-primary"
                    value="Save"/>
            </form>
        </div>
    </div>
@endsection
@section('footer-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $('#waktus').select2({
            ajax: {
                url: '{{ route('ajax.search') }}',
                processResults: function (data) {
                    return {
                        results: data.map(function (item) {
                            console.log(item);
                            return {
                                id: item.id, text: item.waktu
                            }

                        })
                    }
                }
            }
        });
    </script>
    <script>
        $('#jenis').select2({
            ajax: {
                url: '{{ route('ajax.search-jenis') }}',
                processResults: function (data) {
                    return {
                        results: data.map(function (item) {
                            console.log(item);
                            return {
                                id: item.id, text: item.jenis
                            }

                        })
                    }
                }
            }
        });
    </script>
    <script>
        $('#kategoris').select2({
            ajax: {
                url: '{{ route('ajax.search-kategori') }}',
                processResults: function (data) {
                    return {
                        results: data.map(function (item) {
                            console.log(item);
                            return {
                                id: item.id, text: item.kategori
                            }

                        })
                    }
                }
            }
        });
    </script>
@endsection
