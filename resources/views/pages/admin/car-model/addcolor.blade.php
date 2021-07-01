@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header py-3 justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">Varian Mobil {{ $item->model }}</h3>
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
                <form action="{{ route('color.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" class="form-control" name="car_model_id" hidden value="{{ $item->id }}">
                    <div class="form-group">
                        <label for="color_name">Warna</label>
                        {{-- <input type="file" class="form-control" name="image" placeholder="Image"> --}}
                        <div class="controls">
                            <div class="entry d-flex upload-input-group mb-2">
                                <input type="text" class="form-control" name="color_name[]" placeholder="Cth: Blue Metalic"
                                    value="{{ old('color_name') }}">
                                <button class="btn btn-upload btn-success btn-add" type="button">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
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
