@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header py-3 justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">Varian Mobil</h3>
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
                <form action="{{ route('car-variant.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="car_model_id">Model Mobil</label>
                        <select name="car_model_id" class="form-control">
                            <option value="">Pilih Model Mobil</option>
                            @foreach ($car_models as $car_model)
                                <option value="{{ $car_model->id }}">
                                    {{ $car_model->model }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edition">Edisi</label>
                        <input type="text" class="form-control" name="edition" placeholder="Cth: Agya 1.0 G MT"
                            value="{{ old('edition') }}">
                    </div>
                    <div class="form-group">
                        <label for="transmission">Transmisi</label>
                        <div class="radio-tile-group gap-3">
                            <div class="input-container">
                                <input type="radio" class="radio-button" name="transmission" value="Otomatis">
                                <div class="radio-tile">
                                    <label class="radio-tile-label" for="transmission">Otomatis</label>
                                </div>
                            </div>
                            <div class="input-container">
                                <input type="radio" class="radio-button" name="transmission" value="Manual">
                                <div class="radio-tile">
                                    <label class="radio-tile-label" for="transmission">Manual</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cc">CC</label>
                        <input type="number" class="form-control" name="cc" placeholder="Cth: 1000"
                            value="{{ old('cc') }}">
                    </div>
                    <div class="form-group">
                        <label for="variant">Varian</label>
                        <input type="text" class="form-control" name="variant" placeholder="Cth: Luxury"
                            value="{{ old('variant') }}">
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
