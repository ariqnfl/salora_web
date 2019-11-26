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
                <div class="form-group">
                    <label for="nama_lapangan">Nama Lapangan</label>
                    <input type="text" class="form-control" name="nama_lapangan" placeholder="Nama Lapangan">
                </div>
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

                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02" name="gambar">
                        <label class="custom-file-label" for="inputGroupFile02"
                               aria-describedby="inputGroupFileAddon02">Choose file</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="harga">Harga Lapangan</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="number" name="harga" class="form-control" placeholder="Harga Lapangan per Jam">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                </div>


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
        $('#inputGroupFile02').on('change', function (e) {
            var fileName = e.target.files[0].name;
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
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
