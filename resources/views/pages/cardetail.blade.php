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
                <div class="flex flex-col md:grid md:grid-cols-11 justify-center gap-5">
                    <div class="col-span-8 flex flex-col space-y-5">
                        <div class="bg-white border rounded-md border-gray-700">
                            <div class="m-5">

                                <h2 class="text-xl font-semibold col-span-2">{{ $item->merks->merk }} {{ $item->model }}
                                </h2>
                                <h2 class="text-3xl font-semibold">Rp.
                                    {{ $item->car_variants->count() ? Str::limit($item->car_variants->first()->price, 3, '') : '' }}
                                    -
                                    {{ $item->car_variants->count() ? Str::limit($item->car_variants->last()->price, 3, ' Juta') : '' }}
                                </h2>
                                <p class="text-gray-500 text-xs">Diperbaharui pada: 21 Maret 2021</p>
                                <div id="sync3" class="owl-carousel owl-theme mt-2">
                                    @foreach ($item->car_galleries as $gallery)
                                        <div class="item">
                                            <img class="rounded-md object-fill object-center"
                                                src="{{ Storage::url($gallery->image) }}"
                                                alt="{{ Str::limit($item->model) }}">
                                        </div>
                                    @endforeach
                                </div>
                                <div id="sync4" class="owl-carousel owl-theme mt-5">
                                    @foreach ($item->car_galleries as $gallery)
                                        
                                    @endforeach
                                    <div class="item rounded-md">
                                        <img class="object-fill object-center"
                                            src="{{ Storage::url($gallery->image) }}"
                                            alt="{{ Str::limit($item->model) }}">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col bg-white border rounded-md border-gray-700 md:w-21">
                            <div class="flex flex-row m-5 justify-around">
                                <div class="flex flex-col">
                                    <h3 class="text-sm">Transmisi</h3>
                                    <h4 class="text-lg font-semibold">
                                        @if ($item->car_variants->contains('fuel', 'Listrik'))
                                        Otomatis
                                        @elseif($item->car_variants->contains('transmission','Otomatis'))
                                            Otomatis
                                        @elseif($item->car_variants->contains('transmission','Manual'))
                                            Manual
                                        @elseif($item->car_variants->contains('transmission',['Otomatis','Manual']))
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
                        <div class="md:w-21 bg-white rounded-md">
                            <div class="relative mb-1">

                                <input type="checkbox" id="toggle1" class="toggle hidden" />
                                <label class="title block font-bold bg-white p-4 cursor-pointer" for="toggle1">
                                    Eksterior
                                </label>
                                <div class="content bg-white overflow-hidden">
                                    {{-- @foreach ($features->vehicle_features as $items)
                                        <p class="">{{ $items->feature }}</p>
                                    @endforeach --}}
                                </div>
                            </div>

                            <div class="relative mb-1">
                                <input type="checkbox" id="toggle2" class="toggle hidden" />
                                <label class="title block font-bold bg-white p-4 cursor-pointer" for="toggle2">
                                    Title goes here
                                </label>
                                <div class="content bg-white overflow-hidden">
                                    <p class="p-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                                </div>
                            </div>
                            <div class="relative mb-1">
                                <input type="checkbox" id="toggle3" class="toggle hidden" />
                                <label class="title block font-bold bg-white p-4 cursor-pointer" for="toggle3">
                                    Title goes here
                                </label>
                                <div class="content bg-white overflow-hidden">
                                    <p class="p-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col border rounded-md border-gray-700">
                            <div class="m-5">
                                <h3 class="font-semibold text-lg">Deskripsi</h3>
                                <p class="m-5">

                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="flex flex-col col-span-3 space-y-5">
                        <div class="flex flex-col bg-white border rounded-md border-gray-700">
                            <div class="flex flex-col m-5 space-y-3">
                                <a class="flex flex-wrap justify-center space-x-1 bg-green-500 text-center rounded-md py-3 hover:bg-green-700 text-base font-semibold text-white" target="_blank"
                                    href="https://api.whatsapp.com/send?phone=6285359186052&text=Halo,%20saya%20menemukan%20iklan%20Anda%20di%20Mobil.%20Saya%20ingin%20mengetahui%20lebih%20lanjut%20tentang%20{{ $item->model }}%20Terima%20kasih!%20"> <img class="w-6 h-6"
                                    src="{{ url('frontend/images/whatsapp.svg') }}" alt="">
                                    </svg><span>Via Whatsapp</span>
                                </a>
                                <p class="text-center">or</p>
                                <p class="text-lg font-medium text-center" >Via Pesan</p>
                                <p class="text-sm text-gray-500">Isi detail Anda dan dapatkan penawaran terbaik dari Mobilo</p>
                                <form action="{{ route('interest.store') }}" class="space-y-3" method="POST">
                                    @csrf
                                    <input type="hidden" name="car_model_id" id="car_model_id" value="{{ $item->id }}">
                                    <div class="flex flex-col">
                                        <label for="name">Nama <span class="font-light italic"> (Harus
                                                diisi)</span></label>
                                        <input type="text" class="p-3 border rounded focus:outline-none"
                                            placeholder="Masukkan nama anda" name="name" id="name">
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="phone_number">Nomor Handphone <span class="font-light italic">
                                                (Harus diisi)</span></label>
                                        <div class="flex flex-row">
                                            <p class="p-3">+62</p>
                                            <input type="text" name="phone_number"
                                                class="p-3 border rounded focus:outline-none w-full"
                                                placeholder="Cth: 85359186052" id="phone_number">

                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="city">Kota <span class="font-light italic"> (Harus
                                                diisi)</span></label>
                                        <input type="text" name="city" class="p-3 border rounded focus:outline-none"
                                            placeholder="Medan, Sumatera Utara" id="city">
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="city">Atur jadwal survey*</label>
                                        <input type="text" name="schedule"
                                            class="p-3 border rounded focus:outline-none" id="schedule"
                                            placeholder="Pilih jadwal berkunjung anda">
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
                                            class="focus:outline-none px-4 border w-full bg-green-500 text-white p-3 rounded hover:bg-teal-400">Confirm</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="flex flex-col bg-white border rounded-md border-gray-700">
                            <div class="flex flex-col m-5 space-y-5">
                                <div class="flex border-b border-gray-300">
                                    <h3 class="text-base font-semibold pb-2">Seller Information</h3>
                                </div>
                                <div class="flex flex-row">
                                    <div class="flex w-36 h-36"></div>
                                    {{-- <div class="flex flex-col">
                                        <h4 class="text-lg font-semibold">
                                            {{ $item->users->name }}
                                        </h4>
                                        <p class="text-sm">Penjual Terpercaya</p>
                                        <p class="text-sm">{{ $item->users->address }}, {{ $item->users->city }},
                                            {{ $item->users->province }}
                                        </p>
                                    </div> --}}
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
@endprepend