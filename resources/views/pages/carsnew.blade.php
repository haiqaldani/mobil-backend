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
                    <div class="">
                        <a href="">
                            <div class="m-3">
                                <img class="object-scale-down" src="{{ url('storage/assets/merk/daihatsu.png') }}" alt="">
                            </div>
                            <p class="font-medium text-center w-full">
                                Daihatsu
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
