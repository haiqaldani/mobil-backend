@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->

        <div class="card shadow">
            <div class="card-header py-3 justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">Car</h3>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('car.store') }}" method="post">
                    @csrf
                    {{-- <div class="form-group"> --}}
                    <input type="hidden" class="form-control" name="id_seller" placeholder="Id Seller"
                        value="{{ Auth::user()->id }}">
                    {{-- </div> --}}
                    <div class="form-group">
                        <label for="title">Judul Iklan</label>
                        <input type="text" class="form-control" name="title" placeholder="Judul Iklan"
                            value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label class="font-semibold" for="merk_id">Merk*</label>
                        <select name="merk_id" id="merk_id" class="form-control">
                            <option value="">Pilih Merk</option>
                            @foreach ($merks as $id => $merk)
                                <option class="text-black" value="{{ $id }}">
                                    {{ $merk }}
                                </option>
                            @endforeach
                        </select>

                        @error('merk_id')
                            <span class="text-red-600 text-sm font-light" role="alert">
                                <p>*{{ $message }}</p>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-semibold" for="car_model_id">Model Mobil*</label>

                        <select name="car_model_id" id="car_model_id" class="form-control">
                            <option value="">Pilih Model</option>
                        </select>

                        @error('car_model_id')
                            <span class="text-red-600 text-sm font-light" role="alert">
                                <p>*{{ $message }}</p>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-semibold" for="car_variant_id">Model Variant*</label>

                        <select name="car_variant_id" id="car_variant_id" class="form-control">
                            <option value="">Pilih Variant</option>
                        </select>

                        @error('car_model_id')
                            <span class="text-red-600 text-sm font-light" role="alert">
                                <p>*{{ $message }}</p>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="car_year">Tahun Mobil</label>
                        <input type="number" class="form-control" name="car_year" placeholder="Tahun Mobil"
                            value="{{ old('car_year') }}">
                    </div>
                    <div class="form-group">
                        <label for="cars_type_id">Kategori Mobil</label>
                        <select name="car_types_id" class="form-control">
                            <option value="">Pilih Kategori Mobil</option>
                            @foreach ($car_types as $car_type)
                                <option value="{{ $car_type->id }}">
                                    {{ $car_type->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="transmission">Transmisi</label>
                        <div class="radio-tile-group ">
                            <div class="input-container mr-2">
                                <input type="radio" class="radio-button" name="transmission" value="Otomatis">
                                <div class="radio-tile">
                                    <label class="radio-tile-label" for="transmission">Otomatis</label>
                                </div>
                            </div>
                            <div class="input-container mr-2">
                                <input type="radio" class="radio-button" name="transmission" value="Manual">
                                <div class="radio-tile">
                                    <label class="radio-tile-label" for="transmission">Manual</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="condition">Kondisi</label>
                        <div class="radio-tile-group">
                            <div class="input-container mr-2">
                                <input type="radio" class="radio-button" name="condition" value="Baru">
                                <div class="radio-tile">
                                    <label class="radio-tile-label" for="condition">Baru</label>
                                </div>
                            </div>
                            <div class="input-container mr-2">
                                <input type="radio" class="radio-button" name="condition" value="Bekas">
                                <div class="radio-tile">
                                    <label class="radio-tile-label" for="condition">Bekas</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fuel">Bahan Bakar</label>
                        <div class="radio-tile-group">
                            <div class="input-container mr-2">
                                <input type="radio" class="radio-button" name="fuel" value="Diesel">
                                <div class="radio-tile">
                                    <label class="radio-tile-label" for="fuel">Diesel</label>
                                </div>
                            </div>
                            <div class="input-container mr-2">
                                <input type="radio" class="radio-button" name="fuel" value="Bensin">
                                <div class="radio-tile">
                                    <label class="radio-tile-label" for="fuel">Bensin</label>
                                </div>
                            </div>
                            <div class="input-container mr-2">
                                <input type="radio" class="radio-button" name="fuel" value="Hybrid">
                                <div class="radio-tile">
                                    <label class="radio-tile-label" for="fuel">Hybrid</label>
                                </div>
                            </div>
                            <div class="input-container mr-2">
                                <input type="radio" class="radio-button" name="fuel" value="Listrik">
                                <div class="radio-tile">
                                    <label class="radio-tile-label" for="fuel">Listrik</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kilometers">Kilometer</label>
                        <input type="number" class="form-control" name="kilometers" id="km" placeholder="Kilometer"
                            value="{{ old('kilometers') }}">
                    </div>
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="text" class="form-control" id="price" name="price"  placeholder="Harga"
                            value="{{ old('price') }}">
                    </div>
                    {{-- <div class="form-group">
                        <label for="price_description">Deskripsi Harga</label>
                        <div class="radio-tile-group gap-3">
                            <div class="input-container">
                                <input type="radio" class="radio-button" name="price_description" value="Tidak Ada">
                                <div class="radio-tile">
                                    <label for="price_description" class="radio-tile-label">Tidak ada</label>
                                </div>
                            </div>
                            <div class="input-container">
                                <input type="radio" class="radio-button" name="price_description" value="Siap pakai">
                                <div class="radio-tile">
                                    <label class="radio-tile-label" for="price_description">Siap pakai</label>
                                </div>
                            </div>
                            <div class="input-container">
                                <input type="radio" class="radio-button" name="price_description" value="Nego">
                                <div class="radio-tile">
                                    <label class="radio-tile-label" for="price_description">Nego</label>
                                </div>
                            </div>
                            <div class="input-container col-span-3">
                                <input type="radio" class="radio-button" name="price_description"
                                    value="SKA Pemerintah RI">
                                <div class="radio-tile">
                                    <label class="radio-tile-label" for="price_description">SKA Pemerintah RI saja (Form A, Form B, dll)</label>
                                </div>
                            </div>
                            <div class="input-container">
                                <input type="radio" class="radio-button" name="price_description"
                                    value="Kredit tersedia">
                                <div class="radio-tile">
                                    <label class="radio-tile-label" for="price_description">Kredit tersedia</label>
                                </div>
                            </div>
                            <div class="input-container">
                                <input type="radio" class="radio-button" name="price_description" value="OTR">
                                <div class="radio-tile">
                                    <label class="radio-tile-label" for="price_description">OTR</label>
                                </div>
                            </div>

                        </div>
                    </div> --}}
                    <div class="form-group">
                        <label class="font-semibold" for="vehicle_features">Fitur kendaraan</label>
                        <div class="tabbable-panel">
                            <div class="tabbable-line">
                                <ul class="nav gap-3">
                                    <li class="active">
                                        <a class="btn btn-outline-primary" href="#tab_default_1" data-toggle="tab">
                                            Eksterior </a>
                                    </li>
                                    <li>
                                        <a class="btn btn-outline-primary" href="#tab_default_2" data-toggle="tab">
                                            Interior </a>
                                    </li>
                                    <li>
                                        <a class="btn btn-outline-primary" href="#tab_default_3" data-toggle="tab">
                                            Perlengkapan </a>
                                    </li>
                                </ul>
                                <div class="mt-2 tab-content">
                                    <div class="tab-pane active" id="tab_default_1">
                                        <div class="radio-tile-group gap-3">
                                            @foreach ($eksteriors as $eksterior)
                                                <div class="input-container">
                                                    <input type="checkbox" class="radio-button" name="vehicle_features[]"
                                                        value="{{ $eksterior->id }}">
                                                    <div class="radio-tile">
                                                        <label class="radio-tile-label"
                                                            for="{{ $eksterior->feature }}">{{ $eksterior->feature }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_default_2">
                                        <div class="radio-tile-group gap-3">
                                            @foreach ($interiors as $interior)
                                                <div class="input-container">
                                                    <input type="checkbox" class="radio-button" name="vehicle_features[]"
                                                        value="{{ $interior->id }}">
                                                    <div class="radio-tile">
                                                        <label class="radio-tile-label"
                                                            for="{{ $interior->feature }}">{{ $interior->feature }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_default_3">
                                        <div class="radio-tile-group gap-3">
                                            @foreach ($perlengkapans as $perlengkapan)
                                                <div class="input-container">
                                                    <input type="checkbox" class="radio-button" name="vehicle_features[]"
                                                        value="{{ $perlengkapan->id }}">
                                                    <div class="radio-tile">
                                                        <label class="radio-tile-label"
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
                    <div class="form-group">
                        <label for="color">Warna</label>
                        <input type="text" class="form-control" name="color" placeholder="Warna Mobil"
                            value="{{ old('color') }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea id="description" name="description" rows="10">{{ old('description') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
@section('script')
    <script>
        CKEDITOR.replace('description');

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

@endsection
@section('scripts')
    <script type="text/javascript">
        $('#merk_id').change(function() {
            var merksID = $(this).val();
            if (merksID) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('admin/get-model-list') }}?merk_id=" + merksID,
                    success: function(res) {
                        if (res) {
                            $("#car_model_id").empty();
                            $("#car_model_id").append('<option>Pilih Model</option>');
                            $.each(res, function(key, value) {
                                $("#car_model_id").append('<option value="' + key + '">' +
                                    value +
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
                    url: "{{ url('admin/get-variant-list') }}?car_model_id=" + car_modelsID,
                    success: function(res) {
                        if (res) {
                            $("#car_variant_id").empty();
                            $("#car_variant_id").append('<option>Pilih Variant</option>');
                            $.each(res, function(key, value) {
                                $("#car_variant_id").append('<option value="' + key + '">' +
                                    value +
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
     <script>
        $(document).ready(function() {

            // Format mata uang.
            $('#price , #km').mask('#.##0', {
                reverse: true
            });

        })

    </script>
@endsection
