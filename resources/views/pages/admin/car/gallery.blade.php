@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow">
            <div class="card-header py-3 justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">Tambah Gallery {{ $item->title }}</h3>
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
                <form action="{{ route('gallery.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h3 class="text-2xl">{{ $item->title }}</h3>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="cars_id" placeholder="cars_id" value="{{ $item->id }}">
                        </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" placeholder="Image" >
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
