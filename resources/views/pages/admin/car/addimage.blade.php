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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="form-group"> --}}
                    <input type="hidden" class="form-control" name="cars_id" placeholder="cars_id"
                        value="{{ $item->id }}">
                    {{-- </div> --}}
                    <div class="form-group">
                        <label for="image">Gambar</label>
                        {{-- <input type="file" class="form-control" name="image" placeholder="Image"> --}}
                        <div class="controls">
                            <div class="entry d-flex upload-input-group mb-2">
                                <div class="flex-fill file-upload mr-2">
                                    <div class="file-select">
                                        <div class="file-select-button" id="fileName">Pilih Gambar</div>
                                        <div class="file-select-name" id="noFile">Tidak ada gambar terpilih</div>
                                        <input  type="file" name="image[]" accept="image/*" id="chooseFile">
                                    </div>

                                </div>
                                <button class="btn btn-upload btn-success btn-add" type="button">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
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
    <script>
        $(function() {
            $(document).on('click', '.btn-add', function(e) {
                e.preventDefault();

                var controlForm = $('.controls:first'),
                    currentEntry = $(this).parents('.entry:first'),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);

                newEntry.find('input').val('');
                controlForm.find('.entry:not(:last) .btn-add')
                    .removeClass('btn-add').addClass('btn-remove')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('<span class="fa fa-trash"></span>');
            }).on('click', '.btn-remove', function(e) {
                $(this).parents('.entry:first').remove();

                e.preventDefault();
                return false;
            });
        });

    </script>
@endsection
