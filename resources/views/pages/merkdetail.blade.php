@extends('layouts.app')

@section('title')
    {{ $item->merk }}
@endsection

@section('content')
    <header class="nav-header">
        <div class="container border-gray-200 border-b border-opacity-50">
            <div class="flex flex-row md:mx-20 mx-10 my-2 space-x-2">
                <a class="px-1 font-semibold text-blue-600 hover:text-black" href="{{ url('/') }}">Beranda</a>
                <p class="font-semibold"> &gt; </p>
                <a class="px-1 font-semibold  text-blue-600 hover:text-black" href="{{ url('/cars') }}">Mobil</a>
                <p class="font-semibold"> &gt; </p>
                <p class="font-semibold"> {{ $item->merk }}</p>
            </div>
        </div>
    </header>
    <main>
        <div class="container my-5">
            <div class="mx-20 flex flex-col ">
                <div class="grid grid-cols-4 space-x-5">
                    <div class="col-span-3 flex flex-col">
                        <div class="border rounded-md mb-5">
                            <div class="m-5 space-y-3">
                                <h2 class="font-semibold text-lg">Mobil {{ $item->merk }} di Indonesia</h2>
                                <div data-expandable>
                                    <div data-expand-text>{!! $item->description !!}
                                    </div>
                                    <div class="grid justify-end">
                                        <button class="focus:outline-none text-blue-600 mr-5 mt-5"
                                            data-expand-button></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-3">
                            @foreach ($models as $model)
                                @if ($model->merk_id == $item->id)
                                    <div class="border rounded-md cursor-pointer" id="myCard">
                                        <div class="" onclick="location.href='#';">
                                            <img class="object-scale-down border-b"
                                                src="{{ $model->car_galleries->count() ? Storage::url($model->car_galleries->first()->image) : '' }}"
                                                alt="">
                                            <div class="grid justify-center m-5 space-y-1">
                                                <h3 class="text-center font-normal text-lg">
                                                    {{ $model->model }}
                                                </h3>
                                                <p class="text-center font-bold text-lg">Rp.
                                                    {{ $model->car_variants->count() ? Str::limit($model->car_variants->first()->price, 3, '') : '' }}
                                                    -
                                                    {{ $model->car_variants->count() ? Str::limit($model->car_variants->last()->price, 3, ' Juta') : '' }}
                                                </p>
                                                <div class="grid grid-cols-3 justify-between gap-2">
                                                    <div class="flex flex-col border-r">
                                                        <p class="text-sm pr-2 font-medium">
                                                            @if ($model->car_variants->contains('fuel', 'Listrik'))
                                                                Otomatis
                                                            @elseif($model->car_variants->contains('transmission','Otomatis'))
                                                                Otomatis
                                                            @elseif($model->car_variants->contains('transmission','Manual'))
                                                                Manual
                                                            @elseif($model->car_variants->contains('transmission',['Otomatis','Manual']))
                                                                Otomatis
                                                                Manual
                                                            @else
                                                                Tidak Ada
                                                            @endif
                                                        </p>
                                                        <p class="text-sm pr-2">Transmisi</p>
                                                    </div>
                                                    <div class="flex-col">
                                                        <p class="text-sm text-center font-medium">
                                                            @if ($model->car_variants->contains('fuel', 'Listrik'))
                                                                Listrik
                                                            @elseif ($model->car_variants->contains('fuel','Bensin'))
                                                                Bensin
                                                            @elseif ($model->car_variants->contains('fuel','Diesel'))
                                                                Diesel
                                                            @elseif ($model->car_variants->contains('fuel','Hybrid'))
                                                                Hybrid
                                                            @elseif ($model->car_variants->contains('fuel',
                                                                ['Bensin','Diesel']))
                                                                Bensin
                                                                Diesel
                                                            @else
                                                                Tidak Ada
                                                            @endif
                                                        </p>
                                                        <p class="text-sm text-center">Bahan Bakar</p>
                                                    </div>
                                                    <div class="flex flex-col border-l">
                                                        <p class="text-sm pl-2 font-medium">
                                                            {{ $model->car_variants->count() ? $model->car_variants->first()->cc : '' }}cc
                                                        </p>
                                                        <p class="text-sm pl-2">Mesin</p>
                                                    </div>
                                                </div>
                                                <p class="text-sm text-center">Tersedia
                                                    {{ $model->car_variants->count() }} Varian dan 3 Warna</p>
                                            </div>
                                        </div>

                                        <div class="flex flex-col m-5">
                                            <a class="hidden" href="aku" id="link"></a>
                                            <p class="text-center uppercase text-sm mb-2">Dapatkan Penawaran Terkini</p>

                                            <div class="grid grid-cols-4 gap-2">
                                                <input type="hidden" value="{{ $model->id }}" id="model_id"
                                                    name="model_id">
                                                <button href="" onclick="openModal()" data-model-id="{{ $model->id }}"
                                                    id="modalButton"
                                                    class="col-span-3 border rounded-md z-10 py-3.5 text-center hover:bg-green-600 text-green-600 hover:text-white font-medium uppercase">Cari
                                                    Tahu</button>
                                                <a href="" class="bg-green-600 hover:bg-green-700 p-3 rounded-md">
                                                    <img class=" w-8 h-8" src="{{ url('frontend/images/whatsapp.svg') }}"
                                                        alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>

                        <div class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
                            style="background: rgba(0,0,0,.7);">
                            <div
                                class="border border-teal-500 modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                                <div class="modal-content py-4 text-left px-6">
                                    <!--Title-->
                                    <div class="flex justify-between items-center">
                                        <p class="text-xl font-bold">Dapatkan Penawaran Terkini </p>


                                        <div class="modal-close cursor-pointer z-50">
                                            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg"
                                                width="18" height="18" viewBox="0 0 18 18">
                                                <path
                                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <p class="text-sm">Isi detail Anda dan dapatkan penawaran terbaik <br /> yang
                                        akan Anda dapatkan </p>
                                    <!--Body-->
                                    <div class="my-5">
                                        <form action="" class="space-y-3">

                                            <input type="hidden" name="car_model_id" id="car_model_id" disabled>

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
                                                    class="p-3 border rounded focus:outline-none" id="schedule">
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
                                        </form>
                                    </div>
                                    <!--Footer-->
                                    <div class="flex justify-end pt-2">
                                        {{-- <button
                                            class="focus:outline-none modal-close px-4 bg-gray-400 p-3 rounded-lg text-black hover:bg-gray-300">Cancel</button> --}}
                                        <button
                                            class="focus:outline-none px-4 border bg-green-500 text-white p-3 ml-3 rounded-lg hover:bg-teal-400">Confirm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection
@section('scripts')
    {{-- <script>
        const modal = document.querySelector(".main-modal");
        const closeButton = document.querySelectorAll(".modal-close");

        const modalClose = () => {
            modal.classList.remove("fadeIn");
            modal.classList.add("fadeOut");
            setTimeout(() => {
                modal.style.display = "none";
            }, 500);
        };

        const openModal = () => {
            modal.classList.remove("fadeOut");
            modal.classList.add("fadeIn");
            modal.style.display = "flex";
            // var bookId = $(e.relatedTarget).data('id');
            // $(e.currentTarget).find('input[name="car_model_id"]').val(bookId);
        };

        for (let i = 0; i < closeButton.length; i++) {
            const elements = closeButton[i];

            elements.onclick = e => modalClose();

            modal.style.display = "none";

            window.onclick = function(event) {
                if (event.target == modal) modalClose();
            };
        }

    </script> --}}

@endsection
@prepend('addon-script')
    {{-- <script>
        $("#schedule").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
   </script> --}}
   <script>
       jQuery('#schedule').datetimepicker();
   </script>
@endprepend
