@extends('layouts.app')

@section('title', 'Mobil Baru')

@section('content')
    <main class="merk-main my-10">
        <div class="container">
            <div class="grid justify-center md:mx-20 mx-10 space-y-5">
                <h1 class="text-4xl font-semibold text-center text-gray-700">Pilih Merk</h1>
                <p class="text-center font-light text-gray-700">
                    Pilih salah merk berikut ini untuk mendapat info mobil yang lebih lengkap.
                </p>
                <div class="grid md:grid-cols-6 grid-cols-2 gap-7 justify-start">
                    @foreach ($merks as $merk)
                        <div class="bg-white rounded-md p-2 hover:shadow-md">
                            <a href="{{ route('merk-list', $merk->slug) }}">
                                <div class="m-3">
                                    {{-- <img class="object-scale-down" src="{{ url('storage/assets/merk/daihatsu.png') }}" alt=""> --}}
                                    <img class="object-scale-down h-24" src="{{ Storage::url($merk->image) }}" alt="">
                                </div>
                                <p class="font-medium text-center text-gray-800 w-full">
                                    {{ $merk->merk }}
                                </p>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </main>

    <section class="section-cars mb-10">
        <div class="container">
            <div class="md:mx-20 mx-10">
                <p class="md:text-left text-center text-xl md:text-2xl font-semibold mb-5 text-gray-600">Model Mobil
                    Terbaru</p>
                {{-- <div class="flex justify-center "> --}}
                <div class="">
                    <div class="my-3">
                        <div id="sync2" class="owl-carousel">
                            @foreach ($models as $model)
                                <div class="item">
                                    <div class="card m-1 hover:shadow-md cursor-pointer rounded-md"
                                        onclick="location.href='{{ route('model-detail', [$model->merks->slug, $model->slug_model]) }}'; ">
                                        <div class="card-image">
                                            @if ($model->car_galleries->count() != null)
                                                <div class="h-36 bg-white rounded-t-md ">
                                                    <img class="object-cover object-center max-h-36 my-auto p-1"
                                                        src="{{ $model->car_galleries->count() ? Storage::url($model->car_galleries->first()->image) : '' }}"
                                                        alt="">
                                                </div>

                                            @else
                                                <div class="bg-gray-300 w-full md:w-80 rounded-t-md h-36">
                                                </div>
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <h3 class="font-semibold text-lg text-gray-800">{{ $model->model }}</h3>
                                            <p class="text-gray-500 mb-3 text-sm">
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
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
@prepend('addon-script')
    <script>
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
