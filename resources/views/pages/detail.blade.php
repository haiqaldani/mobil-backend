@extends('layouts.app')

@section('title', 'Detail Mobil')

@section('content')
<header class="nav-header">
    <div class="container border-gray-200 border-t border-b border-opacity-50 border-">
        <div class="flex flex-row md:mx-15 my-2">
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
        <div class="flex flex-row justify-start space-x-5 mx-15 py-8">
            <div class="flex flex-col space-y-5">
                <div class="flex flex-col bg-white border rounded-md border-gray-700 md:w-21">
                    <div class="flex flex-col m-5">
                        <h2 class="text-lg">2020 Suzuki Carry PROMO SUZUKI AKHIR TAHUN PICK UP DP 2 JUTA, ANGSURAN
                            RINGAN</h2>
                        <div class="flex flex-row space-x-3">
                            <h3 class="text-xl font-semibold">Rp. 85.000.000</h3>
                            <h3 class="text-xl">Nego</h3>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col bg-white border rounded-md border-gray-700 md:w-21">
                    <div class="flex flex-col m-5">
                        <h2 class="text-lg">2020 Suzuki Carry PROMO SUZUKI AKHIR TAHUN PICK UP DP 2 JUTA, ANGSURAN
                            RINGAN</h2>
                        <div class="flex flex-row space-x-3">
                            <h3 class="text-xl font-semibold">Rp. 85.000.000</h3>
                            <h3 class="text-xl">Nego</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col space-y-5">
                <div class="flex flex-col bg-white border rounded-md border-gray-700">
                    <div class="flex flex-col m-5 space-y-5 w-96">
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
