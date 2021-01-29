@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="card shadow">
        <div class="card-header py-3 justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary">Fitur Mobil</h3>
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
                <form action="{{ route('vehicle-feature.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="category">Nama Kategori</label>
                        <select name="category" required class="form-control">
                            <option value="">Pilih Kategori</option>
                                <option value="Interior">
                                    Interior
                                </option>
                                <option value="Eksterior">
                                    Eksterior
                                </option>
                                <option value="Perlengkapan">
                                    Perlengkapan
                                </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="feature">Fitur</label>
                        <input type="text" class="form-control" name="feature" placeholder="Fitur" value="{{ old('feature') }}">
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
