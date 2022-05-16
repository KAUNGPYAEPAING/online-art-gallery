<x-seller-master>
    @section('content')

        @if (session()->has('role-updated'))
            <div class="alert alert-success">
                {{session('role-updated')}}
            </div>
        @endif

        <h3>Edit Page : {{$role->name}}</h3>

        <div class="col-sm-3">

            <form action="{{ route('admin.role.update', $role) }}" method="post" >

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="" value="{{ $role->name }}">
                    <div>
                        @error('name')
                            <span><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <button class="btn btn-primary" name="submit">Update</button>

            </form>

        </div>




    @endsection
</x-seller-master>