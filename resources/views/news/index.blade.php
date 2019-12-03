@extends('welcome')
@section('title')Salora | About Us @endsection
@section('content')
    <div class="spacefromhead"></div>
    <div class="container">

        <!-- batas -->
        <div class="row justify-content-md-center">

            <!-- <thead>
              <tr>

                <th scope="col">No</th>
                <th scope="col">Judul Berita</th>
                <th scope="col">Sumber</th>
                <th scope="col">Penulis</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Isi Berita</th>
                <th scope="col">Link</th>


              </tr>
            </thead> -->

{{--            <tbod--}}
              @foreach($articles as $key =>$article)
                  <div class="card mb-3" style="max-width: 540px;">
                      <div class="row no-gutters">
                          <div class="card" style="width: 50rem;">
                              <img src="{{$article->urlToImage}}" class="card-img-top" alt="...">
                              <div class="card-body">
                                  <h5 class="card-title">{{ $article->title }}</h5>
                                  <p class="card-text">{{ $article->content }}</p>
                                  <a href="{{$article->url}}" class="btn btn-primary">Read More</a>
                              </div>
                          </div>
{{--                          <div class="col-md-4">--}}
{{--                              <img src="{{$article->urlToImage}}" class="card-img" alt="...">--}}
{{--                          </div>--}}
{{--                          <div class="col-md-8">--}}
{{--                              <div class="card-body">--}}
{{--                                  <h5 class="card-title">{{ $article->title }}</h5>--}}
{{--                                  <p class="card-text">{{ $article->content }}</p>--}}
{{--                                  <a href="{{$article->url}}" class="btn btn-success">Read More</a>--}}
{{--                              </div>--}}
{{--                          </div>--}}
                      </div>
                  </div>
{{--              <tr>--}}
{{--                <!-- <th scope="row">{{ $key + 1 }}</th> -->--}}
{{--                <td><h3>{{ $article->title }}</h3></td>--}}
{{--                <td>{{ $article->source->name }}</td>,--}}
{{--                <td>{{ $article->author }}</td>,--}}
{{--                <td>{{ Carbon\Carbon::parse($article->publishedAt)->toFormattedDateString()}}</td>--}}
{{--                <td><img src="{{$article->urlToImage}}" alt="" class="img-fluid" alt="" height="1000px" width="1000px"/>{{ $article->content }}</td>--}}
{{--                <td><a href="{{$article->url}}" target="_blank"><small>BACA SELENGKAPNYA...</small></a></td>--}}

{{--              </tr>--}}

              @endforeach


        <!-- batas -->
            </div>
        </div>

    </div>
</div>
@endsection
