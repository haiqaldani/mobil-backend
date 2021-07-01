@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow">
            <div class="card-header py-3 justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">Edit Model Mobil {{ $item->model }}</h3>
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
                <form action="{{ route('car-model.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="merk_id">Merk Mobil</label>
                        <select name="car_types_id" class="form-control">
                            <option value="{{ $item->merk_id }}">{{ $item->merk }}</option>
                            @foreach ($merks as $merk)
                                <option value="{{ $merk->id }}">
                                    {{ $merk->merk }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="model">Model Mobil</label>
                        <input type="text" class="form-control" name="model" placeholder="cth: Avanza"
                            value="{{ $item->model }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea id="description" name="description" rows="10">{{ old('description') }}</textarea>
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
@section('script')
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
