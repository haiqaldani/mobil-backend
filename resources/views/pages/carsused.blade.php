@extends('layouts.app')

@section('title', 'Mobil Bekas')

@section('content')
<header class="nav-header  bg-blue-500">
    <div class="container border-gray-200">
        <div class="flex flex-row md:mx-15 mx-5 justify-center space-x-3">
            <form action="" class="my-4">
                <input class="border rounded-sm py-2 px-2" style="width: 10cm" type="text"
                    placeholder="Cari, merek, tipe, tahun, lokasi lainnya">
                <button class="bg-yellow-300 rounded-sm py-2 px-6 text-white" type="submit">Cari</button>
            </form>
        </div>
    </div>
</header>
<main class="list-car-used">
    <div class="container bg-gray-100">
        <div class="flex flex-row md:mx-15 space-x-10 pt-10">
            <div class="flex flex-col">
                <div class="flex flex-col justify-center space-y-3">
                    <div class="border shadow-sm rounded-md bg-white md:w-72">
                        <div class="m-5 space-y-5">
                            <h4 class="font-semibold">Lokasi</h4>
                            <input class="border-b w-full focus:border-blue-600 focus:outline-none" placeholder="Masukkan Lokasi" type="text">
                        </div>
                    </div>
                    <div class="border shadow-sm rounded-md bg-white md:w-72">
                        <div class="m-5 space-y-5">
                            <h4 class="font-semibold">Harga</h4>
                            <input class="border-b w-full focus:border-blue-600 focus:outline-none" placeholder="Dari: " type="text">
                            <input class="border-b w-full focus:border-blue-600 focus:outline-none" placeholder="Ke: " type="text">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="border-gray-200 border-b border-opacity-50">
                    <div class="flex flex-row my-2 space-x-2">
                        <a class="px-1 font-semibold text-blue-600 hover:text-black"
                            href="{{ url('/') }}">Beranda</a>
                        <p class="font-semibold"> &gt; </p>
                        <a class="px-1 font-semibold  text-blue-600 hover:text-black" href="{{ url('/cars/used') }}">Mobil</a>
                        <p class="font-semibold"> &gt; </p>
                    </div>
                </div>
                <div class="flex flex-wrap md:justify-start justify-center space-x-4">
                    @foreach($items as $item)
                        <div class="border-2 border-gray-50 rounded-lg mb-5 shadow-md bg-white">
                            <a href="{{ route('detail', $item->slug) }}">
                                <div class="mx-1">
                                    <img class="object-fill object-center md:w-70 md:h-48 w-96 h-48"
                                        src="{{ Storage::url($item->galleries->first()->image) }}"
                                        alt="{{ $item->title }}">
                                </div>
                                <div class="px-2 py-2">
                                    <h3 class="font-bold text-lg">@currency($item->price)</h3>
                                    <p class="text-sm text-gray-500">{{ $item->condition }}</p>
                                    <h4 class="font-semibold text-base">{{ $item->title }}</h4>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</main>
@endsection
