<div class="container">
    <div class="flex justify-between items-center mx-5 my-12">
        <div style="height: 35px">
            <img src="{{ url('frontend/images/logo_mobil.png') }}" alt="Logo Mobil" class="h-full">
        </div>
        <ul class="flex font-bold">
            <li>
                <a href="{{url ('/')}}" class="px-4 py-2 hover:text-blue-500">Home</a>
            </li>
            <li>
                <a href="#" class="px-4 py-2 hover:text-blue-500">Mobil Baru</a>
            </li>
            <li>
                <a href="#" class="px-4 py-2 hover:text-blue-500">Mobil Bekas</a>
            </li>
            @auth
            <li class="px-5">
                <a href="{{ url('admin') }}">
                    <img src="{{ url('frontend/images/person-black-24dp.svg') }}" alt="My Account"
                        class="">
                </a>
            </li>
            @endauth
            @guest
                <li class="px-3">
                    <a
                        class="px-4 py-4 space-y-10 text-white bg-yellow-300 rounded-lg hover:text-yellow-300 border-2 border-yellow-300 hover:bg-white">Jual
                        Mobil Anda</a>
                </li>
                <li>
                    <a
                        class="px-4 py-4 border-2 border-blue-600 text-blue-600 rounded-lg hover:bg-blue-600 hover:text-white ">Apakah
                        Anda Dealer?</a>
                </li>
                <li class="px-5">
                    <a href="{{ url('login') }}">
                        <img src="{{ url('frontend/images/person-black-24dp.svg') }}" alt="My Account"
                            class="">
                    </a>
                </li>
            @endguest

        </ul>
    </div>
</div>
