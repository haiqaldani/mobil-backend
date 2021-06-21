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
                <form action="{{ route('car.update', $item->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    {{-- <div class="form-group"> --}}
                    <input type="hidden" class="form-control" name="id_seller" placeholder="Id Seller"
                        value="{{ $item->id_seller }}">
                    {{-- </div> --}}
                    <div class="form-group">
                        <label for="title">Judul Iklan</label>
                        <input type="text" class="form-control" name="title" placeholder="Judul Iklan"
                            value="{{ $item->title }}">
                    </div>
                    <div class="form-group">
                        <label for="car_year">Tahun Mobil</label>
                        <input type="number" class="form-control" name="car_year" placeholder="Tahun Mobil"
                            value="{{ $item->car_year }}">
                    </div>
                    <div class="form-group">
                        <label class="font-semibold" for="merk_id">Merk*</label>
                        <select name="merk_id" id="merk_id" class="form-control">
                            <option value="{{ $item->merks->id }}">Pilih jika diganti ({{ $item->merks->merk }})</option>
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

                        @error('merk_id')
                            <span class="text-red-600 text-sm font-light" role="alert">
                                <p>*{{ $message }}</p>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-semibold" for="car_model_id">Model Mobil*</label>

                        <select name="car_model_id" id="car_model_id" class="form-control">
                            <option value="{{ $item->car_models->id }}">Pilih jika diganti ({{ $item->car_models->model }})</option>
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
                            <option value="{{ $item->car_variants->id }}">Pilih jika diganti ({{ $item->car_variants->edition }})</option>
                        </select>

                        @error('car_model_id')
                            <span class="text-red-600 text-sm font-light" role="alert">
                                <p>*{{ $message }}</p>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cars_type_id">Kategori Mobil</label>
                        <select name="car_types_id" class="form-control">
                            <option value="{{ $item->car_types_id }}">{{ $item->title }}</option>
                            @foreach ($car_types as $car_type)
                                <option value="{{ $car_type->id }}">
                                    {{ $car_type->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="transmission">Transmisi</label>
                        <div class="radio-tile-group gap-3">
                            <div class="input-container mr-2">
                                <input type="radio" class="radio-button" name="transmission" value="Otomatis" @if ($item->transmission == 'Otomatis') checked @endif>
                                <div class="radio-tile">
                                    <label class="radio-tile-label" for="transmission">Otomatis</label>
                                </div>
                            </div>
                            <div class="input-container mr-2">
                                <input type="radio" class="radio-button" name="transmission" value="Manual" @if ($item->transmission == 'Manual') checked @endif>
                                <div class="radio-tile">
                                    <label class="radio-tile-label" for="transmission">Manual</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="condition">Kondisi</label>
                        <div class="radio-tile-group gap-3">
                            <div class="input-container mr-2">
                                <input type="radio" class="radio-button" name="condition" value="Baru" @if ($item->condition == 'Baru') checked @endif>
                                <div class="radio-tile">
                                    <label class="radio-tile-label" for="condition">Baru</label>
                                </div>
                            </div>
                            <div class="input-container mr-2">
                                <input type="radio" class="radio-button" name="condition" value="Bekas" @if ($item->condition == 'Bekas') checked @endif>
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
                                <input type="radio" class="radio-button" name="fuel" value="Diesel" @if ($item->fuel == 'Diesel') checked @endif>
                                <div class="radio-tile">
                                    <label class="radio-tile-label" for="fuel">Diesel</label>
                                </div>
                            </div>
                            <div class="input-container mr-2">
                                <input type="radio" class="radio-button" name="fuel" value="Bensin" @if ($item->fuel == 'Bensin') checked @endif>
                                <div class="radio-tile">
                                    <label class="radio-tile-label" for="fuel">Bensin</label>
                                </div>
                            </div>
                            <div class="input-container mr-2">
                                <input type="radio" class="radio-button" name="fuel" value="Hybrid" @if ($item->fuel == 'Hybrid') checked @endif>
                                <div class="radio-tile">
                                    <label class="radio-tile-label" for="fuel">Hybrid</label>
                                </div>
                            </div>
                            <div class="input-container mr-2">
                                <input type="radio" class="radio-button" name="fuel" value="Listrik" @if ($item->fuel == 'Listrik') checked @endif>
                                <div class="radio-tile">
                                    <label class="radio-tile-label" for="fuel">Listrik</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kilometers">Kilometer</label>
                        <input type="number" class="form-control" name="kilometers" placeholder="Kilometer"
                            value="{{ $item->kilometers }}">
                    </div>
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Harga"
                            value="{{ $item->price }}">
                    </div>
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
                                                        value="{{ $eksterior->id }}" @foreach ($item->vehicle_features as $value)  @if ($eksterior->id==$value->id)
                                                    checked @endif
                                            @endforeach>
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
                                                    value="{{ $interior->id }}" @foreach ($item->vehicle_features as $value)  @if ($interior->id==$value->id)
                                                checked @endif
                                        @endforeach
                                        >
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
                                                value="{{ $perlengkapan->id }}" @foreach ($item->vehicle_features as $value) 
                                                @if ($perlengkapan->id==$value->id)
                                            checked @endif
                                    @endforeach>
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
        <input type="text" class="form-control" name="color" placeholder="Warna Mobil" value="{{ $item->color }}">
    </div>
    <div class="form-group">
        <label for="description">Deskripsi</label>
        <textarea id="description" name="description" rows="10">{{ $item->description }}</textarea>
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
