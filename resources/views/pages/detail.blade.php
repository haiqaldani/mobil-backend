@extends('layouts.app')

@section('title', 'Detail Mobil')

@section('content')
<header class="nav-header">
    <div class="container border-gray-200 border-t border-b border-opacity-50 border-">
        <div class="flex flex-row md:mx-15 mx-5 my-2">
            <a class="px-1 font-semibold text-blue-600 hover:text-black"
                href="{{ url('/') }}">Beranda </a>
            <p class="font-semibold"> &gt; </p>
            <a class="px-1 font-semibold  text-blue-600 hover:text-black" href="{{ url('/cars') }}">
                Mobil</a>
        </div>
    </div>
</header>

<main class="cars-detail">
    <div class="container bg-gray-300">
        <div class="flex md:flex-row flex-col justify-start md:space-x-5 space-y-5 md:space-y-0 md:mx-15 mx-5 py-8">
            <div class="flex flex-col space-y-5">
                <div class="flex flex-col bg-white border rounded-md border-gray-700 md:w-21">
                    <div class="flex flex-col m-5">
                        <h2 class="text-lg">2020 Suzuki Carry PROMO SUZUKI AKHIR TAHUN PICK UP DP 2 JUTA, ANGSURAN
                            RINGAN</h2>
                        <div class="flex flex-row space-x-3">
                            <h3 class="text-xl font-bold">Rp. 85.000.000</h3>
                            <h3 class="text-xl">Nego</h3>
                        </div>
                        <div id="sync2" class="owl-carousel owl-theme w-3/4">
                            <div class="item " style="height: 65vh;">
                                <div class="h-full bg-blue-900">
                                </div>
                            </div>
                            <div class="item " style="height: 65vh;">
                                <div class="h-full bg-green-900">
                                </div>
                            </div>
                            <div class="item " style="height: 65vh;">
                                <div class="h-full bg-green-900">
                                </div>
                            </div>
                            <div class="item " style="height: 65vh;">
                                <div class="h-full bg-green-900">
                                </div>
                            </div>
                        </div>
                        <div id="sync3" class="owl-carousel owl-theme">
                            <div class="item h-32">
                                <div class="h-full bg-blue-900">
                                </div>
                            </div>
                            <div class="item h-32">
                                <div class="h-full bg-green-900">
                                </div>
                            </div>
                            <div class="item h-32">
                                <div class="h-full bg-green-900">
                                </div>
                            </div>
                            <div class="item h-32">
                                <div class="h-full bg-green-900">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col bg-white border rounded-md border-gray-700 md:w-21">
                    <div class="flex flex-row m-5 justify-around">
                        <div class="flex flex-col">
                            <h3 class="text-sm">Transmisi</h3>
                            <h4 class="text-lg font-semibold">Otomatis</h4>
                        </div>
                        <div class="flex flex-col">
                            <h3 class="text-sm">Bahan Bakar</h3>
                            <h4 class="text-lg font-semibold">Bensin</h4>
                        </div>
                        <div class="flex flex-col">
                            <h3 class="text-sm">Kapasitas Mesin</h3>
                            <h4 class="text-lg font-semibold">1200cc</h4>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col bg-white border rounded-md border-gray-700 md:w-21">
                    <div class="flex flex-col m-5">
                        <div class="border-b">
                            <h3 class="text-lg font-bold pb-2">Deskripsi dari Penjual</h3>
                        </div>
                        <div class="">
                            <p class="m-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ultrices porttitor lacus,
                                sed ullamcorper nisi bibendum vel. Pellentesque volutpat nunc sed nunc varius, a
                                malesuada metus mattis. Aenean sodales, nunc eget porta lacinia, orci nibh auctor
                                sapien, sed malesuada ipsum arcu vitae justo. Cras auctor, velit sit amet posuere
                                convallis, tortor mauris posuere ligula, ut elementum nulla nisl vitae arcu. Morbi at
                                posuere sapien. Vestibulum sed quam enim. Donec tempor eu enim sed volutpat. Morbi
                                imperdiet tincidunt mauris.

                                Duis id sapien ornare turpis pulvinar luctus sed in elit. Suspendisse condimentum, nisi
                                ut porta vulputate, ex lacus molestie augue, ac scelerisque nunc nisl consectetur enim.
                                Fusce orci libero, facilisis in ante non, tempor pellentesque orci. Morbi a auctor
                                dolor, a malesuada orci. Quisque eu felis id odio tincidunt efficitur id vel leo.
                                Phasellus vel velit a orci blandit semper malesuada id quam. Quisque euismod lobortis
                                mauris, in facilisis turpis imperdiet vitae. Praesent erat ligula, suscipit id leo
                                vitae, auctor venenatis lectus. Aenean vel lacus pretium, molestie arcu id, eleifend
                                magna. Maecenas volutpat magna quis justo efficitur, vitae finibus metus tincidunt.
                                Maecenas ac odio sit amet odio vehicula maximus. Vestibulum mattis lacus condimentum
                                augue hendrerit laoreet. Quisque pellentesque augue ac dui interdum luctus. Orci varius
                                natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent non
                                finibus velit, ut blandit augue.

                                Duis hendrerit, velit eget sagittis aliquet, elit velit facilisis tortor, non mattis
                                ante tellus ut mauris. Duis id accumsan leo. Maecenas venenatis libero in ligula
                                porttitor, nec gravida ante volutpat. Suspendisse egestas nisl sed mi eleifend, sed
                                lacinia nisi pellentesque. Aenean dictum, sapien quis finibus tincidunt, augue ipsum
                                blandit augue, eu semper enim dui in dui. Donec efficitur ipsum non facilisis tincidunt.
                                Vivamus tempor nunc sit amet ipsum feugiat feugiat. Aenean nulla risus, varius eu erat
                                ac, mollis commodo nisl. Pellentesque euismod, ante ultrices elementum tempus, sapien
                                felis ultrices nisi, id consequat quam arcu id purus.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col space-y-5">
                <div class="flex flex-col bg-white border rounded-md border-gray-700">
                    <div class="flex flex-col m-5 space-y-5  md:w-96">
                        <button
                            class="bg-green-400 rounded-md py-3 hover:bg-green-500 text-base font-semibold text-white">
                            Lihat No Telepon
                        </button>
                        <button
                            class="bg-green-300 rounded-md py-3 hover:bg-green-400 text-base font-semibold text-white">
                            Whatsapp Penjual
                        </button>
                    </div>
                </div>
                <div class="flex flex-col bg-white border rounded-md border-gray-700">
                    <div class="flex flex-col m-5 space-y-5 w-96">
                        <div class="flex border-b border-gray-300">
                            <h3 class="text-base font-semibold pb-2">Seller Information</h3>
                        </div>
                        <div class="flex flex-row">
                            <div class="flex w-32 h-32"></div>
                            <div class="flex flex-col">
                                <h4 class="text-lg font-semibold">
                                    Haiqal Dealer
                                </h4>
                                <p class="text-sm">Penjual Terpercaya</p>
                                <p class="text-sm">Jalan Cut Nyak Dien No. 146</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
