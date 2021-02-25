{{-- <header class="navbar border-b shadow-sm">
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
                @guest

                    <div>
                        <a href="{{ url('login') }}"
                            class="px-4 py-4 border-2 border-blue-600 text-blue-600 rounded-lg hover:bg-blue-600 hover:text-white ">
                            Masuk</a>
                    </div>

                @endguest
                @auth
                    <div class="dropdown inline-block relative">
                        <button class="font-semibold px-2 inline-flex items-center">
                            <img src="{{ url('frontend/images/person-black-24dp.svg') }}" alt="My Account" class="">
                        </button>
                        @if (Auth::user()->adminAndOperator())
                            <ul class="dropdown-menu absolute hidden text-black bg-white rounded-md pt-1 z-10">
                                <li><a href="{{ url('admin') }}"
                                        class="item-dropdown rounded-t hover:text-blue-600 py-2 px-4 block whitespace-no-wrap">Dashboard</a>
                                </li>
                                <li><a href="{{ route('profile-seller.edit') }}"
                                        class="item-dropdown hover:text-blue-600 py-2 px-4 block whitespace-no-wrap">Profile</a>
                                </li>
                                <li>
                                    @csrf
                                    <a href="{{ url('logout') }}"
                                        class="item-dropdown rounded-b hover:text-blue-600 py-2 px-4 block whitespace-no-wrap">Logout</a>
                                </li>
                            </ul>
                        @else
                            <ul class="dropdown-menu absolute hidden text-black bg-white rounded-md pt-1 z-10">
                                <li><a href="{{ route('profile-seller.edit') }}"
                                        class="item-dropdown rounded-t hover:text-blue-600 py-2 px-4 block whitespace-no-wrap">Profile</a>
                                </li>
                                <li>
                                    @csrf
                                    <a href="{{ url('logout') }}"
                                        class="item-dropdown rounded-b hover:text-blue-600 py-2 px-4 block whitespace-no-wrap">Logout</a>
                                </li>
                            </ul>
                        @endif
                    </div>
                @endauth
            </div>
        </nav>
    </div>
</header> --}}

<!-- This example requires Tailwind CSS v2.0+ -->
<header>
    <div class="container">
        <!-- navbar goes here -->
        <nav class="bg-blue-900">
            <div class="max-w-6xl mx-auto px-4 py-3">
                <div class="flex justify-between">

                    <div class="flex space-x-4">
                        <!-- logo -->
                        <div>
                            <a href="{{ url('/') }}"
                                class="flex items-center py-5 px-2 text-gray-700 hover:text-gray-900">
                                <svg class="h-6 w-6 mr-1 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg>
                                <span class="font-bold text-white">MOBIL</span>
                            </a>
                        </div>

                    </div>
                    <div class="hidden md:flex items-center font-medium font-sans  space-x-1">
                        <a href="{{ url('/') }}" class="py-5 px-3 text-white hover:text-green-400">Home</a>
                        <a href="{{ url('cars/new') }}" class="py-5 px-3 text-white hover:text-green-400">Mobil
                            Baru</a>
                        <a href="{{ url('cars/used') }}" class="py-5 px-3 text-white hover:text-green-400">Mobil
                            Bekas</a>
                        <a href="{{ url('cars/used') }}" class="py-5 px-3 text-white hover:text-green-400">Promo</a>
                    </div>

                    <!-- secondary nav -->
                    @guest
                        <div class="hidden md:flex items-center space-x-1">
                            <a href="{{ url('login') }}"
                                class="px-6 py-2 text-white font-semibold bg-green-400 hover:bg-green-500 border-transparent rounded-md">Masuk</a>
                        </div>
                    @endguest
                    @auth
                        <div class="hidden md:flex items-center space-x-1">
                            <div class="dropdown inline-block relative">
                                <button
                                    class="text-white font-semibold py-2 rounded focus:outline-none inline-flex items-center space-x-2">
                                    <img src="{{ Storage::url(Auth::user()->profil_picture) }}" class="w-8 rounded-full"
                                        alt="">
                                    <span class="mr-1">Hi, {{ Auth::user()->first_name }}</span>
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </button>
                                <ul class="dropdown-menu absolute hidden pt-5 z-10">
                                    <li class=""><a
                                            class="rounded-t bg-white hover:bg-green-400 hover:text-white py-2 px-4 block whitespace-no-wrap"
                                            href="{{ route('profile-seller.edit') }}">Profile</a></li>
                                    @if (Auth::user()->adminAndOperator())
                                        <li class=""><a
                                                class="bg-white hover:bg-green-400 hover:text-white py-2 px-4 block whitespace-no-wrap"
                                                href="{{ url('admin') }}">Dashboard</a></li>
                                    @endif
                                    <li class=""><a
                                            class="bg-white hover:bg-green-400 hover:text-white py-2 px-4 block whitespace-no-wrap"
                                            href="#">Mobil Tersimpan</a></li>
                                    <li class=""><a
                                            class="bg-white border-b hover:bg-green-400 hover:text-white py-2 px-4 block whitespace-no-wrap"
                                            href="{{ url('claim-promo') }}">Voucher</a></li>
                                    <li class=""><a
                                            class="rounded-b bg-white hover:bg-green-400 hover:text-white py-2 px-4 block whitespace-no-wrap"
                                            href="{{ url('logout') }}">Keluar</a></li>
                                </ul>
                            </div>
                        </div>
                    @endauth


                    <!-- mobile button goes here -->
                    <div class="md:hidden flex items-center">
                        <button class="mobile-menu-button">
                            <svg class="w-8 h-8 fill-current text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>

                </div>
            </div>

            <!-- mobile menu -->
            <div class="mobile-menu hidden md:hidden">
                <a href="#" class="block py-4 px-4 text-sm text-white hover:bg-green-400">Home</a>
                <a href="#" class="block py-4 px-4 text-sm text-white hover:bg-green-400">Mobil Baru</a>
                <a href="#" class="block py-4 px-4 text-sm text-white hover:bg-green-400">Mobil Bekas</a>
                <a href="#" class="block py-4 px-4 text-sm text-white hover:bg-green-400 border-b">Promo</a>
                @guest
                <div class="block py-4 px-4">
                    <a href="#" class="flex w-full text-sm text-white rounded-sm justify-center py-3 border-transparent bg-green-400 hover:bg-green-500 border-b">Masuk</a>
                </div>
                @endguest
                @auth
                    <div class="flex flex-row py-4 px-4">
                        <img src="{{ Storage::url(Auth::user()->profil_picture) }}" class="w-8 rounded-full" alt="">
                        <p class="text-white font-semibold px-2 py-1">Hi, {{ Auth::user()->first_name }}</p>
                    </div>
                    <a href="#" class="block py-4 px-4 text-sm text-white hover:bg-green-400">Profile</a>
                    <a href="#" class="block py-4 px-4 text-sm text-white hover:bg-green-400">Mobil Tersimpan</a>
                    <a href="#" class="block py-4 px-4 text-sm text-white hover:bg-green-400 border-b">Profile</a>
                    <a href="#" class="block py-4 px-4 text-sm text-white hover:bg-green-400">Keluar</a>
                @endauth


            </div>
        </nav>
    </div>
</header>
