<x-seller-master>

    @section('content')

    <h1>User's checkout</h1>

    @if (Session::has('post-delete-message'))

    <div class="alert alert-danger">{{ Session::get('message') }}</div>

    @elseif (Session::has('post-created-message'))

    <div class="alert alert-success">{{ Session::get('post-created-message') }}</div>

    @elseif (Session::has('post-update-message'))

    <div class="alert alert-info">{{ Session::get('post-update-message') }}</div>

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
                            <th>Customer Name</th>
                            <th>Product Name</th>
                            <th>Address</th>
                            <th>Description</th>
                            <th>Total Price</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Progress</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Product Name</th>
                            <th>Address</th>
                            <th>Description</th>
                            <th>Total Price</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Progress</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($checkouts as $checkout)

                        <tr>
                            <td>{{ $checkout->id }}</td>
                            <th>{{ $checkout->name }}</td>
                            <th>{{ $checkout->posts->title}}</td>
                            <td>{{ $checkout->address }}</a></td>
                            <td>{{ $checkout->description }}</td>
                            <td>$ {{ $checkout->total_price }}</td>
                            <td>{{ $checkout->created_at->diffForHumans() }}</td>
                            <td>{{ $checkout->updated_at->diffForHumans() }}</td>

                            @if ($checkout->progress == "Received")
                                <td>{{ $checkout->progress }}</td>
                            @else
                                <td><a class="btn btn-success" href="{{ route('admin.checkout.edit', $checkout->id) }}">Received</a></td>
                            @endif

                        </tr>

                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>


    @section('script')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    @endsection

    @endsection

</x-seller-master>