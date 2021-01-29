@extends('layouts.app')

@section('title')
    MOBIL
@endsection

@section('content')
    {{-- Header slide --}}
    <main class="main-carousel mt-10 mb-10">
        <div class="container">
            <div id="sync1" class="owl-carousel owl-theme shadow-md">
                @foreach ($banners as $banner)
                    <div class="item">
                        <img class="md:h-96 object-fill object-center" src="{{ Storage::url($banner->image) }}" alt="">
                    </div>
                @endforeach
                <div class="item">
                    <img class="md:h-96 object-fill object-center" src="{{ url('frontend/images/logo_mobil.png') }}" alt="">
                </div>
            </div>
        </div>
    </main>

    {{-- Search car --}}
    <section class="section-search">
        <div class="container mb-5">
            <h1 class="text-center font-bold text-3xl">Temukan Mobil Baru dan Mobil Bekas Impian Anda</h1>
            <div class="mt-5 mb:mt-0 lg:mx-20 mx-10">
                <div class="flex flex-col md:flex-row space-y-3 md:space-y-0 mb-4 md:mx-0">
                    <div class="md:flex-1 md:pr-3">
                        <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Merek Semua
                            Mobil</label>
                        <input class="w-full shadow-inner outline-none p-4 border-2 border-yellow-300 rounded-lg"
                            type="text" name="address_street" placeholder="Search e.g. Toyota Avanza 2020 ">
                    </div>
                    <div class="md:flex-2 md:pl-2">
                        <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Kondisi</label>
                        <select class="w-full shadow-inner p-4 border-2 outline-none border-yellow-300 rounded-lg"
                            type="text" name="address_number" placeholder="Semua">
                            <option value="Semua">Semua</option>
                            <option value="Semua">Baru</option>
                            <option value="Semua">Bekas</option>
                        </select>
                    </div>
                    <div class="md:flex-2 md:pl-3 mt-3">
                        <button
                            class="inline-flex w-full md:w-auto justify-center md:mt-4 py-4 md:px-4 text-black font-bold rounded-lg border-yellow-300 bg-yellow-300 border-2 hover:border-yellow-400"
                            type="submit">Cari Sekarang </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- cars type dan filter harga --}}
    <section class="section-type">
        <div class="container mb-10">
            <div class="grid md:grid-cols-3 lg:grid-cols-4 md:justify-start mx-10 lg:mx-20 space-x-5">
                <div class="flex flex-col">
                    <div class="mt-5 md:mt-0">
                        <h2 class="font-bold md:text-left text-center text-lg w-full">Lihat bedasarkan budget
                        </h2>
                        <ul class="font-bold text-center space-y-2 mr-0  ">
                            <li class="">
                                <a href="#"
                                    class="py-3 block border-2 font-semibold rounded-lg shadow-md hover:text-blue-500">
                                    &lt; 100 Juta</a>
                            </li>
                            <li class="">
                                <a href="#"
                                    class="py-3 block border-2 font-semibold rounded-lg shadow-md hover:text-blue-500">
                                    100 Juta - 300 Juta </a>
                            </li>
                            <li class="">
                                <a href="#"
                                    class="py-3 block border-2 font-semibold rounded-lg shadow-md hover:text-blue-500">
                                    300 Juta - 500 Juta</a>
                            </li>
                            <li class="">
                                <a href="#"
                                    class="py-3 block border-2 font-semibold rounded-lg shadow-md hover:text-blue-500">
                                    &gt; 500 Juta</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col md:col-span-2 lg:col-span-3">
                    <div class="mt-5 md:mt-0">
                        <h2 class="font-bold md:text-left text-center text-lg mb-3 md:mb-0">Lihat bedasarkan tipe</h2>
                        <div class="grid lg:grid-cols-3 xl:grid-cols-4 sm:grid-cols-2 gap-2">
                            @foreach ($car_types as $car_type)
                                <div class="flex md:justify-between border-2 h-32 rounded-md">
                                    <a href="#" class="m-0.5">
                                        <img class="rounded-md object-cover object-center w-full h-full"
                                            src="{{ Storage::url($car_type->image) }}" alt="{{ $car_type->title }}">
                                    </a>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- listing mobil --}}
    <section class="section-list">
        <div class="container static mb-10">
            <div class="lg:mx-20 mx-10 ">
                <h2 class="md:text-left text-center text-lg font-bold">List rekomendasi</h2>
                <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-4 md:justify-items-stretch">
                    @foreach ($cars as $car)
                        <div class="border-2 border-gray-50 rounded-lg shadow-md">
                            <a href="{{ route('detail', $car->slug) }}">
                                <div class="m-1">
                                    <img class=" rounded-md object-fill object-center w-full md:h-44 h-48"
                                        src="{{ Storage::url($car->galleries->count() ? $car->galleries->first()->image : '') }}"
                                        alt="{{ Str::limit($car->title, 25) }}">
                                </div>
                                <div class="mx-2 my-2">
                                    <h3 class="font-bold text-lg">{{ $car->price }}</h3>
                                    <p class="text-sm text-gray-500">{{ $car->condition }}</p>
                                    <h4 class="font-semibold text-base">{{ Str::limit($car->title, 25) }}</h4>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
