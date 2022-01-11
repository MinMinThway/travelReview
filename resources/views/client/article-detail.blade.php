@extends("client.layout")
@section("meta")
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section("content")
       <div class="container">
            <div class="row">
                <div class="offset-2 col-8 ">
                    <img src="{{ asset('image/'.$article->image) }}" width="100%" height="400" alt="">
                    <h3 class="mt-3">{{ $article->name }}</h3>
                    <p>
                       {{ substr($article->review, 0, 500) }}
                    </p>
                    <p>
                        {{ substr($article->review, 501,900 ) }}
                     </p>
                      <p>
                        {{ substr($article->review, 901, 1300) }}
                     </p>
                     <p>
                        {{ substr($article->review, 1301, 1500) }}
                     </p>
                     <p>
                        {{ substr($article->review, 1501, 1900) }}
                     </p>
                     <p>
                        {{ substr($article->review,1901,2200) }}
                     </p>
                     <p>
                        {{ substr($article->review, 2201) }}
                     </p>
                     <input type="hidden" name="user_id" class="user_id" value="{{ Auth::user()->id }}">
                     <input type="hidden" name="article_id" class="article_id" id="" value="{{ $article->id }}">
                    <div class="mb-5">
                        <button class="btn  like"  onclick="like()" value="1"><i class="far fa-2x fa-hand-spock"></i>
                            <span id="like" ></span>
                        </button>

                        <div class="card mt-4">
                            <h5 class="card-header">Comments <span class="comment-count float-right badge badge-info"></span></h5>
                            <div class="card-body">
                                {{-- Add Comment --}}
                                <div class="add-comment mb-3">
                                    @csrf
                                    <textarea class="form-control comment" name="comment" placeholder="Enter Comment"></textarea>
                                    <button data-post="{{ $article->id }}" onclick="insert()" class="btn btn-dark btn-sm mt-2 save-comment">Submit</button>
                                </div>
                                <hr/>
                                {{-- List Start --}}
                                <div class="comments">
                                    <h3 id="author"></h3>
                                    <p id="comments">

                                    </p>
                                    <p class="no-comments">No Comments Yet</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
 <!-- body section -->
@endsection
@section("js")
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        getAll();
        showLike();

        function getAll(){
              $.ajax({
                type : "get",
                url :`{{ route('comment.index', $article->id) }}`,
                dataType : "json",
                data : {comment : $(".comment").val()},
                success : function(data){
                   if(data.success){
                    $("#comments").html('');

                    data.data.forEach(function(val){
                        data.user.forEach(function(e){
                            var date = new Date(val.created_at);
                            if(e.id == val.user_id){
                               var appendData = `

                                <i class="fas fa-user-tie"><h6 class='d-inline-block ml-3'><i>${e.name}</i></h6></i>
                               <span style="font-size : 10px;">${date.toISOString().split('T')[0]}</span>
                               <div class='mt-1 mb-3'>${val.comments}</div>

                                <hr>
                               `
                               $("#comments").append(appendData);
                            }

                        })

                    })
                    $(".comment-count").html(data.data.length);
                    if(data.data.length != 0){
                        $(".no-comments").addClass("d-none")
                    }
                    $(".save-comment").removeClass("disabled");
                   }
                }
            });
        }

        function showLike(){
            $.ajax({
                type : 'get',
                url : `{{ route('showLike', $article->id) }}`,
                dataType : "json",
                data : {
                    status : $(".like").val()
                },
                success  : function(data){
                    if(data.success){
                     var add = `${data.data.length}`;
                     $("#like").html(add);
                     if(add==0){
                         $("#like").html('');
                     }
                    }

                }
            })
        }



        function insert(){
            $(".save-comment").addClass("disabled");
            $.ajax({
                type : "post",
                url : `{{ route('comment.store') }}`,
                dataType : "json",
                data : {
                    article_id : $(".article_id").val(),
                    user_id : $(".user_id").val(),
                    comments : $(".comment").val(),
                },
                success : function(data){
                    if(data.success){
                        $(".comment").val('');
                        getAll();
                    }
                }
            })
        }

        function like(){
            $.ajax({
                type : "post",
                url : `{{ route('likesystem') }}`,
                dataType : "json",
                data : {
                    article_id : $(".article_id").val(),
                    user_id : $(".user_id").val(),
                    status : $(".like").val(),
                },
                success : function(data){
                    if(data.success){
                        if(data.length > 10){
                            $('.like').addClass("disabled");
                        }
                        showLike()
                    }
                }
            })
        }




</script>

@endsection
