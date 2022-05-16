<x-seller-master>
    @section('content')
        

        <h4>Users</h4>

        @if (Session::has('user-delete'))

        <div class="alert alert-danger">{{ Session::get('user-delete') }}</div>
            
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Avata</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Avata</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            
                            @foreach ($users as $user)

                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td><a href="{{ route('user.profile.show', $user) }}">{{ $user->name }}</a></td>
                                    <td>
                                        
                                        <img src="{{ $user->avata }}" alt="" width="80px">
                                    </td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                                    <td>

                                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger">Delete</button>

                                        </form>

                                    </td>
                                </tr>
                                
                            @endforeach

    
    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    


    @endsection
</x-seller-master>