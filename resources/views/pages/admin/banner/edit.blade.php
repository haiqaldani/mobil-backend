@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow">
            <div class="card-header py-3 justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">Edit Banner {{ $item->title }}</h3>
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
                <form action="{{ route('banner.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="title">Judul Banner</label>
                        <input type="text" class="form-control" name="title" placeholder="Title"
                            value="{{ $item->title }}">
                    </div>
                    <div class="form-group">
                        <label for="image">Gambar</label>
                        {{-- <input type="file" class="form-control" name="image" placeholder="Image"> --}}
                        <div class="file-upload ">
                            <div class="file-select">
                                <div class="file-select-button" id="fileName">Pilih Gambar</div>
                                <div class="file-select-name" id="noFile">Tidak ada gambar terpilih</div>
                                <input type="file" name="image" accept="image/*" id="chooseFile">
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea id="description" name="description" rows="10">{{ $item->description }}</textarea>
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
