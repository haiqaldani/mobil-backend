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
            <div class="mx-10 md:mx-20">
                <p class="text-center font-semibold font-sans text-gray-700 text-xl md:text-3xl">Temukan Mobil Baru dan
                    Mobil
                    Bekas Impian
                    Anda</p>
                <div class="mt-5 mb:mt-0">
                    <form action="" class="md:grid-cols-7 gap-3 grid grid-cols-1">
                        <div class="md:col-span-5">
                            <input class="w-full  outline-none p-4 focus:ring-4 ring-offset-blue-600 rounded-md" type="text"
                                name="address_street" placeholder="Search e.g. Toyota Avanza 2020 ">
                        </div>
                        <div class="">
                            <select class="w-full  p-4 outline-none focus:ring-4 ring-offset-blue-600 rounded-md"
                                type="text" name="address_number" placeholder="Semua">
                                <option value="Semua" class="p-2">Semua</option>
                                <option value="Semua" class="p-2">Baru</option>
                                <option value="Semua" class="p-2">Bekas</option>
                            </select>
                        </div>
                        <div class="">
                            <button
                                class="w-full justify-center py-3.5 px-4 focus:outline-none hover:shadow-md text-white font-medium rounded-md bg-blue-default"
                                type="submit">Cari Sekarang </button>
                        </div>

                    </form>
                </div>
            </div>


        </div>
    </section>

    {{-- cars type dan filter harga --}}
    {{-- <section class="section-type">
        <div class="container mb-10">
            <div class="md:mx-20 mx-10">
                <h2 class="font-medium md:text-left text-center text-xl md:text-2xl mb-5 text-gray-700">Lihat Bedasarkan
                    Tipe</h2>
                <div class="grid lg:grid-cols-5 xl:grid-cols-6 md:grid-cols-4 sm:grid-cols-3 grid-cols-2 gap-2">
                    @foreach ($car_types as $car_type)
                        <div
                            class="flex flex-col md:justify-between border-2 h-32 rounded-md hover:shadow-lg hover:border-blue-500">
                            <a href="#" class="flex m-0">
                                <div class="mx-5 mt-5">
                                    <img class="rounded-md object-cover object-center w-full"
                                        src="{{ Storage::url($car_type->image) }}" alt="{{ $car_type->title }}">

                                </div>
                            </a>
                            <a href="" class="flex justify-center font-medium pb-2">{{ $car_type->title }} </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section> --}}

    <section class="section-cars mb-10">
        <div class="container">
            <div class="md:mx-20 mx-10">
                <div class="grid grid-cols-2 justify-between">
                    <div class="">
                        <p class="text-left text-lg md:text-2xl font-semibold text-gray-700">Model Mobil
                            Terbaru</p>
                    </div>
                    <div class="justify-self-end">
                        <a href="{{ route('carsnew') }}"
                            class="bg-blue-default p-2 rounded-md text-white text-sm hover:shadow-md">
                            Lihat Semua Mobil >>
                        </a>
                    </div>
                </div>

                {{-- <div class="flex justify-center "> --}}
                <div class="">
                    <div class="my-3">
                        <div id="sync2" class="owl-carousel">
                            @foreach ($models as $model)
                                <div class="item cursor-default">
                                    {{-- <a href=""> --}}
                                    <div onclick="location.href='{{ route('model-detail', [$model->merks->slug, $model->slug_model]) }}'; "
                                        class="card hover:shadow-md m-1 rounded-md ">
                                        <div class="card-image">
                                            @if ($model->car_galleries->count() != null)
                                                <div class="h-36 bg-white rounded-t-md">
                                                    <img class="object-center object-cover  w-auto p-2 h-36"
                                                        src="{{ $model->car_galleries->count() ? Storage::url($model->car_galleries->first()->image) : '' }}"
                                                        alt="">
                                                </div>
                                            @else
                                                <div class="bg-gray-300 w-full rounded-t-md h-36">
                                                </div>
                                            @endif

                                        </div>
                                        <div class="card-body">
                                            <h3 class="font-medium text-gray-700 text-lg"> {{ $model->model }} </h3>
                                            <p class="text-gray-500 mb-3 font-light">
                                                @if ($model->car_variants->count() == 1)
                                                    Rp.
                                                    {{ $model->car_variants->count() ? number_format($model->car_variants->first()->price, 0, ',', '.') : '' }}
                                                @elseif ( $model->car_variants->count() == 0 )
                                                    Harga Belum Ada
                                                @else
                                                    Rp.
                                                    {{ $model->car_variants->count() ? number_format($model->car_variants->first()->price, 0, ',', '.') : '' }}
                                                    -
                                                    {{ $model->car_variants->count() ? number_format($model->car_variants->last()->price, 0, ',', '.') : '' }}
                                                @endif
                                            </p>
                                        </div>

                                    </div>
                                    {{-- </a> --}}
                                </div>
                            @endforeach

                        </div>
                    </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </section>

    <section class="section-promotion">
        <div class="container mb-10">
            <div class="md:mx-20 mx-10">
                <div class="border-transparent rounded-lg" style="background-image: url('{{ url('frontend/images/login.jpg') }}'); 
                                                                    background-repeat: no-repeat;
                                                                    background-size: 2000px;
                                                                    background-position: center;  ">
                    <div class="px-5 py-3">
                        <p class="uppercase font-medium text-sm text-white mb-10">Penawaran Mobil Baru</p>
                        <p class="text-white font-semibold text-4xl">
                            Penawaran Terbaik Untuk Anda
                        </p>
                        <p class="font-light text-white text-2xl mb-10">Mudah, Cepat, dan Praktis</p>
                        <div class="grid grid-cols-1 gap-3 md:gap-1 md:grid-cols-3 mb-5">
                            <div class="grid grid-cols-5 gap-3">
                                <div class="border-transparent bg-gray-400 bg-opacity-50 shadow-md rounded-md">
                                    <p class=" items-center text-center my-6 text-5xl text-white">1</p>
                                </div>
                                <div class="col-span-4">
                                    <p class="text-white text-lg font-medium">Tentukan mobil impian anda</p>
                                    <p class="text-gray-300 text-base font-normal">Kami memiliki semua informasi yang
                                        dibutuhkan termasuk gambar, ulasan, & harga</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-5 gap-3">
                                <div class="border-transparent bg-gray-400 bg-opacity-50 shadow-md rounded-md">
                                    <p class=" items-center text-center my-6 text-5xl text-white">2</p>
                                </div>
                                <div class="col-span-4">
                                    <p class="text-white text-lg font-medium">Tentukan mobil impian anda</p>
                                    <p class="text-gray-300 text-base font-normal">Kami memiliki semua informasi yang
                                        dibutuhkan termasuk gambar, ulasan, & harga</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-5 gap-3">
                                <div class="border-transparent bg-gray-400 bg-opacity-50 shadow-md rounded-md">
                                    <p class=" items-center text-center my-6 text-5xl text-white">3</p>
                                </div>
                                <div class="col-span-4">
                                    <p class="text-white text-lg font-medium">Tentukan mobil impian anda</p>
                                    <p class="text-gray-300 text-base font-normal">Kami memiliki semua informasi yang
                                        dibutuhkan termasuk gambar, ulasan, & harga</p>
                                </div>
                            </div>


                        </div>
                        <hr />
                        <div class="grid grid-cols-1 md:grid-cols-3 mt-5">
                            <div class="col-span-1 items-center py-3">
                                <a href="" class="px-12 md:px-3 py-3 bg-blue-default rounded-md text-white font-medium">Dapatkan Penawaran
                                    Mobil Baru</a>
                            </div>
                            <div class="col-span-1 md:col-span-2">
                                <div class="grid grid-cols-1 md:grid-cols-5">
                                    <div class="py-3 col-span-1 md:col-span-2">
                                        <p class="text-white md:text-left text-center">Temukan penawaran brand berikut</p>
                                    </div>
                                    <div class="col-span-1 md:col-span-3 grid grid-cols-8 ">
                                        <div class="bg-white py-3.5">
                                            <img src="{{ url('/frontend/images/logo_mobil.png') }}"
                                                class="h-5 object-contain" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="section-merk">
        <div class="container mb-10">
            <div class="md:mx-20 mx-10">
                <p class="md:text-left text-center text-xl font-semibold mb-5 text-gray-700">Cari Mobil Baru
                    Bedesarkan Merk</p>
                <div class="grid lg:grid-cols-8 md:grid-cols-5 sm:grid-cols-3 grid-cols-2 gap-3">
                    @foreach ($merks as $merk)
                        <a class="rounded-md bg-white hover:shadow-md" href="{{ route('merk-list', $merk->slug) }}">
                            <div class="m-2">
                                <img class="h-20 m-auto" src="{{ Storage::url($merk->image) }}" alt="">
                            </div>
                            <hr />
                            <p class="text-center font-medium text-gray-700 m-3">{{ $merk->merk }}</p>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection
@prepend('addon-script')
    <script>
        var sync1 = $("#sync1");
        sync1
            .owlCarousel({
                loop: true,
                nav: true,
                items: 1,
                dots: false,
                slidespeed: 1000,
                removeClass: true,
                responsiveRefreshRate: 200,
                navText: [
                    '<svg class="pl-2 w-5 h-8" width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #f7f7f7;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>',
                    '<svg class="pl-2 w-5 h-8" width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #f7f7f7;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'
                ]
            })
            .on("changed.owl.carousel");

        var sync2 = $("#sync2");
        sync2
            .owlCarousel({
                nav: true,
                margin: 15,
                dots: false,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true,
                        loop: false
                    },
                    600: {
                        items: 2,
                        nav: true,
                        loop: false
                    },
                    1000: {
                        items: 3,
                        nav: true,
                        loop: false
                    },
                    1200: {
                        items: 4,
                        nav: true,
                        loop: false
                    }
                },
                removeClass: true,
                // slidespeed: 1000,
                responsiveRefreshRate: 200,
                navText: [
                    '<svg class="pl-2 w-5 h-8" width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #f7f7f7;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>',
                    '<svg class="pl-2 w-5 h-8" width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #f7f7f7;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'
                ]
            })
            .on("changed.owl.carousel");
    </script>
@endprepend
