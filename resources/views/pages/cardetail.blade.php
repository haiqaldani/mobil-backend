@extends('layouts.app')

@section('title', 'Detail Mobil')

@section('content')
    <header class="nav-header">
        <div class="container border-gray-200 border-b border-opacity-50">
            <div class="flex flex-row md:mx-20 mx-10 my-2 space-x-2 font-medium">
                <a class="px-1 text-blue-600 hover:text-black" href="{{ url('/') }}">Beranda</a>
                <p class=""> &gt; </p>
                <a class="px-1 text-blue-600 hover:text-black" href="{{ url('/cars') }}">Mobil</a>
                <p class=""> &gt; </p>
                <p class=""> {{ $item->model }}</p>
            </div>
        </div>
    </header>

    <main class="cars-detail">
        <div class="container my-5 bg-gray-soft">
            <div class="md:mx-20 mx-10">
                <div class="flex flex-col md:grid md:grid-cols-11 justify-center gap-5">
                    <div class="col-span-8 flex flex-col space-y-5">
                        <div class="bg-white shadow-md rounded-md ">
                            <div class="m-5">
                                <div class="grid grid-cols-5">
                                    <div class="flex flex-col col-span-4">
                                        <p class="text-xl text-gray-800">{{ $item->merks->merk }} {{ $item->model }}
                                        </p>
                                        <p class="text-3xl font-medium">Rp.
                                            {{ $item->car_variants->count() ? number_format($item->car_variants->first()->price, 0, ',', '.') : '' }}
                                            -
                                            {{ $item->car_variants->count() ? number_format($item->car_variants->last()->price, 0, ',', '.') : '' }}
                                        </p>
                                        <p class="text-gray-500 text-xs">Diperbaharui pada: 21 Maret 2021</p>
                                    </div>
                                    <div class="text-right">
                                        @if ($item->favoriters != null)
                                        <form action="{{ route('deleteFavorite', $item->favoriters->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="focus:outline-none">
                                                <span style="font-size: 1.5em; color: red; ">
                                                    <i class="fas fa-heart"></i>
                                                </span></button>
                                        </form>
                                        @else
                                        <form action="{{ route('favoriteRequest', Auth::user()->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="favoriteable_id" value="{{ $item->id }}">
                                            <button type="submit" class="focus:outline-none">
                                                <span style="font-size: 1.5em; color: red; ">
                                                    <i class="far fa-heart"></i>
                                                </span></button>
                                        </form>
                                        @endif
                                       
                                    </div>
                                </div>
                                <div id="sync3" class="owl-carousel owl-theme mt-2">
                                    @foreach ($item->car_galleries as $gallery)
                                        <div class="item">
                                            <img class="rounded-md object-center object-cover w-auto h-96"
                                                src="{{ Storage::url($gallery->image) }}"
                                                alt="{{ Str::limit($item->model) }}">
                                        </div>
                                    @endforeach
                                </div>
                                <div id="sync4" class="owl-carousel owl-theme mt-5">
                                    @foreach ($item->car_galleries as $gallery)
                                        <div class="item rounded-md">
                                            <img class="rounded-md object-center object-cover w-auto h-28"
                                                src="{{ Storage::url($gallery->image) }}"
                                                alt="{{ Str::limit($item->model) }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col bg-white shadow-md rounded-md md:w-21">
                            <div class="flex flex-row m-5 justify-around">
                                <div class="flex flex-col">
                                    <h3 class="text-sm">Transmisi</h3>
                                    <h4 class="text-lg font-semibold">
                                        @if ($item->car_variants->contains('fuel', 'Listrik'))
                                            Otomatis
                                        @elseif($item->car_variants->contains('transmission','Automatic'))
                                            Otomatis
                                        @elseif($item->car_variants->contains('transmission','Manual'))
                                            Manual
                                        @elseif($item->car_variants->contains('transmission',['Automatic','Manual']))
                                            Otomatis
                                            Manual
                                        @else
                                            Tidak Ada
                                        @endif
                                    </h4>
                                </div>
                                <div class="flex flex-col">
                                    <h3 class="text-sm">Bahan Bakar</h3>
                                    <h4 class="text-lg font-semibold">
                                        @if ($item->car_variants->contains('fuel', 'Listrik'))
                                            Listrik
                                        @elseif ($item->car_variants->contains('fuel','Bensin'))
                                            Bensin
                                        @elseif ($item->car_variants->contains('fuel','Diesel'))
                                            Diesel
                                        @elseif ($item->car_variants->contains('fuel','Hybrid'))
                                            Hybrid
                                        @elseif ($item->car_variants->contains('fuel',
                                            ['Bensin','Diesel']))
                                            Bensin
                                            Diesel
                                        @else
                                            Tidak Ada
                                        @endif
                                    </h4>
                                </div>
                                <div class="flex flex-col">
                                    <h3 class="text-sm">Kapasitas Mesin</h3>
                                    <h4 class="text-lg font-semibold">
                                        {{ $item->car_variants->count() ? $item->car_variants->first()->cc : '' }}cc
                                    </h4>
                                </div>
                                @if ($item->kilometers != null)
                                    <div class="flex flex-col">
                                        <h3 class="text-sm">Jarak Tempuh</h3>
                                        <h4 class="text-lg font-semibold">{{ $item->kilometers }}km</h4>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="flex flex-col shadow-md rounded-md bg-white">
                            <div class="m-5">
                                <h3 class="font-semibold text-lg">Daftar Harga {{ $item->model }}</h3>
                                <div id="sync5" class="owl-carousel owl-theme">
                                    @foreach ($item->car_variants as $items)
                                        <div class="item rounded-md p-2 border border-gray-200 hover:shadow-md my-2 bg-white">
                                            <p class="text-base">Edisi : {{ $items->edition }}</p>
                                            <p class="text-base font-semibold">Rp. {{ number_format($items->price, 0, ',', '.') }}</p>
                                            <div class="grid grid-cols-3 text-xs mt-1">
                                                <div class="flex flex-row space-x-1">
                                                    <p>CC :</p>
                                                    <p> {{ $items->cc }}</p>
                                                </div>
                                                <div class="col-span-2 flex flex-row space-x-1">
                                                    <p>Bahan Bakar :</p>
                                                    <p> {{ $items->fuel }}</p>
                                                </div>
                                                <div class="flex flex-row space-x-1">
                                                    <p>Varian :</p>
                                                    <p> {{ $items->variant }}</p>
                                                </div>

                                                <div class="col-span-2 flex flex-row space-x-1">
                                                    <p>Transmisi :</p>
                                                    <p> {{ $items->transmission }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <div class="flex flex-col shadow-md rounded-md bg-white">
                            <div class="m-5">
                                <h3 class="font-semibold text-lg">Deskripsi</h3>
                                {!! $color->description !!}
                            </div>

                        </div>
                        <div class="flex flex-col shadow-md rounded-md bg-white">
                            <div class="m-5">
                                <h3 class="font-semibold text-lg">Warna Tersedia</h3>
                                <div id="sync6" class="owl-carousel owl-theme text-center mt-3">
                                    @foreach ($color->colors as $i)
                                        <div class="border py-2 rounded-md">
                                            <p>{{ $i->color_name }}</p>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col col-span-3 space-y-5">
                        <div class="flex flex-col bg-white rounded-md shadow-md">
                            <div class="flex flex-col m-5 space-y-3">
                                <a class="flex flex-wrap justify-center space-x-1 bg-green-500 text-center rounded-md py-3 hover:bg-green-700 text-base font-semibold text-white"
                                    target="_blank"
                                    href="https://api.whatsapp.com/send?phone=6285359186052&text=Halo,%20saya%20menemukan%20iklan%20Anda%20di%20Mobil.%20Saya%20ingin%20mengetahui%20lebih%20lanjut%20tentang%20{{ $item->model }}%20Terima%20kasih!%20">
                                    <img class="w-6 h-6" src="{{ url('frontend/images/whatsapp.svg') }}" alt="">
                                    </svg><span>Via Whatsapp</span>
                                </a>
                                <p class="text-center">or</p>
                                <p class="text-lg font-medium text-center">Via Pesan</p>
                                <p class="text-sm text-gray-500">Isi detail Anda dan dapatkan penawaran terbaik dari Mobilo
                                </p>
                                <form action="{{ route('interest.store') }}" class="space-y-3" method="POST">
                                    @csrf
                                    @auth
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    @endauth
                                        <input type="hidden" name="car_model_id" id="car_model_id" value="{{ $item->id }}">
                                    <div class="flex flex-col">
                                        <label for="name">Nama <span class="font-light italic"> (Harus
                                                diisi)</span></label>
                                        <input type="text" class="p-3 border rounded-md focus:outline-none"
                                            placeholder="Masukkan nama anda" name="name" id="name" @auth value="@if (Auth::user()->full_name != null) {{ Auth::user()->full_name }} @endif" @endauth>
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="phone_number">Nomor Handphone <span class="font-light italic">
                                                (Harus diisi)</span></label>
                                        <div class="flex flex-row">
                                            <p class="p-3 bg-blue-600 rounded-l-md text-white">+62</p>
                                            <input type="text" name="phone_number"
                                                class="p-3 border rounded-r-md focus:outline-none w-full"
                                                placeholder="Cth: 85359186052" id="phone_number" @auth value="@if (Auth::user()->phone_number != null) {{ Auth::user()->phone_number }} @endif" @endauth>

                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="city">Kota <span class="font-light italic"> (Harus
                                                diisi)</span></label>
                                        <input type="text" name="city" class="p-3 border rounded-md focus:outline-none"
                                            placeholder="Medan" id="city" @auth value="@if (Auth::user()->city != null) {{ Auth::user()->city }} @endif" @endauth>
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="city">Atur jadwal survey*</label>
                                        <input type="text" name="schedule" class="p-3 border rounded-md focus:outline-none"
                                            id="schedule" placeholder="Pilih jadwal berkunjung anda">
                                    </div>

                                    <div class="flex flex-col">
                                        <p class="mb-2">Rencana Pembelian</p>
                                        <div class="grid grid-cols-2">

                                            <div class="">
                                                <input type="radio" id="payment" name="payment" value="Kredit">
                                                <label for="payment">Kredit</label>
                                            </div>
                                            <div class="">
                                                <input type="radio" id="payment" name="payment" value="Tunai">
                                                <label for="payment">Tunai</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="flex">
                                        {{-- <button
                                            class="focus:outline-none modal-close px-4 bg-gray-400 p-3 rounded-lg text-black hover:bg-gray-300">Cancel</button> --}}
                                        <button type="submit"
                                            class="focus:outline-none px-4 border w-full bg-green-500 text-white p-3 rounded-md hover:bg-teal-400">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- <div class="flex flex-col bg-white border rounded-md border-gray-700">
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
                        </div> --}}
                    </div>
                </div>

            </div>
    </main>

@endsection
@prepend('addon-script')
    {{-- <script>
        $("#schedule").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
   </script> --}}

    <script>
        jQuery('#schedule').datetimepicker();

    </script>

    <script>
        var sync3 = $("#sync3");
        var sync4 = $("#sync4");
        var slidesPerPage = 4; //globaly define number of elements per page
        var syncedSecondary = true;

        sync3
            .owlCarousel({
                items: 1,
                slideSpeed: 2000,
                // autoWidth: true,
                nav: true,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200,
                navText: [
                    '<svg class="ml-1.5"  width="50%" height="50%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #ffff;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>',
                    '<svg class="ml-2" width="50%" height="50%" viewBox="0 0 11 20" version="1.1"><path style="stroke: #ffff ;fill:none;stroke-width: 1px;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'
                ]
            })
            .on("changed.owl.carousel", syncPosition);

        sync4
            .on("initialized.owl.carousel", function() {
                sync4
                    .find(".owl-item")
                    .eq(0)
                    .addClass("current");
            })
            .owlCarousel({
                items: slidesPerPage,
                dots: false,
                nav: true,
                margin: 5,
                smartSpeed: 200,
                slideSpeed: 500,
                slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                responsiveRefreshRate: 100,
                navText: [
                    '<svg class="ml-1.5"  width="50%" height="50%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #ffff;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>',
                    '<svg class="ml-2" width="50%" height="50%" viewBox="0 0 11 20" version="1.1"><path style="stroke: #ffff ;fill:none;stroke-width: 1px;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'
                ]
            })
            .on("changed.owl.carousel", syncPosition2);

        function syncPosition(el) {
            //if you set loop to false, you have to restore this next line
            //var current = el.item.index;

            //if you disable loop you have to comment this block
            var count = el.item.count - 1;
            var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

            if (current < 0) {
                current = count;
            }
            if (current > count) {
                current = 0;
            }

            //end block

            sync4
                .find(".owl-item")
                .removeClass("current")
                .eq(current)
                .addClass("current");
            var onscreen = sync4.find(".owl-item.active").length - 1;
            var start = sync4
                .find(".owl-item.active")
                .first()
                .index();
            var end = sync4
                .find(".owl-item.active")
                .last()
                .index();

            if (current > end) {
                sync4.data("owl.carousel").to(current, 100, true);
            }
            if (current < start) {
                sync4.data("owl.carousel").to(current - onscreen, 100, true);
            }
        }

        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                sync3.data("owl.carousel").to(number, 100, true);
            }
        }

        sync4.on("click", ".owl-item", function(e) {
            e.preventDefault();
            var number = $(this).index();
            sync3.data("owl.carousel").to(number, 300, true);
        });
        var sync1 = $("#sync5");
        sync1
            .owlCarousel({
                loop: false,
                nav: true,
                items: 3,
                margin: 5,
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

        var sync1 = $("#sync6");
        sync1
            .owlCarousel({
                loop: false,
                nav: true,
                items: 5,
                margin: 5,
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

    </script>
@endprepend
