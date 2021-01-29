@extends('layouts.app')

@section('title', 'Detail Mobil')

@section('content')
<header class="nav-header">
    <div class="container border-gray-200 border-b border-opacity-50">
        <div class="flex flex-row md:mx-15 mx-5 my-2 space-x-2">
            <a class="px-1 font-semibold text-blue-600 hover:text-black"
                href="{{ url('/') }}">Beranda</a>
            <p class="font-semibold"> &gt; </p>
            <a class="px-1 font-semibold  text-blue-600 hover:text-black" href="{{ url('/cars') }}">Mobil</a>
            <p class="font-semibold"> &gt; </p>
            <p class="font-semibold"> {{$item->title}}</p>
        </div>
    </div>
</header>

<main class="cars-detail">
    <div class="container bg-gray-300">
        <div class="flex md:flex-row flex-col justify-start md:space-x-5 space-y-5 md:space-y-0 md:mx-15 mx-5 py-8">
            <div class="flex flex-col space-y-5">
                <div class="flex flex-col bg-white border rounded-md border-gray-700 md:w-21">
                    <div class="flex flex-col m-5">
                        <h2 class="text-lg">{{ $item->title }}</h2>
                        <div class="flex flex-row space-x-3">
                            <h3 class="text-xl font-bold">@currency($item->price)</h3>
                            <h3 class="text-xl">{{$item->price_description}}</h3>
                        </div>
                        <div id="sync2" class="owl-carousel owl-theme w-3/4">
                            @foreach($item->galleries as $gallery)
                                <div class="item " style="height: 65vh;">
                                    <div class="h-full"
                                        style="background-image: url({{ Storage::url($gallery->image) }})">
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div id="sync3" class="owl-carousel owl-theme">
                            @foreach($item->galleries as $gallery)
                                <div class="item h-32">
                                    <div class="h-full"
                                        style="background-image: url({{ Storage::url($gallery->image) }})">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="flex flex-col bg-white border rounded-md border-gray-700 md:w-21">
                    <div class="flex flex-row m-5 justify-around">
                        <div class="flex flex-col">
                            <h3 class="text-sm">Transmisi</h3>
                            <h4 class="text-lg font-semibold">{{ $item->transmission }}</h4>
                        </div>
                        <div class="flex flex-col">
                            <h3 class="text-sm">Bahan Bakar</h3>
                            <h4 class="text-lg font-semibold">{{ $item->fuel }}</h4>
                        </div>
                        <div class="flex flex-col">
                            <h3 class="text-sm">Kapasitas Mesin</h3>
                            <h4 class="text-lg font-semibold">{{ $item->cc }}cc</h4>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col bg-white border rounded-md border-gray-700 md:w-21">
                    <div class="flex flex-col m-5">
                        <div class="border-b">
                            <h3 class="text-lg font-bold pb-2">Deskripsi dari Penjual</h3>
                        </div>
                        <div class="">
                            <p class="m-5">{{ $item->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col space-y-5">
                <div class="flex flex-col bg-white border rounded-md border-gray-700">
                    <div class="flex flex-col m-5 space-y-5  md:w-96">
                        <button
                            class="bg-green-400 rounded-md py-3 hover:bg-green-500 text-base font-semibold text-white">
                            Lihat No Telepon
                        </button>
                        <a class="bg-green-300 text-center rounded-md py-3 hover:bg-green-400 text-base font-semibold text-white"
                            href="https://web.whatsapp.com/send?phone={{ $item->users->phone_number }}&text=Halo,%20saya%20menemukan%20iklan%20Anda%20di%20Mobil.%20Saya%20ingin%20mengetahui%20lebih%20lanjut%20tentang%20{{ $item->title }}%20Terima%20kasih!%20{{ $wa }}">
                            Whatsapp Penjual
                        </a>
                    </div>
                </div>
                <div class="flex flex-col bg-white border rounded-md border-gray-700">
                    <div class="flex flex-col m-5 space-y-5 w-96">
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
                                    {{ $item->users->province }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
