@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Kategori Mobil {{ $item->title }}</h1>
      </div>

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
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('car-type.update', $item->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $item->title }}">
                    </div>
                    <div class="form-group">
                        <label for="car_year">Tahun Mobil</label>
                        <input type="number" class="form-control" name="car_year" placeholder="Tahun Mobil" value="{{ $item->car_year }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Kategori Mobil</label>
                        <select name="car_types_id" required class="form-control">
                            <option value="{{ $item->car_types_id }}">Pilih Kategori Mobil</option>
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
                            <option value="{{ $item->transmission }}">Pilih Transmisi</option>
                            <option value="Otomatis">Otomatis</option>
                            <option value="Manual">Manual</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fuel">Bahan Bakar</label>
                        <input type="text" class="form-control" name="fuel" placeholder="Bahan Bakar" value="{{ $item->fuel }}">
                    </div>
                    <div class="form-group">
                        <label for="edition">Edisi</label>
                        <input type="text" class="form-control" name="edition" placeholder="Edisi" value="{{ $item->edition }}">
                    </div>
                    <div class="form-group">
                        <label for="cc">CC</label>
                        <input type="number" class="form-control" name="cc" placeholder="CC Mobil" value="{{ $item->cc }}">
                    </div>
                    <div class="form-group">
                        <label for="kilometers">Kilometer</label>
                        <input type="number" class="form-control" name="kilometers" placeholder="Kilometer" value="{{ $item->kilometers }}">
                    </div>
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" class="form-control" name="price" placeholder="Harga" value="{{ $item->price }}">
                    </div>
                    <div class="form-group">
                        <label for="price_description">Deskripsi Harga</label>
                        <textarea name="price_description" rows="10" class="d-block w-100 form-control">{{ $item->price_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="color">Warna</label>
                        <input type="text" class="form-control" name="color" placeholder="Warna Mobil" value="{{ $item->color }}">
                    </div>
                    <div class="form-group">
                        <label for="vehicle_features">Fitur Kendaraan</label>
                        <textarea name="vehicle_features" rows="10" class="d-block w-100 form-control">{{ $item->vehicle_features }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" rows="10" class="d-block w-100 form-control">{{ $item->description }}</textarea>
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
