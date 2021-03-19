@extends('layouts.app2')

@section('title', 'Jual Mobil')

@section('content')
    <section class="section-create">
        <div class="container">
            <div class="flex flex-col mt-10">
                <h1 class="font-bold text-center text-3xl">Jual Mobil Anda</h1>
                <div class="flex flex-col border-2 border-gray-200 mx-56 rounded-md">
                    <form class="mx-10 my-5 space-y-3" action="{{ route('post-mobil') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <input type="hidden" class="form-control" name="id_seller" placeholder="Id Seller"
                            value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label class="font-semibold" for="title">Judul Iklan*</label>
                            <div class="">
                                <input
                                    class="px-2 py-2 w-6/12 border border-black rounded-sm outline-none focus:border-blue-400"
                                    type="text" name="title" placeholder="Cth: Mobil Honda Brio 2019"
                                    value="{{ old('title') }}">
                            </div>
                            @error('title')
                                <span class="text-red-600 text-sm font-light" role="alert">
                                    <p>*{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label class="font-semibold" for="model">Model Mobil*</label>
                            <div class="">
                                <input
                                    class="px-2 py-2 w-6/12 border border-black rounded-sm outline-none focus:border-blue-400"
                                    type="text" name="model" placeholder="Cth: Honda Brio" value="{{ old('model') }}">

                            </div>
                            @error('model')
                                <span class="text-red-600 text-sm font-light" role="alert">
                                    <p>*{{ $message }}</p>
                                </span>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                            <label class="font-semibold" for="car_year">Tahun*</label>
                            <div class="">
                                <input
                                    class="px-2 py-2 w-6/12 border border-black rounded-sm outline-none focus:border-blue-400"
                                    type="number" name="car_year" placeholder="Cth: 2019" value="{{ old('car_year') }}">
                            </div>
                            @error('car_year')
                                <span class="text-red-600 text-sm font-light" role="alert">
                                    <p>*{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-semibold" for="car_types_id">Kategori Mobil*</label>
                            <div class="">
                                <select name="car_types_id"
                                    class="px-2 py-2 w-6/12 border placeholder-opacity-75  border-black rounded-sm outline-none focus:border-blue-400 ">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($car_types as $car_type)
                                        <option class="text-black" value="{{ $car_type->id }}">
                                            {{ $car_type->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('car_types_id')
                                <span class="text-red-600 text-sm font-light" role="alert">
                                    <p>*{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-semibold" for="merk_id">Merk*</label>
                            <div class="">
                                <select name="merk_id" id="merk_id"
                                    class="px-2 py-2 w-6/12 border placeholder-opacity-75  border-black rounded-sm outline-none focus:border-blue-400 ">
                                    <option value="">Pilih Merk</option>
                                    {{-- @foreach ($merks as $id => $merk)
                                        <option class="text-black" value="{{ $id }}">
                                            {{ $merk }}
                                        </option>
                                    @endforeach --}}
                                    @foreach ($merks as $id => $merk)
                                        <option class="text-black" value="{{ $id }}">
                                            {{ $merk }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('merk_id')
                                <span class="text-red-600 text-sm font-light" role="alert">
                                    <p>*{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-semibold" for="car_model_id">Model Mobil*</label>
                            <div class="">
                                <select name="car_model_id" id="car_model_id"
                                    class="px-2 py-2 w-6/12 border placeholder-opacity-75  border-black rounded-sm outline-none focus:border-blue-400 ">
                                    <option value="">Pilih Model</option>
                                </select>
                            </div>
                            @error('car_model_id')
                                <span class="text-red-600 text-sm font-light" role="alert">
                                    <p>*{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-semibold" for="car_variant_id">Model Variant*</label>
                            <div class="">
                                <select name="car_variant_id" id="car_variant_id"
                                    class="px-2 py-2 w-6/12 border placeholder-opacity-75  border-black rounded-sm outline-none focus:border-blue-400 ">
                                    <option value="">Pilih Variant</option>
                                </select>
                            </div>
                            @error('car_model_id')
                                <span class="text-red-600 text-sm font-light" role="alert">
                                    <p>*{{ $message }}</p>
                                </span>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label class="font-semibold" for="transmission">Transmisi*</label>
                            <div class="flex flex-wrap space-x-3">
                                <div class="input-container">
                                    <input type="radio" class="radio-button" name="transmission" value="Otomatis">
                                    <div class="radio-tile">
                                        <label for="transmission">Otomatis</label>
                                    </div>
                                </div>
                                <div class="input-container">
                                    <input type="radio" class="radio-button" name="transmission" value="Manual">
                                    <div class="radio-tile">
                                        <label for="transmission">Manual</label>
                                    </div>
                                </div>

                            </div>
                            @error('transmission')
                                <span class="text-red-600 text-sm font-light" role="alert">
                                    <p>*{{ $message }}</p>
                                </span>
                            @enderror
                        </div> --}}
                        {{-- <div class="form-group">
                            <label class="font-semibold" for="condition">Kondisi*</label>
                            <div class="flex flex-wrap space-x-3">
                                <div class="input-container">
                                    <input type="radio" class="radio-button" name="condition" value="Baru">
                                    <div class="radio-tile">
                                        <label for="condition">Baru</label>
                                    </div>
                                </div>
                                <div class="input-container">
                                    <input type="radio" class="radio-button" name="condition" value="Bekas">
                                    <div class="radio-tile">
                                        <label for="condition">Bekas</label>
                                    </div>
                                </div>

                            </div>
                            @error('condition')
                                <span class="text-red-600 text-sm font-light" role="alert">
                                    <p>*{{ $message }}</p>
                                </span>
                            @enderror
                        </div> --}}
                        {{-- <div class="form-group">
                            <label class="font-semibold" for="fuel">Bahan Bakar*</label>
                            <div class="flex flex-wrap space-x-3">
                                <div class="input-container">
                                    <input type="radio" class="radio-button" name="fuel" value="Diesel">
                                    <div class="radio-tile">
                                        <label for="fuel">Diesel</label>
                                    </div>
                                </div>
                                <div class="input-container">
                                    <input type="radio" class="radio-button" name="fuel" value="Bensin">
                                    <div class="radio-tile">
                                        <label for="fuel">Bensin</label>
                                    </div>
                                </div>
                                <div class="input-container">
                                    <input type="radio" class="radio-button" name="fuel" value="Hybrid">
                                    <div class="radio-tile">
                                        <label for="fuel">Hybrid</label>
                                    </div>
                                </div>
                                <div class="input-container">
                                    <input type="radio" class="radio-button" name="fuel" value="Listrik">
                                    <div class="radio-tile">
                                        <label for="fuel">Listrik</label>
                                    </div>
                                </div>

                            </div>
                            @error('fuel')
                                <span class="text-red-600 text-sm font-light" role="alert">
                                    <p>*{{ $message }}</p>
                                </span>
                            @enderror
                        </div> --}}
                        {{-- <div class="form-group">
                            <label class="font-semibold" for="edition">Edisi</label>
                            <div class="">
                                <input
                                    class="px-2 py-2 w-6/12 border border-black rounded-sm outline-none focus:border-blue-400"
                                    type="text" name="edition" placeholder="Cth: 'RS'" value="{{ old('edition') }}">
                            </div>
                            @error('edition')
                                <span class="text-red-600 text-sm font-light" role="alert">
                                    <p>*{{ $message }}</p>
                                </span>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                            <label class="font-semibold" for="kilometers">Jarak Tempuh*</label>
                            <div class="">
                                <div class="flex flex-wrap">
                                    <input
                                        class="px-2 py-2 w-5/12 border-t border-l border-b border-black rounded-sm outline-none focus:border-blue-400"
                                        type="number" name="kilometers" placeholder="Cth: 20000"
                                        value="{{ old('kilometers') }}">
                                    <div class="bg-blue-500 px-2 text-white">
                                        <p class="text-white my-2">KM</p>
                                    </div>
                                </div>

                            </div>
                            @error('kilometers')
                                <span class="text-red-600 text-sm font-light" role="alert">
                                    <p>*{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label class="font-semibold" for="cc">CC</label>
                            <div class="">
                                <div class="flex flex-wrap">
                                    <input
                                        class="px-2 py-2 w-5/12 border-t border-b border-l border-black rounded-sm outline-none focus:border-blue-400"
                                        type="number" name="cc" placeholder="Cth: 2000" value="{{ old('cc') }}">
                                    <div class="bg-blue-500 px-2 text-white">
                                        <p class="text-white my-2">CC</p>
                                    </div>
                                </div>

                            </div>
                            @error('cc')
                                <span class="text-red-600 text-sm font-light" role="alert">
                                    <p>*{{ $message }}</p>
                                </span>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                            <label class="font-semibold" for="price">Harga*</label>
                            <div class="">
                                <div class="flex flex-wrap">
                                    <input
                                        class="px-2 py-2 w-6/12 border border-black rounded-sm outline-none focus:border-blue-400"
                                        type="text" name="price" id="price" placeholder="Cth: 200.000.000"
                                        value="{{ old('price') }}">
                                </div>
                            </div>
                            @error('price')
                                <span class="text-red-600 text-sm font-light" role="alert">
                                    <p>*{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-semibold" for="price_description">Deskripsi Harga*</label>
                            <div class="grid grid-cols-3 gap-3 w-7/12">
                                <div class="input-container">
                                    <input type="radio" class="radio-button" name="price_description" value="Tidak Ada">
                                    <div class="radio-tile">
                                        <label for="fuel">Tidak ada</label>
                                    </div>
                                </div>
                                <div class="input-container">
                                    <input type="radio" class="radio-button" name="price_description" value="Siap pakai">
                                    <div class="radio-tile">
                                        <label for="price_description">Siap pakai</label>
                                    </div>
                                </div>
                                <div class="input-container">
                                    <input type="radio" class="radio-button" name="price_description" value="Nego">
                                    <div class="radio-tile">
                                        <label for="price_description">Nego</label>
                                    </div>
                                </div>
                                <div class="input-container col-span-3">
                                    <input type="radio" class="radio-button" name="price_description"
                                        value="SKA Pemerintah RI">
                                    <div class="radio-tile">
                                        <label for="price_description">SKA Pemerintah RI saja (Form A, Form B, dll)</label>
                                    </div>
                                </div>
                                <div class="input-container">
                                    <input type="radio" class="radio-button" name="price_description"
                                        value="Kredit tersedia">
                                    <div class="radio-tile">
                                        <label for="price_description">Kredit tersedia</label>
                                    </div>
                                </div>
                                <div class="input-container">
                                    <input type="radio" class="radio-button" name="price_description" value="OTR">
                                    <div class="radio-tile">
                                        <label for="price_description">OTR</label>
                                    </div>
                                </div>

                            </div>
                            @error('price_description')
                                <span class="text-red-600 text-sm font-light" role="alert">
                                    <p>*{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-semibold" for="vehicle_features">Fitur kendaraan</label>
                            <div class="flex flex-wrap" id="tabs-id">
                                <div class="w-7/12">
                                    <div class="border-b border-l border-r shadow-lg">
                                        <ul class="flex mb-0 list-none flex-wrap flex-row cursor-pointer">
                                            <li class="-mb-px mr-2 last:mr-0 flex-auto text-center ">
                                                <a class="text-xs font-medium px-3 py-3 block leading-normal underline text-blue-600"
                                                    onclick="changeAtiveTab(event,'tab-profile')">
                                                    Eksterior
                                                </a>
                                            </li>
                                            <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                                                <a class="text-xs font-medium px-3 py-3 block leading-normal"
                                                    onclick="changeAtiveTab(event,'tab-settings')">
                                                    Interior
                                                </a>
                                            </li>
                                            <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                                                <a class="text-xs font-medium px-3 py-3 block leading-normal"
                                                    onclick="changeAtiveTab(event,'tab-options')">
                                                    Perlengkapan
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-2">
                                        <div class="py-3 flex-auto">
                                            <div class="tab-content tab-space">
                                                <div class="block" id="tab-profile">
                                                    <div class="grid grid-cols-3 gap-3">
                                                        @foreach ($eksteriors as $eksterior)
                                                            <div class="input-container">
                                                                <input type="checkbox" class="radio-button"
                                                                    name="vehicle_features[]"
                                                                    value="{{ $eksterior->id }}">
                                                                <div class="radio-tile">
                                                                    <label
                                                                        for="{{ $eksterior->feature }}">{{ $eksterior->feature }}</label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="hidden" id="tab-settings">
                                                    <div class="grid grid-cols-3 gap-3">
                                                        @foreach ($interiors as $interior)
                                                            <div class="input-container">
                                                                <input type="checkbox" class="radio-button"
                                                                    name="vehicle_features[]"
                                                                    value="{{ $interior->id }}">
                                                                <div class="radio-tile">
                                                                    <label
                                                                        for="{{ $interior->feature }}">{{ $interior->feature }}</label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="hidden" id="tab-options">
                                                    <div class="grid grid-cols-3 gap-3">
                                                        @foreach ($perlengkapans as $perlengkapan)
                                                            <div class="input-container">
                                                                <input type="checkbox" class="radio-button"
                                                                    name="vehicle_features[]"
                                                                    value="{{ $perlengkapan->id }}">
                                                                <div class="radio-tile">
                                                                    <label
                                                                        for="{{ $perlengkapan->feature }}">{{ $perlengkapan->feature }}</label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @error('vehicle_features')
                                <span class="text-red-600 text-sm font-light" role="alert">
                                    <p>*{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-semibold" for="color">Warna</label>
                            <div class="">
                                <div class="flex flex-wrap">
                                    <input
                                        class="px-2 py-2 w-6/12 border border-black rounded-sm outline-none focus:border-blue-400 "
                                        type="text" name="color" id="color" placeholder="Cth: Biru"
                                        value="{{ old('color') }}">
                                </div>

                            </div>
                            @error('color')
                                <span class="text-red-600 text-sm font-light" role="alert">
                                    <p>*{{ $message }}</p>
                                </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label class="font-semibold" for="description">Deskripsi*</label>
                            <div class="">
                                <div class="flex flex-wrap">
                                    <textarea id="description" name="description" rows="10"
                                        class="">{{ old('description') }}</textarea>
                                </div>

                            </div>
                            @error('description')
                                <span class="text-red-600 text-sm font-light" role="alert">
                                    <p>*{{ $message }}</p>
                                </span>
                            @enderror

                        </div>

                        <div class="form-group control-group increment">
                            <label class="font-semibold" for="galleries">Upload Foto Mobil*</label>
                            <div class="">
                                <input type="file" name="image[]" accept="image/*"
                                    class="px-2 py-2 w-6/12 border border-black rounded-sm outline-none focus:border-blue-400 ">
                                <button class="btn-success py-2 bg-blue-500 px-4 text-white" type="button"><i
                                        class="glyphicon glyphicon-plus"></i>Add</button>
                            </div>


                            @error('image')
                                <span class="text-red-600 text-sm font-light" role="alert">
                                    <p>*{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="clone hide">
                            <div class="control-group input-group" style="margin-top:10px">
                                <input type="file" name="image[]" accept="image/*"
                                    class="px-2 py-2 w-6/12 border border-black rounded-sm outline-none focus:border-blue-400 ">
                                <button class="btn-danger py-2 bg-red-500 px-4 text-white" type="button"><i
                                        class="glyphicon glyphicon-remove"></i>
                                    Remove</button>
                            </div>
                        </div>

                        <button type="submit" class="px-2 py-2 bg-blue-400 text-white hover:bg-blue-500 font-semibold">
                            Jual mobil sekarang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        CKEDITOR.replace('description');

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-success").click(function() {
                var html = $(".clone").html();
                $(".increment").after(html);
            });
            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".control-group").remove();
            });
        });

    </script>
    <script type="text/javascript">
        function changeAtiveTab(event, tabID) {
            let element = event.target;
            while (element.nodeName !== "A") {
                element = element.parentNode;
            }
            ulElement = element.parentNode.parentNode;
            aElements = ulElement.querySelectorAll("li > a");
            tabContents = document.getElementById("tabs-id").querySelectorAll(".tab-content > div");
            for (let i = 0; i < aElements.length; i++) {
                aElements[i].classList.remove("underline");
                aElements[i].classList.remove("text-blue-600");
                aElements[i].classList.add("no-underline");
                aElements[i].classList.add("text-black");
                tabContents[i].classList.add("hidden");
                tabContents[i].classList.remove("block");
            }
            element.classList.remove("no-underline");
            element.classList.remove("text-black");
            element.classList.add("underline");
            element.classList.add("text-blue-600");
            document.getElementById(tabID).classList.remove("hidden");
            document.getElementById(tabID).classList.add("block");
        }

    </script>
    <script>
        $(document).ready(function() {

            // Format mata uang.
            $('#price').mask('000.000.000', {
                reverse: true
            });

        })

    </script>
    {{-- <script type="text/javascript">
        $(function() {
            $('#merk_id').on('change', function() {
                axios.post('{{ route('create-mobil.getmodel') }}', {
                        id: $(this).val()
                })
                .then(function(response) {
                        $('#car_model_id').empty();

                    $.each(response.data, function(id, merk) {
                        $('#car_model_id').append(new Option(merk, id))
                    })
                })
            });
        });
    </script> --}}
    <script>
        $('#merk_id').change(function() {
            var merksID = $(this).val();
            if (merksID) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('get-model-list') }}?merk_id=" + merksID,
                    success: function(res) {
                        if (res) {
                            $("#car_model_id").empty();
                            $("#car_model_id").append('<option>Pilih Model</option>');
                            $.each(res, function(key, value) {
                                $("#car_model_id").append('<option value="' + key + '">' + value +
                                    '</option>');
                            });

                        } else {
                            $("#car_model_id").empty();
                        }
                    }
                });
            } else {
                $("#car_model_id").empty();
                $("#car_variant_id").empty();
            }
        });
        $('#car_model_id').on('change', function() {
            var car_modelsID = $(this).val();
            if (car_modelsID) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('get-variant-list') }}?car_model_id=" + car_modelsID,
                    success: function(res) {
                        if (res) {
                            $("#car_variant_id").empty();
                            $.each(res, function(key, value) {
                                $("#car_variant_id").append('<option value="' + key + '">' + value +
                                    '</option>');
                            });

                        } else {
                            $("#car_variant_id").empty();
                        }
                    }
                });
            } else {
                $("#car_variant_id").empty();
            }

        });

    </script>
@endsection
