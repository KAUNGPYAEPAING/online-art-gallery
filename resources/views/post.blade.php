<x-home-master>

    @section('content')

    <button type="submit" class="btn btn-secondary" style=" margin-left:12px;"><a href="javascript:history.back()" style="color:white;">Back</a></button>  


    <div class="col-md-7">
        <article class="card">
            <div>
                <img  src="{{ $post->post_image }}" alt="Card image" width="30%">
            </div>

            <div class="card-body">
                <h1 class="card-title display-4">
                    {{ $post->title }}</h1>
                
                <h5>Uploaded By <b>{{ $post->user->name }}</b></h5>
                <p>{{ $post->body }}</p>
                <p><b>Price </b>${{ $post->price }}</p>

                @if(Auth::check())
                <button class="btn btn-gray"><a href="{{ route('post.download', $post->id) }}">Download</a></button>
                <button class="btn btn-primary"><a href="{{ route("post.checkout.index", $post) }}" style="color:white">Physical Purchase</a></button>
                @elseif(!Auth::check())
                <h6 style="color:red">In order to Download and Purchase a physical product you have to login or signup first</h6>

                @endif

                @if (Auth::check())

                @if (Session::has('comment-send'))

                <div class="alert alert-success">{{ Session::get('comment-send') }}</div>

                @endif



                <!-- Comments Form -->

                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">



                        <form action="{{ route('post.comment.store') }}" method="post"  enctype="multipart/form-data">

                            @csrf

                            <input type="hidden" name="post_id" value="{{ $post->id }}">

                            <input type="hidden" name="author" value="{{ Auth::user()->name }}">

                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="body"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>


                    </div>
                </div>
                





                @if (Session::has('message'))

                <div class="alert alert-danger">{{ Session::get('message') }}</div>

                @endif
                    

                @foreach ($comments as $comment)
                    
                <!-- Single Comment -->
                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">{{ $comment->author }}</h5>
                        {{ $comment->body }}
                    </div>
                </div>



                @if (Auth::user()->name == $comment->author)
                <form action="{{ route('post.comment.destroy', $comment->id) }}" method="post">
                    @csrf

                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
                @endif


                <hr>

                @endforeach


                <!--End Comments
            ================================================== -->

                @endif

            </div>
        </article>
    </div>
    @endsection

</x-home-master>
