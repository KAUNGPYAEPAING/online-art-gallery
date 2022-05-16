<x-seller-master>

    @section('content')


            
                <h1>Welcome {{ Auth::user()->name }}</h1>

                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets8.lottiefiles.com/packages/lf20_dehufm3f.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>


    @endsection

</x-seller-master>
