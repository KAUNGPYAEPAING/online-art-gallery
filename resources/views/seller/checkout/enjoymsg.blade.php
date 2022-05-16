<x-seller-master>

    @section('content')


<div style="text-align: center">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_totrpclr.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px; margin: 0 50% 0 40%;"  loop  autoplay></lottie-player>
    <h1>Thanks You For Buying From Us</h1><br>
    <h3>See you next time</h3>
</div>
<form method="post" action="{{ route('admin.checkout.update', $checkout->id) }}" enctype="multipart/form-data">

    @csrf
    @method('PATCH')

    <div class="form-group">
        <input type="hidden" class="form-control" name="progress" aria-describedby="emailHelp" value="Received" placeholder="">
    </div>

    <button class="btn btn-primary" type="submit" style="margin:0 50% 0 43%;">Back to CheckOut Screen</button>

</form>




    @section('script')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    @endsection

    @endsection

</x-seller-master>