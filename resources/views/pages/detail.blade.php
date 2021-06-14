@extends('layouts.app')

@section('title', 'Detail Mobil')

@section('content')
    <header class="nav-header">
        <div class="container border-gray-200 border-b border-opacity-50">
            <div class="flex flex-row md:mx-20 mx-10 my-2 space-x-2">
                <a class="px-1 font-semibold text-blue-600 hover:text-black" href="{{ url('/') }}">Beranda</a>
                <p class="font-semibold"> &gt; </p>
                <a class="px-1 font-semibold  text-blue-600 hover:text-black" href="{{ url('/cars') }}">Mobil</a>
                <p class="font-semibold"> &gt; </p>
                <p class="font-semibold"> {{ $item->title }}</p>
            </div>
        </div>
    </header>

    <main class="cars-detail">
        <div class="container my-5">
            <div class="md:mx-20 mx-10">
                <div class="flex flex-col md:grid md:grid-cols-3 justify-center gap-5">
                    <div class="col-span-2 flex flex-col space-y-5">
                        <div class="bg-white border rounded-md border-gray-700">
                            <div class="m-5">
                                <div class="grid grid-cols-3">
                                    <h2 class="text-xl font-semibold col-span-2">{{ $item->title }}</h2>
                                    <h2 class="text-xl font-semibold text-blue-600 text-right">{{ $item->price }}</h2>
                                </div>
                                <p class="text-gray-500 text-xs">Diperbaharui pada: 21 Maret 2021</p>

                                <div class=" space-x-3">

                                    <h3 class="text-xl">{{ $item->price_description }}</h3>
                                </div>
                                <div id="sync3" class="owl-carousel owl-theme mt-2">
                                    @foreach ($item->galleries as $gallery)
                                        <div class="item">
                                            <img class="rounded-md object-fill object-center"
                                                src="{{ Storage::url($gallery->image) }}"
                                                alt="{{ Str::limit($item->title, 25) }}">
                                        </div>
                                    @endforeach
                                </div>
                                <div id="sync4" class="owl-carousel owl-theme mt-5">
                                    @foreach ($item->galleries as $gallery)
                                        <div class="item rounded-md">
                                            <img class="object-fill object-center"
                                                src="{{ Storage::url($gallery->image) }}"
                                                alt="{{ Str::limit($item->title, 25) }}">

                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        c
                        <div class="md:w-21 bg-white rounded-md">
                            <div class="relative mb-1">

                                <input type="checkbox" id="toggle1" class="toggle hidden" />
                                <label class="title block font-bold bg-white p-4 cursor-pointer" for="toggle1">
                                    Eksterior
                                </label>
                                <div class="content bg-white overflow-hidden">
                                    @foreach ($features->vehicle_features as $items)
                                        <p class="">{{ $items->feature }}</p>
                                    @endforeach
                                </div>
                            </div>

                           
                        </div>
                        <div class="flex flex-col border rounded-md border-gray-700">
                            <div class="m-5">
                                <h3 class="font-semibold text-lg">Deskripsi</h3>
                                <p class="m-5">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-5">
                        <div class="flex flex-col bg-white border rounded-md border-gray-700">
                            <div class="flex flex-col m-5 space-y-5">
                                <button
                                    class="bg-green-400 rounded-md py-3 hover:bg-green-500 text-base font-semibold text-white">
                                    Lihat No Telepon
                                </button>
                                <a class="flex flex-wrap justify-center space-x-1 bg-green-300 text-center rounded-md py-3 hover:bg-green-400 text-base font-semibold text-white"
                                    href="https://web.whatsapp.com/send?phone={{ $item->users->phone_number }}&text=Halo,%20saya%20menemukan%20iklan%20Anda%20di%20Mobil.%20Saya%20ingin%20mengetahui%20lebih%20lanjut%20tentang%20{{ $item->title }}%20Terima%20kasih!%20{{ $wa }}">
                                    <img class="w-6 h-6" src="{{ url('frontend/images/whatsapp.svg') }}" alt="">
                                    </svg><span>Whatsapp Penjual</span>
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col bg-white border rounded-md border-gray-700">
                            <div class="flex flex-col m-5 space-y-5">
                                <div class="flex border-b border-gray-300">
                                    <h3 class="text-base font-semibold pb-2">Seller Information</h3>
                                </div>
                                <div class="flex flex-row">
                                    <div class="flex w-36 h-36"></div>
                                    <div class="flex flex-col">
                                        <h4 class="text-lg font-semibold">
                                            {{ $item->users->name }}
                                        </h4>
                                        <p class="text-sm">Penjual Terpercaya</p>
                                        <p class="text-sm">{{ $item->users->address }}, {{ $item->users->city }},
                                            {{ $item->users->province }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col bg-white border rounded-md border-gray-700">
                            <div class="flex flex-col m-5 space-y-5">
                                <div class="flex border-b border-gray-300">
                                    <h3 class="text-base font-semibold pb-2">Spesifikasi</h3>
                                </div>
                                <div class="flex flex-col">
                                    <div class="grid grid-cols-2 border-b py-2">
                                        <p class="font-semibold text-sm ">Tipe Mobil :</p>
                                        <p class="text-right text-sm">Honda</p>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </main>
@endsection
