@extends('layouts.app')

@section('title')
MOBIL
@endsection

@section('content')
{{-- Header slide --}}
<header class="header-carousel">
    <div class="container">
        <div id="sync1" class="owl-carousel owl-theme shadow-md w-3/4">
            @foreach($banners as $banner)
                <div class="item " style="height: 65vh;">
                    <div class="h-full bg-blue-900"
                        style="background-image: url({{ $banner->image ? Storage::url($banner->image) : '' }})">

                    </div>
                </div>
            @endforeach
            <div class="item " style="height: 65vh;">
                <div class="h-full bg-blue-900">
                </div>
            </div>
        </div>
    </div>
</header>

{{-- Search car --}}
<main class="main-search">
    <div class="container   mt-10">
        <h1 class="text-center font-bold text-3xl">Temukan Mobil Baru dan Mobil Bekas Impian Anda</h1>
        <div class="mt-2 mb:mt-0 md:mx-20 mx-0">
            <div class="flex flex-col md:flex-row mb-4">
                <div class="md:flex-1 md:pr-3">
                    <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Merek Semua
                        Mobil</label>
                    <input class="w-full shadow-inner p-4 border-2 border-yellow-300 rounded-lg" type="text"
                        name="address_street" placeholder="Search e.g. Toyota Avanza 2020 ">
                </div>
                <div class="md:flex-2 md:pl-2">
                    <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Kondisi</label>
                    <select class="w-full shadow-inner p-4 border-2 border-yellow-300 rounded-lg" type="text"
                        name="address_number" placeholder="Semua">
                        <option value="Semua">Semua</option>
                        <option value="Semua">Baru</option>
                        <option value="Semua">Bekas</option>
                    </select>
                </div>
                <div class="md:flex-2 md:pl-3">
                    <button
                        class="mt-3.5 w-full md:px-4 py-4 text-black font-bold rounded-lg border-yellow-300 bg-yellow-300 border-2 hover:border-yellow-400"
                        type="submit">Cari Sekarang </button>
                </div>
            </div>
        </div>
    </div>
</main>

{{-- cars type dan filter harga --}}
<section class="section-type">
    <div class="container">
        <div class="flex md:flex-row flex-col md:justify-start mx-10 md:mx-20">
            <div class="flex flex-col">
                <div class="mt-5 md:mt-0">
                    <h2 class="font-bold md:text-left text-center text-lg md:mr-40 w-full">Lihat bedasarkan budget</h2>
                </div>
                <div class="">
                    <button class="py-4 md:w-11/12 w-full  text-blue-700 font-semibold rounded-lg shadow-md ">
                        < 100 Juta </button>
                </div>
                <div class="">
                    <button class="py-4 md:w-11/12 w-full text-blue-700 font-semibold rounded-lg shadow-md ">
                        100 Juta - 300 Juta
                    </button>
                </div>
                <div class="">
                    <button class="py-4 md:w-11/12 w-full text-blue-700 font-semibold rounded-lg shadow-md ">
                        300 Juta - 500 Juta
                    </button>
                </div>
                <div class="">
                    <button class="py-4 md:w-11/12 w-full text-blue-700 font-semibold rounded-lg shadow-md ">
                        > 500 Juta
                    </button>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="mt-5 md:mt-0">
                    <h2 class="font-bold md:text-left text-center text-lg mb-3 md:mb-0">Lihat bedasarkan tipe</h2>
                </div>
                @foreach($car_types as $car_type)
                    <div class="flex flex-wrap md:justify-between justify-center">
                        <div class="border-2 rounded-md bg-white mb-3 ">
                            <a href="#">
                                <div class="bg-auto bg-no-repeat bg-center w-96 h-48 w: md:w-48 md:h-24"
                                    style="background-image: url({{ $car_type->image ? Storage::url($car_type->image) : '' }})">
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- listing mobil --}}
<section class="section-list">
    <div class="container">
        <div class="md:mx-20 mt-5">
            <h2 class="md:text-left text-center text-lg font-bold">List rekomendasi</h2>
            <div class="flex flex-wrap md:justify-start justify-center space-x-4">
                @foreach($cars as $car)
                    <div class="border-2 border-gray-50 rounded-lg mb-5 shadow-md">
                        <a href="route{{ 'detail', $car->slug }}">
                            <div class="bg-auto bg-no-repeat bg-center md:w-70 md:h-48 w-96 h-48"
                                style="background-image: url({{ $car->galleries->count ? Storage::url($car->galleries->first()->image) : '' }})">
                            </div>
                            <div class="px-2 py-2">
                                <h3 class="font-bold text-lg">Rp {{ $car->price }}</h3>
                                <p class="text-sm text-gray-500">{{ $car->condition }}</p>
                                <h4 class="font-semibold text-base">{{ $car->title }}</h4>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
@endsection
