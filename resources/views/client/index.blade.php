@extends('client.layout')
   <!-- body section -->
  @section('content')
       <div class="container section-container">
           @foreach ($articles as $article)
            <div class="row mt-2 mb-3">
                <div class="col-lg-7 col-md-12 col-sm-12">
                   <img src="{{ asset('image/'.$article->image) }}" alt="Image" class="img-fluid image">
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>{{ $article->name }}</h3>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ substr($article->review, 0, 400) }}
                                <a href="{{ route('client.aricleDetail', $article->id) }}">Read more...</a>
                            </p>
                            <div class="row">
                                <div class="col-5">
                                    <i class="fab fa-2x fa-facebook-square pl-2"></i>
                                    <i class="fab fa-2x fa-twitter-square"></i>
                                    <i class="fab fa-2x fa-instagram-square"></i>
                                </div>
                                <div class="col-7">
                                    <span style="padding-left: auto;">11/13/2019 | {{ $article->read_time }} min read</span>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            @endforeach
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
