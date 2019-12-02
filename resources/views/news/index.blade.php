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
            <tbody>
              @foreach($articles as $key =>$article)
              <div class="col-md-4 mb-4 ">
                    <div class="card h-100">
              <tr>
                <!-- <th scope="row">{{ $key + 1 }}</th> -->
                <td><h3>{{ $article->title }}</h3></td>
                <td>{{ $article->source->name }}</td>,
                <td>{{ $article->author }}</td>,
                <td>{{ Carbon\Carbon::parse($article->publishedAt)->toFormattedDateString()}}</td>
                <td><img src="{{$article->urlToImage}}" alt="" class="img-fluid" alt="" height="1000px" width="1000px"/>{{ $article->content }}</td>
                <td><a href="{{$article->url}}" target="_blank"><small>BACA SELENGKAPNYA...</small></a></td>
                
              </tr>
              </div>
              </div>
              
              @endforeach
            </tbody>
          </table>
        
        <!-- batas -->
            </div>
        </div>
        
    </div>
</div>
@endsection
