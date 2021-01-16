@extends('layouts.app')

@section('title', 'Mobil Bekas')

@section('content')
<header class="nav-header  bg-blue-500">
    <div class="container border-gray-200">
        <div class="flex flex-row md:mx-15 mx-5 justify-center space-x-3">
            <form action="" class="my-4">
                <input class="border rounded-sm py-2 px-2" style="width: 10cm" type="text" placeholder="Cari, merek, tipe, tahun, lokasi lainnya">
                <button class="bg-yellow-300 rounded-sm py-2 px-6 text-white" type="submit">Cari</button>
            </form>
        </div>
    </div>
</header>
<main class="list-car-used">
    <div class="container bg-gray-300">
        <div class="flex flex-row md:mx-15">
            <div class="flex flex-container">
                .
            </div>
            <div class="flex flex-container">

            </div>
        </div>
    </div>
</main>
@endsection
