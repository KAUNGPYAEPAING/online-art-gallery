<x-home-master>
 
    @section('content')
        

    <h1>Check Out</h1>

    <form method="post" action="{{ route('post.checkout.store') }}" enctype="multipart/form-data">
    
        @csrf
        @if($errors->any())
        @foreach ($errors->all() as $error)
           <div class="alert alert-danger">{{ $error }}</div>
       @endforeach
     @endif

     <div class="form-group">
        <input type="hidden" class="form-control" name="post_id" placeholder="" value="{{ $post->id }}" >
    </div>

    <div class="form-group">
        <input type="hidden" class="form-control" name="seller_id" placeholder="" value="{{ $post->user_id }}" >
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" placeholder="" value="{{ $post->title }}" readonly >
    </div>


        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="" value="{{ Auth::user()->name }}" readonly >
        </div>


    
        <div class="form-group">
            <label for="title">Address</label>
            <input type="text" class="form-control" name="address" placeholder="">
        </div>
    
        <div class="form-group">
            <label for="title">Phone Number</label>
            <input type="text" class="form-control" name="phone_number" placeholder="">
        </div>
    
        <div class="form-group">
            <label for="title">Description</label>
            <input type="text" class="form-control" name="description" placeholder="">
        </div>
    
        <div class="form-group">
            <label for="title">Original Price</label>
            <input type="number" class="form-control" name="original_price" placeholder="" value="{{ $post->price }}" readonly>
        </div>
    
        <div class="form-group">
            <label for="title">Delivery Fee</label>
            <input type="number" class="form-control" name="delivery_fee" placeholder="" value="2000" readonly>
        </div>
    
        <div class="form-group">
            <label for="title">Total Price</label>
            <input type="number" class="form-control" name="total_price" placeholder="" value="{{ $post->price + 2000}}" readonly>
        </div>
    
        <button type="submit" class="btn btn-primary"><a href="javascript:history.back()" style="color:white">Cancel</a></button>    
        <button type="submit" class="btn btn-primary">Submit</button>
    
    </form>
    


    @endsection



</x-home-master>