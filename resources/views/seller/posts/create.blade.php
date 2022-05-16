<x-seller-master>

    @section('content')

    <h1>Create Post</h1>

    <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">

        @csrf

        @if($errors->any())
        @foreach ($errors->all() as $error)
           <div class="alert alert-danger">{{ $error }}</div>
       @endforeach
     @endif


        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" placeholder="">
        </div>

        <div class="form-group">
            <label for="Post Category">Category</label>
            <select class="form-select" aria-label="Select Category" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" name="body" aria-label="With textarea" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="file">file</label>
            <input type="file" class="form-control" name="post_image" placeholder="">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <div class="input-group-prepend">
                <div class="input-group-text">$</div>
                <input type="number" class="form-control" name="price" placeholder="">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

    @endsection


</x-seller-master>
