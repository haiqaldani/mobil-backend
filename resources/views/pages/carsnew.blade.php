@extends('layouts.app')

@section('title', 'Mobil Baru')

@section('content')
    <main class="merk-main my-10">
        <div class="container">
            <div class="grid justify-center mx-20 space-y-5">
                <h1 class="text-4xl font-semibold text-center">Pilih Merk</h1>
                <p class="text-center font-light">
                    Pilih salah merk berikut ini untuk mendapat info mobil yang lebih lengkap.
                </p>
                <div class="grid grid-cols-6 gap-7 justify-start">
                    @foreach ($merks as $merk)
                        <div class="">
                            <a href="{{ route('merk-list', $merk->slug) }}">
                                <div class="m-3">
                                    {{-- <img class="object-scale-down" src="{{ url('storage/assets/merk/daihatsu.png') }}" alt=""> --}}
                                    <img class="object-scale-down h-24" src="{{ Storage::url($merk->image) }}" alt="">
                                </div>
                                <p class="font-medium text-center w-full">
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
                <h2 class="md:text-left text-center text-xl md:text-2xl font-semibold mb-5 text-gray-600">Model Mobil
                    Terbaru</h2>
                {{-- <div class="flex justify-center "> --}}
                <div class="">
                    <div class="my-3">
                        <div id="sync2" class="owl-carousel">
                            <div class="item">
                                <a href="">
                                    <div class="card hover:bg-black hover:bg-opacity-25 m-1 shadow-md ">
                                        <div class="ring-1 rounded ring-gray-300">
                                            <div class="card-image">
                                                <img class="object-fill object-center rounded"
                                                    src="{{ url('/frontend/images/login.jpg') }}" alt="">
                                            </div>
                                            <div class="card-body">
                                                <h3 class="font-semibold text-lg">Magnite</h3>
                                                <p class="text-gray-500 mb-3">Rp. 200.000.000</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
