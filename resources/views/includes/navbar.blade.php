<header class="navbar border-b shadow-sm">
    <div class="container">
        <nav class="flex flex-row mx-5 py-8 ">
            <div class="justify-start w-36">
                <a href="{{ url('/') }}">
                    <img src="{{ url('frontend/images/logo_mobil.png') }}" alt="Logo Mobil" class="h-auto">
                </a>
            </div>
            <div class="flex justify-end font-semibold flex-row w-full m-1.5 space-x-4">
                <a href="{{ url('/') }}" class="flex hover:text-blue-500">Home</a>
                <a href="{{ url('cars/new') }}" class="flex hover:text-blue-500">Mobil Baru</a>
                <a href="{{ url('cars/used') }}" class="flex hover:text-blue-500">Mobil Bekas</a>
                <div>
                    <a href="{{ url('listing/create') }}"
                        class="px-4 py-4 space-y-10 text-white bg-yellow-300 rounded-lg hover:text-yellow-300 border-2 border-yellow-300 hover:bg-white">Jual
                        Mobil Anda</a>
                </div>
                {{-- @auth
                <a class="inline-flex" href="{{ url('admin') }}">
                    <img src="{{ url('frontend/images/person-black-24dp.svg') }}" alt="My Account" class="">
                </a>

                @endauth--}}
                @guest

                    <div>
                        <a
                            class="px-4 py-4 border-2 border-blue-600 text-blue-600 rounded-lg hover:bg-blue-600 hover:text-white ">Apakah
                            Anda Dealer?</a>
                    </div>

                    <a href="{{ url('login') }}">
                        <img src="{{ url('frontend/images/person-black-24dp.svg') }}" alt="My Account" class="">
                    </a>


                @endguest
                @auth

                    <div class="dropdown inline-block relative">
                        <button class="font-semibold px-2 inline-flex items-center">
                            <img src="{{ url('frontend/images/person-black-24dp.svg') }}" alt="My Account" class="">
                            {{-- <svg class="fill-current h-4 w-4"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg> --}}
                        </button>
                        @if (Auth::user()->adminAndOperator())
                            <ul class="dropdown-menu absolute hidden text-black bg-white rounded-md pt-1 z-10">
                                <li><a href="{{ url('admin') }}"
                                        class="item-dropdown rounded-t hover:text-blue-600 py-2 px-4 block whitespace-no-wrap">Dashboard</a>
                                </li>
                                <li><a href="{{ url('profile', Auth::user()->id) }}"
                                        class="item-dropdown hover:text-blue-600 py-2 px-4 block whitespace-no-wrap">Profile</a>
                                </li>
                                <li>
                                    @csrf
                                    <a href="{{ url('logout') }}"
                                        class="item-dropdown rounded-b hover:text-blue-600 py-2 px-4 block whitespace-no-wrap">Logout</a>
                                </li>
                            </ul>
                        @else
                            <ul class="dropdown-menu absolute bg-white shadow hidden w-32">
                                <li><a href="{{ url('profile', Auth::user()->id)}}"
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
