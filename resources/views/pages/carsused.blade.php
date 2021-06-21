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
            <div class="grid grid-cols-5 md:mx-20 space-x-10 py-10">
                <div class="grid ">
                    <div class="flex flex-col justify-center space-y-3">
                        <div class="md:w-21 bg-white rounded-md">
                            <div class="relative mb-1 border-b rounded">
                                <input type="checkbox" id="toggle1" class="toggle hidden" checked />
                                <label class="title rounded block font-bold bg-white text-sm p-4 cursor-pointer"
                                    for="toggle1">
                                    Harga
                                </label>
                                <div class="content bg-white overflow-hidden">
                                    <div class="mx-5 my-5 space-y-5">
                                        <input class="border-b w-full focus:border-blue-600 focus:outline-none"
                                            placeholder="Dari: " type="text">
                                        <input class="border-b w-full focus:border-blue-600 focus:outline-none"
                                            placeholder="Ke: " type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="relative mb-1">
                                <input type="checkbox" id="toggle2" class="toggle hidden" checked />
                                <label class="title block font-bold bg-white p-4 cursor-pointer text-sm" for="toggle2">
                                    Title goes here
                                </label>
                                <div class="content bg-white overflow-hidden">
                                    <p class="p-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="border shadow-sm rounded-md bg-white ">
                            <div class="my-5 mx-3 space-y-5">
                                <h4 class="font-semibold text-sm">Harga</h4>
                                <div class="mx-1 space-y-5">
                                    <input class="border-b w-full focus:border-blue-600 focus:outline-none"
                                        placeholder="Dari: " type="text">
                                    <input class="border-b w-full focus:border-blue-600 focus:outline-none"
                                        placeholder="Ke: " type="text">
                                </div>

                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-span-4">
                    <div class="border-gray-200 border-b border-opacity-50">
                        <div class="flex flex-row my-2 space-x-2">
                            <a class="px-1 font-semibold text-blue-600 hover:text-black"
                                href="{{ url('/') }}">Beranda</a>
                            <p class="font-semibold"> &gt; </p>
                            <a class="px-1 font-semibold  text-blue-600 hover:text-black"
                                href="{{ url('/cars/used') }}">Mobil</a>
                            {{-- <p class="font-semibold"> &gt; </p> --}}
                        </div>
                    </div>
                    <div class="md:justify-start justify-center space-x-4">
                        <div class="grid grid-cols-3 gap-5">
                            @foreach ($items as $item)
                                <div class="border"  onclick="location.href='{{ route('detail', $item->slug) }}'; " >
                                    <div class="relative">
                                        @if ($item->galleries)
                                            <img src="{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}"
                                                alt="" class="p-2" style="max-width: 290px; max-height: 210px">
                                        @endif
                                        <div class="absolute bottom-0 right-0 bg-gray-700 opacity-80">
                                            <p class="text-white m-3 opacity-100">{{ $item->condition }}</p>
                                        </div>
                                    </div>
                                    <div class="m-2">
                                        <p>{{ $item->title }}</p>
                                        <p class="font-semibold">Rp. {{ number_format($item->price, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
