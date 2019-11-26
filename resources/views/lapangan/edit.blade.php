@extends('layouts.global')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <div class="card">
        <div class="card-header">
            Edit {{$lapangan->nama_lapangan}}
        </div>
        <div class="card-body">
            @if(session('status'))
            @endif
            <form enctype="multipart/form-data" method="POST" action="{{route('lapangans.update',[$lapangan->id])}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_lapangan">Nama Lapangan</label>
                    <input type="text" class="form-control" value="{{$lapangan->nama_lapangan}}" name="nama_lapangan"
                           placeholder="Nama Lapangan">
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar Lapangan</label>
                    <div class="form-group">
                        <small class="text-muted">Current Photo</small>
                    </div>
                    <div class="form-group">
                        @if($lapangan->gambar)
                            <img src="{{asset('storage/' . $lapangan->gambar)}}" width="96px">
                        @endif
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile02" name="gambar">
                            <label class="custom-file-label" for="inputGroupFile02"
                                   aria-describedby="inputGroupFileAddon02">Choose file</label>
                        </div>
                    </div>
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah cover</small>
                </div>
                <div class="form-group">
                    <label for="waktus">Waktu Lapangan</label>
                    <select class="form-control" name="waktus[]" id="waktus" multiple></select>
                </div>
                <div class="form-group">
                    <label for="kategoris">Kategori Lapangan</label>
                    <select class="form-control" name="kategori_id" id="kategoris">
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis Lapangan</label>
                    <select class="form-control" name="jenis_id" id="jenis">
                    </select>
                </div>
                <div class="form-group">
                    <label for="harga">Harga Lapangan</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="number" name="harga" class="form-control" value="{{$lapangan->harga}}">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                </div>
                <input
                    type="submit"
                    class="btn btn-primary"
                    value="Update"/>
            </form>
        </div>
    </div>
@endsection
@section('footer-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        function n() {
            swal("Success!", "{{session('status')}}", "success");
        }

    </script>
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
        var waktus = {!! $lapangan->waktus !!}
        waktus.forEach(function (waktu) {
            var option = new Option(waktu.waktu, waktu.id, true, true);
            $('#waktus').append(option).trigger('change');
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
        var kategori ={!! $lapangan->kategori !!}
        if (kategori) {
            var option = new Option(kategori.kategori, kategori.id, true, true);
            $('#kategoris').append(option).trigger('change');
        }
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
        var jenis = {!! $lapangan->jenis !!}
        if(jenis){
            var option = new Option(jenis.jenis, jenis.id, true, true);
            $('#jenis').append(option).trigger('change');
        }
    </script>
@endsection
