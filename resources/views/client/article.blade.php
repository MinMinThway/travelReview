@extends('client.layout')
  @section('content')
       <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                  <div class="row">
                      @foreach ($articles as $article)
                        <div class="col-lg-6 col-md-6 col-sm-12 mt-3 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <img class="card-img-top img-fluid article-image" width="100%" style="height: 200px !important" src="{{ asset('image/'.$article->image) }}" alt="Image Error">
                                    <div class="date">
                                        <h3 class="day">{{ $article->created_at->format("d") }}</h3>
                                        <p class="month">{{ $article->created_at->format("M") }}</p>
                                        <p class="year">{{ $article->created_at->format("Y") }}</p>
                                    </div>
                                    <h3 class="description">{{ $article->name }}</h3>
                                    <p class="description">
                                      {{ substr($article->review, 0, 100) }}
                                    </p>
                                    <a href="{{ route('client.aricleDetail',$article->id) }}" class="card-link">Read More...</a>
                                </div>
                            </div>
                        </div>
                     @endforeach
                  </div>
                </div>
                <div class="col-lg-4 col-md-8 col-sm-12 ">
                    <div class="row sticky">
                        <input class="ml-3 pr-5 mr-2 mb-1" style="border: none" type="search" id="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success mb-1" onclick="search()" type="submit">Search</button>
                        <div class="col-12 " >
                            <div class="list-group" >
                                <a href="{{ route('client.articel') }}" class="list-group-item list-group-item-action  bg-secondary
                                text-white" >
                                  List Of Countries
                                </a>
                                @foreach ($categories as $category)
                                @if (empty($cat))
                                <a href="{{route('client.category', $category->name)}}"  class="list-group-item list-group-item-action">{{ $category->name }}</a>

                                @endif
                                @isset($cat)
                                    <a href="{{route('client.category', $category->name)}}"  class="list-group-item list-group-item-action {{ $category->id == $cat->id ? 'bg-success text-white' : ''}} ">{{ $category->name }}</a>

                                    @endisset

                                @endforeach
                              </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
@endsection;
@section("pagination")
<div class="row pagination">
    <div class="col-12">
        <ul class="list-unstyled">
            {!! $articles->links() !!}
        </ul>
    </div>
</div>
@endsection
@section("js")
<script>
    function search(){
        let search_key = document.querySelector("#search").value;
        location.href = "{{url('search/')}}"+ "/"+search_key;
    }

</script>
@endsection
