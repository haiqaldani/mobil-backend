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
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
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
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title"
                        value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="car_year">Tahun Mobil</label>
                    <input type="number" class="form-control" name="car_year" placeholder="Tahun Mobil"
                        value="{{ old('car_year') }}">
                </div>
                <div class="form-group">
                    <label for="cars_type_id">Kategori Mobil</label>
                    <select name="car_types_id" required class="form-control">
                        <option value="">Pilih Kategori Mobil</option>
                        @foreach($car_types as $car_type)
                            <option value="{{ $car_type->id }}">
                                {{ $car_type->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="transmission">Transmisi</label>
                    <select name="transmission" required class="form-control">
                        <option value="">Pilih Transmisi</option>
                        <option value="Otomatis">Otomatis</option>
                        <option value="Manual">Manual</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="condition">Kondisi</label>
                    <select name="condition" required class="form-control">
                        <option value="">Pilih Kondisi</option>
                        <option value="Baru">Baru</option>
                        <option value="Bekas">Bekas</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fuel">Bahan Bakar</label>
                    <input type="text" class="form-control" name="fuel" placeholder="Bahan Bakar"
                        value="{{ old('fuel') }}">
                </div>
                <div class="form-group">
                    <label for="edition">Edisi</label>
                    <input type="text" class="form-control" name="edition" placeholder="Edisi"
                        value="{{ old('edition') }}">
                </div>
                <div class="form-group">
                    <label for="cc">CC</label>
                    <input type="number" class="form-control" name="cc" placeholder="CC Mobil"
                        value="{{ old('cc') }}">
                </div>
                <div class="form-group">
                    <label for="kilometers">Kilometer</label>
                    <input type="number" class="form-control" name="kilometers" placeholder="Kilometer"
                        value="{{ old('kilometers') }}">
                </div>
                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="number" class="form-control" name="price" placeholder="Harga"
                        value="{{ old('price') }}">
                </div>
                <div class="form-group">
                    <label for="price_description">Deskripsi Harga</label>
                    <textarea id="price_description" name="price_description"
                        rows="10">{{ old('price_description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="color">Warna</label>
                    <input type="text" class="form-control" name="color" placeholder="Warna Mobil"
                        value="{{ old('color') }}">
                </div>
                <div class="form-group">
                    <label for="vehicle_features">Fitur Kendaraan</label>
                    <textarea name="vehicle_features" rows="10"
                        class="d-block w-100 form-control">{{ old('vehicle_features') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description" rows="10"
                        class="d-block w-100 form-control">{{ old('description') }}</textarea>
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
    CKEDITOR.replace('price_description');

</script>
@endsection
