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
            <div class="border-transparent md:mx-20 mx-10 py-5 bg-blue-600 rounded-md">
                <h1 class="text-center font-bold font-sans text-white text-xl md:text-3xl">Temukan Mobil Baru dan Mobil
                    Bekas Impian
                    Anda</h1>
                <div class="mt-5 mb:mt-0 lg:mx-15 mx-10">
                    <form action="" class="flex md:flex-row gap-3 flex-col">
                        <div class="flex-auto">
                            <input class="w-full shadow-inner outline-none p-4 rounded-sm" type="text" name="address_street"
                                placeholder="Search e.g. Toyota Avanza 2020 ">
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
                                class=" w-full justify-center py-4 md:px-4 text-white font-semibold rounded-sm bg-green-400"
                                type="submit">Cari Sekarang </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- cars type dan filter harga --}}
    <section class="section-type">
        <div class="container mb-10">
            <div class="md:mx-20 mx-10">
                <h2 class="font-semibold md:text-left text-center text-xl md:text-2xl mb-5 text-gray-600">Lihat Bedasarkan
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
                            <a href="" class="flex justify-center font-semibold pb-2">{{ $car_type->title }} </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="section-cars mb-10">
        <div class="container">
            <div class="md:mx-20 mx-10">
                <div class="grid grid-cols-2 justify-between">
                    <h2 class="md:text-left text-center text-xl md:text-2xl font-semibold mb-5 text-gray-600">Model Mobil
                        Terbaru</h2>
                    <div class="justify-self-end">
                        <a href="{{ route('carsnew') }}"
                            class="border-blue-600 border p-2 rounded text-sm hover:bg-blue-600 hover:text-white">
                            Tampilkan Semua Mobil >>
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
                                        class="card hover:bg-black hover:bg-opacity-25 m-1 shadow-md ">
                                        <div class="ring-1 rounded ring-gray-300">
                                            <div class="card-image">
                                                <img class="object-fill object-center rounded"
                                                    src="{{ url('/frontend/images/login.jpg') }}" alt="">
                                            </div>
                                            <div class="card-body">
                                                <h3 class="font-semibold text-lg"> {{ $model->model }} </h3>
                                                <p class="text-gray-500 mb-3">
                                                    @if ($model->car_variants->count() == 1)
                                                        Rp.
                                                        {{ $model->car_variants->count() ? $model->car_variants->first()->price : '' }}
                                                    @elseif ( $model->car_variants->count() == 0 )
                                                        Harga Belum Ada
                                                    @else
                                                        Rp.
                                                        {{ $model->car_variants->count() ? $model->car_variants->first()->price : '' }}
                                                        -
                                                        {{ $model->car_variants->count() ? $model->car_variants->last()->price : '' }}
                                                    @endif
                                                </p>
                                            </div>
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
                        <h2 class="text-white font-bold text-4xl">
                            Penawaran Terbaik Untuk Anda
                        </h2>
                        <p class="font-light text-white text-2xl mb-10">Mudah, Cepat, dan Praktis</p>
                        <div class="grid grid-cols-3 mb-5">
                            <div class="grid grid-cols-5 gap-3">
                                <div class="border-transparent bg-gray-400 bg-opacity-50 shadow-md rounded-md">
                                    <p class=" items-center text-center my-6 text-5xl text-white">1</p>
                                </div>
                                <div class="col-span-4">
                                    <p class="text-white text-lg font-semibold">Tentukan mobil impian anda</p>
                                    <p class="text-gray-300 text-base font-normal">Kami memiliki semua informasi yang
                                        dibutuhkan termasuk gambar, ulasan, & harga</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-5 gap-3">
                                <div class="border-transparent bg-gray-400 bg-opacity-50 shadow-md rounded-md">
                                    <p class=" items-center text-center my-6 text-5xl text-white">2</p>
                                </div>
                                <div class="col-span-4">
                                    <p class="text-white text-lg font-semibold">Tentukan mobil impian anda</p>
                                    <p class="text-gray-300 text-base font-normal">Kami memiliki semua informasi yang
                                        dibutuhkan termasuk gambar, ulasan, & harga</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-5 gap-3">
                                <div class="border-transparent bg-gray-400 bg-opacity-50 shadow-md rounded-md">
                                    <p class=" items-center text-center my-6 text-5xl text-white">3</p>
                                </div>
                                <div class="col-span-4">
                                    <p class="text-white text-lg font-semibold">Tentukan mobil impian anda</p>
                                    <p class="text-gray-300 text-base font-normal">Kami memiliki semua informasi yang
                                        dibutuhkan termasuk gambar, ulasan, & harga</p>
                                </div>
                            </div>


                        </div>
                        <hr />
                        <div class="grid grid-cols-3 mt-5 mb-3">
                            <div class="items-center py-3">
                                <a href="" class="px-3 py-3 bg-blue-600 rounded text-white font-medium">Dapatkan Penawaran
                                    Mobil Baru</a>
                            </div>
                            <div class="col-span-2">
                                <div class="grid grid-cols-3">
                                    <div class="py-3">
                                        <p class="text-white">Temukan penawaran brand berikut</p>
                                    </div>
                                    <div class="col-span-2 grid grid-cols-8 ">
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
                <h2 class="md:text-left text-center text-xl md:text-2xl font-semibold mb-5 text-gray-600">Cari Mobil Baru
                    Bedesarkan Merk</h2>
                <div class="grid lg:grid-cols-8 md:grid-cols-5 sm:grid-cols-3 grid-cols-2 gap-3">
                    @foreach ($merks as $merk)
                        <a class="border rounded" href="{{ route('merk-list', $merk->slug) }}">
                            <div class="m-2">
                                <img class="h-20 m-auto" src="{{ Storage::url($merk->image) }}" alt="">
                            </div>
                            <hr />
                            <p class="text-center font-medium text-gray-600 m-3">{{ $merk->merk }}</p>
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
