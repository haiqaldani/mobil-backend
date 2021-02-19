@extends('layouts.app')

@section('title')
    MOBIL
@endsection

@section('content')
    {{-- Header slide --}}
    <main class="main-carousel mb-10">
        <div class="container">
            <div id="sync1" class="owl-carousel owl-theme shadow-md">
                @foreach ($banners as $banner)
                    <div class="item">
                        <img class="object-fill object-center" src="{{ Storage::url($banner->image) }}" alt="">
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    {{-- Search car --}}
    <section class="section-search">
        <div class="container mb-10">
            <div class="border-transparent mx-20 py-5 bg-blue-900 rounded-md">
                <h1 class="text-center font-bold font-sans text-white text-3xl">Temukan Mobil Baru dan Mobil Bekas Impian
                    Anda</h1>
                <div class="mt-5 mb:mt-0 lg:mx-15 mx-10">
                    <form action="" class="flex flex-row gap-3">
                        <div class="flex-auto">
                            <input class="w-full shadow-inner outline-none p-4 rounded-sm"
                                type="text" name="address_street" placeholder="Search e.g. Toyota Avanza 2020 ">
                        </div>
                        <div class="">
                            <select class="w-full shadow-inner p-4 outline-none  rounded-sm" type="text"
                                name="address_number" placeholder="Semua">
                                <option value="Semua">Semua</option>
                                <option value="Semua">Baru</option>
                                <option value="Semua">Bekas</option>
                            </select>
                        </div>
                        <div class="">
                            <button
                                class="inline-flex w-full md:w-auto justify-center py-4 md:px-4 text-white font-semibold rounded-sm bg-teal-400"
                                type="submit">Cari Sekarang </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>

    {{-- cars type dan filter harga --}}
    <section class="section-type">
        <div class="container mb-10">
            <div class="mx-20">
                <h2 class="font-semibold md:text-left text-center text-2xl mb-3 md:mb-0">Lihat bedasarkan tipe</h2>
                <div class="grid lg:grid-cols-3 xl:grid-cols-6 sm:grid-cols-2 gap-2">
                    @foreach ($car_types as $car_type)
                        <div
                            class="flex flex-col md:justify-between border-2 h-32 rounded-md hover:shadow-lg hover:border-blue-500">
                            <a href="#" class="flex m-0">
                                <div class="mx-5 mt-5">
                                    <img class="rounded-md object-cover object-center w-full"
                                        src="{{ Storage::url($car_type->image) }}" alt="{{ $car_type->title }}">

                                </div>
                            </a>
                            <a href="" class="flex justify-center font-semibold pb-2">{{ $car_type->title }} </a>
                        </div>
                    @endforeach
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
                        @if ($car->galleries->count() != 0)
                            <div class="border-2 border-gray-50 rounded-lg shadow-md">
                                <a href="{{ route('detail', [$car->slug, $car->id]) }}">
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

                        @endif

                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
