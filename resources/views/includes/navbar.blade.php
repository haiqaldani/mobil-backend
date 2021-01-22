<header class="navbar border-b shadow-sm">
    <div class="container">
        <nav class="flex flex-row mx-5 py-8 ">
            <div class="justify-start" style="height: 35px">
                <a href="{{ url('/') }}">
                    <img src="{{ url('frontend/images/logo_mobil.png') }}" alt="Logo Mobil"
                        class="h-full">
                </a>
            </div>
            <div class="flex justify-end font-semibold flex-row w-full m-1.5 space-x-4">
                <a href="{{ url ('/') }}" class="flex hover:text-blue-500">Home</a>
                <a href="{{ url('cars/new') }}" class="flex hover:text-blue-500">Mobil Baru</a>
                <a href="{{ url('cars/used') }}" class="flex hover:text-blue-500">Mobil Bekas</a>
                {{-- @auth
                <a class="inline-flex" href="{{ url('admin') }}">
                <img src="{{ url('frontend/images/person-black-24dp.svg') }}" alt="My Account"
                    class="">
                </a>

                @endauth--}}
                @guest
                    <div>
                        <a
                            class="px-4 py-4 space-y-10 text-white bg-yellow-300 rounded-lg hover:text-yellow-300 border-2 border-yellow-300 hover:bg-white">Jual
                            Mobil Anda</a>
                    </div>
                    <div>
                        <a
                            class="px-4 py-4 border-2 border-blue-600 text-blue-600 rounded-lg hover:bg-blue-600 hover:text-white ">Apakah
                            Anda Dealer?</a>
                    </div>

                    <a href="{{ url('login') }}">
                        <img src="{{ url('frontend/images/person-black-24dp.svg') }}"
                            alt="My Account" class="">
                    </a>


                @endguest
                @auth

                    <div class="flex dropdown relative flex-col items-center h-full  transition rounded-sm">
                        <button class="flex flex-row items-center  hover:text-blue-600  h-full">
                            <img src="{{ url('frontend/images/person-black-24dp.svg') }}"
                                alt="My Account" class="">
                            {{-- <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg> --}}
                        </button>
                    @if(Auth::user()->adminAndOperator())
                        <ul class="dropdown-menu absolute bg-white shadow hidden w-32">
                            <li><a href="{{ url('admin') }}"
                                    class="py-2 px-4 block hover:bg-gray-200 whitespace-no-wrap">Dashboard</a>
                            </li>
                            <li>
                                @csrf
                                <a href="{{ url('logout') }}"
                                    class="py-2 px-4 block hover:bg-gray-200 whitespace-no-wrap">Logout</a>
                            </li>
                        </ul>
                    @else
                        <ul class="dropdown-menu absolute bg-white shadow hidden w-32">
                            <li><a href="{{ url('profile') }}"
                                    class="py-2 px-4 block hover:bg-gray-200 whitespace-no-wrap">Profile</a>
                            </li>
                            <li>
                                @csrf
                                <a href="{{ url('logout') }}"
                                    class="py-2 px-4 block hover:bg-gray-200 whitespace-no-wrap">Logout</a>
                            </li>
                        </ul>
                    @endif
                    </div>
                @endauth
            </div>
        </nav>
    </div>
</header>
