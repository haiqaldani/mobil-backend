@extends('layouts.app')

@section('title')
MOBIL
@endsection

@section('content')
<header class="mt-10">
    <div class="carousel relative shadow-2xl bg-white">
        <div class="carousel-inner relative overflow-hidden w-full">
            <!--Slide 1-->
            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden=""
                checked="checked">
            <div class="carousel-item absolute opacity-0" style="height:50vh;">
                <div class="block h-full w-full bg-indigo-500 text-white text-5xl text-center">Slide 1</div>
            </div>
            <label for="carousel-3"
                class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-2"
                class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!--Slide 2-->
            <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0" style="height:50vh;">
                <div class="block h-full w-full bg-orange-500 text-white text-5xl text-center">Slide 2</div>
            </div>
            <label for="carousel-1"
                class="prev control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-3"
                class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!--Slide 3-->
            <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0" style="height:50vh;">
                <div class="block h-full w-full bg-green-500 text-white text-5xl text-center">Slide 3</div>
            </div>
            <label for="carousel-2"
                class="prev control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-1"
                class="next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!-- Add additional indicators for each slide-->
            <ol class="carousel-indicators">
                <li class="inline-block mr-3">
                    <label for="carousel-1"
                        class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label for="carousel-2"
                        class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label for="carousel-3"
                        class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                </li>
            </ol>

        </div>
    </div>
</header>

<main class="mt-10">
    <div class="container">
        <h1 class="text-center font-bold text-3xl">Temukan Mobil Baru dan Mobil Bekas Impian Anda</h1>
        <div class="container mx-auto mt-5">
            <div class="mt-2 mb:mt-0 md:px-20 mx-8 md:mx-0">
                <div class="flex flex-col md:flex-row  md:flex mb-4">
                    <div class="md:flex-1 md:pr-3">
                        <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Merek Semua
                            Mobil</label>
                        <input class="w-full shadow-inner p-4 border-2 border-yellow-300 rounded-lg" type="text"
                            name="address_street" placeholder="Search e.g. Toyota Avanza 2020 ">
                    </div>
                    <div class="md:flex-2 md:pl-2">
                        <label
                            class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Kondisi</label>
                        <select class="w-full shadow-inner p-4 border-2 border-yellow-300 rounded-lg" type="text"
                            name="address_number" placeholder="Semua">
                            <option value="Semua">Semua</option>
                            <option value="Semua">Baru</option>
                            <option value="Semua">Bekas</option>
                        </select>
                    </div>
                    <div class="md:flex-2 md:pl-3">
                        <button
                            class="mt-3.5 w-full md:px-4 py-4 text-black font-bold rounded-lg border-yellow-300 bg-yellow-300 border-2 hover:border-yellow-400"
                            type="submit">Cari Sekarang </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<section class="section-type">
    <div class="container">
        <div class="flex md:flex-row flex-col md:justify-start mx-10 md:mx-20">
            <div class="flex flex-col">
                <div class="mt-5 md:mt-0">
                    <h2 class="font-bold md:text-left text-center text-lg md:mr-40 w-full">Lihat bedasarkan budget</h2>
                </div>
                <div class="">
                    <button class="py-4 md:w-11/12 w-full  text-blue-700 font-semibold rounded-lg shadow-md ">
                        < 100 Juta </button>
                </div>
                <div class="">
                    <button class="py-4 md:w-11/12 w-full text-blue-700 font-semibold rounded-lg shadow-md ">
                        100 Juta - 300 Juta
                    </button>
                </div>
                <div class="">
                    <button class="py-4 md:w-11/12 w-full text-blue-700 font-semibold rounded-lg shadow-md ">
                        300 Juta - 500 Juta
                    </button>
                </div>
                <div class="">
                    <button class="py-4 md:w-11/12 w-full text-blue-700 font-semibold rounded-lg shadow-md ">
                        > 500 Juta
                    </button>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="mt-5 md:mt-0">
                    <h2 class="font-bold md:text-left text-center text-lg mb-3 md:mb-0">Lihat bedasarkan tipe</h2>
                </div>
                <div class="flex flex-wrap md:justify-between justify-center">
                    <div class="border-2 rounded-md bg-white mb-3 ">
                        <div class="bg-auto bg-no-repeat bg-center w-96 h-48 w: md:w-48 md:h-24" style="background-image: url({{url('images/logo_mobil.png')}})"></div>
                    </div>
                    <div class="border-2 rounded-md bg-white mb-3 ">
                        <div class="bg-auto bg-no-repeat bg-center w-96 h-48 w: md:w-48 md:h-24" style="background-image: url({{url('images/logo_mobil.png')}})"></div>
                    </div>
                    <div class="border-2 rounded-md bg-white mb-3 ">
                        <div class="bg-auto bg-no-repeat bg-center w-96 h-48 w: md:w-48 md:h-24" style="background-image: url({{url('images/logo_mobil.png')}})"></div>
                    </div>
                    <div class="border-2 rounded-md bg-white mb-3 ">
                        <div class="bg-auto bg-no-repeat bg-center w-96 h-48 w: md:w-48 md:h-24" style="background-image: url({{url('images/logo_mobil.png')}})"></div>
                    </div>
                    <div class="border-2 rounded-md bg-white mb-3 ">
                        <div class="bg-auto bg-no-repeat bg-center w-96 h-48 w: md:w-48 md:h-24" style="background-image: url({{url('images/logo_mobil.png')}})"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
