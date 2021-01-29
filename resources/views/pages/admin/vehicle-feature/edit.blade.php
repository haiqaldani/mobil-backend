@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow">
            <div class="card-header py-3 justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">Edit Fitur Mobil {{ $item->feature }}</h3>
            </div>
            <div class="card-body">
                <!-- Content Row -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('vehicle-feature.update', $item->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="category">Kategori Fitur</label>
                        <select name="category" required class="form-control">
                            <option value="{{ $item->category }}">{{ $item->category }}</option>
                                <option value="Interior">
                                    Interior
                                </option>
                                <option value="Eksterior">
                                    Interior
                                </option>
                                <option value="Perlengkapan">
                                    Perlengkapan
                                </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="feature">Fitur</label>
                        <input type="text" class="form-control" name="feature" placeholder="Fitur" value="{{ $item->feature }}">
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
