@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="card shadow">
            <div class="card-header py-3 justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">Transaksi {{ $item->code }}</h3>
            </div>
            <div class="card-body">
                <!-- Content Row -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('transaction.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="interest_id" value="{{ $item->interest_buyers->id }}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label class="font-semibold" for="merk_id">Merk</label>
                                <select id="merk_id" class="form-control">
                                    <option value="">Pilih jika diganti</option>
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
                            <div class="col">
                                <label class="font-semibold" for="car_model_id">Model Mobil</label>
                                <select name="car_model_id" id="car_model_id" class="form-control">
                                    <option value="{{ $item->interest_buyers->car_model_id }}">Pilih jika diganti</option>
                                </select>
        
                                @error('car_model_id')
                                    <span class="text-red-600 text-sm font-light" role="alert">
                                        <p>*{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="font-semibold" for="car_variant_id">Model Variant</label>
                                <select name="car_variant_id" id="car_variant_id" class="form-control">
                                    <option value="{{ $item->interest_buyers->car_variant_id }}">Pilih jika diganti</option>
                                </select>
        
                                @error('car_model_id')
                                    <span class="text-red-600 text-sm font-light" role="alert">
                                        <p>*{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="booking_fee">Booking Fee</label>
                        <input type="text" class="form-control" name="booking_fee" id="booking_fee" placeholder="Booking Fee"
                            aria-label="Booking Fee">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Ubah
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
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
            $('#booking_fee').mask('000.000.000.000.000', {
                reverse: true
            });

        })

    </script>
@endsection
