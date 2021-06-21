@extends('layouts.app')

@section('title', 'Detail Mobil')

@section('content')
    <header class="nav-header">
        <div class="container border-gray-200 border-b border-opacity-50">
            <div class="flex flex-row md:mx-20 mx-10 my-2 space-x-2">
                <a class="px-1 font-semibold text-blue-600 hover:text-black" href="{{ url('/') }}">Beranda</a>
                <p class="font-semibold"> &gt; </p>
                <a class="px-1 font-semibold  text-blue-600 hover:text-black" href="{{ url('/cars') }}">Mobil</a>
                <p class="font-semibold"> &gt; </p>
                <p class="font-semibold"> {{ $item->title }}</p>
            </div>
        </div>
    </header>

    <main class="cars-detail">
        <div class="container my-5">
            <div class="md:mx-20 mx-10">
                <div class="flex flex-col md:grid md:grid-cols-3 justify-center gap-5">
                    <div class="col-span-2 flex flex-col space-y-5">
                        <div class="bg-white border rounded-md border-gray-700">
                            <div class="m-5">
                                <div class="grid grid-cols-3">
                                    <h2 class="text-xl font-semibold col-span-2">{{ $item->title }}</h2>
                                    <h2 class="text-xl font-semibold text-blue-600 text-right">Rp. {{ number_format($item->price, 0, ',', '.') }}</h2>
                                </div>
                                <p class="text-gray-500 text-xs">Diperbaharui pada: 21 Maret 2021</p>

                                <div class=" space-x-3">

                                    <h3 class="text-xl">{{ $item->price_description }}</h3>
                                </div>
                                <div id="sync3" class="owl-carousel owl-theme mt-2">
                                    @foreach ($item->galleries as $gallery)
                                        <div class="item">
                                            <img class="rounded-md object-center object-cover w-auto p-2 h-96"
                                                src="{{ Storage::url($gallery->image) }}"
                                                alt="{{ Str::limit($item->title, 25) }}">
                                        </div>
                                    @endforeach
                                </div>
                                <div id="sync4" class="owl-carousel owl-theme mt-5">
                                    @foreach ($item->galleries as $gallery)
                                        <div class="item">
                                            <img class="rounded-md object-center object-cover w-auto h-28"
                                                src="{{ Storage::url($gallery->image) }}"
                                                alt="{{ Str::limit($item->title, 25) }}">

                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{-- <div class="md:w-21 bg-white rounded-md">
                            <div class="relative mb-1">

                                <input type="checkbox" id="toggle1" class="toggle hidden" />
                                <label class="title block font-bold bg-white p-4 cursor-pointer" for="toggle1">
                                    Eksterior
                                </label>
                                <div class="content bg-white overflow-hidden">
                                    @foreach ($features->vehicle_features as $items)
                                        <p class="">{{ $items->feature }}</p>
                                    @endforeach
                                </div>
                            </div>

                           
                        </div> --}}
                        <div class="flex flex-col border rounded-md border-gray-700">
                            <div class="m-5">
                                <h3 class="font-semibold text-lg">Deskripsi</h3>
                                <p class="my-5">
                                    {!! $item->description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-5">
                        <div class="flex flex-col bg-white border rounded-md border-gray-700">
                            <div class="flex flex-col m-5 space-y-5">
                                <button
                                    class="bg-green-400 rounded-md py-3 hover:bg-green-500 text-base font-semibold text-white">
                                    Lihat No Telepon
                                </button>
                                <a class="flex flex-wrap justify-center space-x-1 bg-green-300 text-center rounded-md py-3 hover:bg-green-400 text-base font-semibold text-white"
                                    href="https://web.whatsapp.com/send?phone={{ $item->users->phone_number }}&text=Halo,%20saya%20menemukan%20iklan%20Anda%20di%20Mobil.%20Saya%20ingin%20mengetahui%20lebih%20lanjut%20tentang%20{{ $item->title }}%20Terima%20kasih!%20{{ $wa }}">
                                    <img class="w-6 h-6" src="{{ url('frontend/images/whatsapp.svg') }}" alt="">
                                    </svg><span>Whatsapp Penjual</span>
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col bg-white border rounded-md border-gray-700">
                            <div class="flex flex-col m-5">
                                <div class="flex border-b border-gray-300">
                                    <h3 class="text-base font-semibold pb-2">Seller Information</h3>
                                </div>
                                <div class="flex flex-row m-2">
                                    <div class="flex">
                                        @if ($item->profil_picture == null)
                                            <img src="{{ Storage::url($item->users->profil_picture) }}" alt=""
                                                class="rounded-full h-28 w-28 object-cover object-center">
                                        @else
                                            <img src="https://source.unsplash.com/QAB-WJcbgJk/60x60" alt="" class="">
                                        @endif

                                    </div>
                                    <div class="grid place-items-stretch">
                                        <h4 class="text-lg font-semibold">
                                            {{ $item->users->name }}
                                        </h4>
                                        <div class="m-3">
                                            <p class="font-medium">{{ $item->users->full_name }}</p>
                                            <p class="text-sm">{{ $item->users->address }}, {{ $item->users->city }},
                                                {{ $item->users->province }}
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col bg-white border rounded-md border-gray-700">
                            <div class="flex flex-col m-5 space-y-4">
                                <div class="flex border-b border-gray-300">
                                    <h3 class="text-base font-semibold pb-2">Spesifikasi</h3>
                                </div>
                                <div class="flex flex-col">
                                    <div class="grid grid-cols-2 border-b pb-2">
                                        <p class="font-semibold text-sm ">Tipe Mobil :</p>
                                        <p class="text-right text-sm">{{ $item->condition }}</p>
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="grid grid-cols-2 border-b pb-2">
                                        <p class="font-semibold text-sm ">Merk :</p>
                                        <p class="text-right text-sm">Honda</p>
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="grid grid-cols-2 border-b pb-2">
                                        <p class="font-semibold text-sm ">Model :</p>
                                        <p class="text-right text-sm">{{ $item->car_models->model }}</p>
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="grid grid-cols-2 border-b pb-2">
                                        <p class="font-semibold text-sm ">Varian :</p>
                                        <p class="text-right text-sm">{{ $item->car_variants->variant }}</p>
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="grid grid-cols-2 border-b pb-2">
                                        <p class="font-semibold text-sm ">Tahun :</p>
                                        <p class="text-right text-sm">{{ $item->car_year }}</p>
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="grid grid-cols-2 border-b pb-2">
                                        <p class="font-semibold text-sm ">CC :</p>
                                        <p class="text-right text-sm">{{ $item->car_variants->cc }} cc</p>
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="grid grid-cols-2 border-b pb-2">
                                        <p class="font-semibold text-sm ">Transmisi :</p>
                                        <p class="text-right text-sm">{{ $item->car_variants->transmission }}</p>
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="grid grid-cols-2 border-b pb-2">
                                        <p class="font-semibold text-sm ">Jarak Tempuh :</p>
                                        <p class="text-right text-sm">{{ number_format($item->kilometers, 0, ',', '.') }}
                                            Km</p>
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="grid grid-cols-2 border-b pb-2">
                                        <p class="font-semibold text-sm ">Warna :</p>
                                        <p class="text-right text-sm">{{ $item->color }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
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

    </script>
@endprepend
