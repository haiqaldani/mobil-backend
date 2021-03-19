@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow">
            <div class="card-header py-3 justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">Promo</h3>
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
                <form action="{{ route('promo.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Promo</label>
                        <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="amount">Total Diskon/Cashback</label>
                        <input type="number" class="form-control" name="amount" placeholder="Total Diskon/Cashback" value="{{ old('amount') }}">
                    </div>
                    <div class="form-group">
                        <label for="promo_type">Tipe Promo</label>
                        <div class="radio-tile-group">
                            <div class="input-container mr-3">
                                <input type="radio" class="radio-button" name="promo_type" value="Discount">
                                <div class="radio-tile">
                                    <label class="radio-tile-label" for="promo_type">Diskon</label>
                                </div>
                            </div>
                            <div class="input-container">
                                <input type="radio" class="radio-button" name="promo_type" value="Cashback">
                                <div class="radio-tile">
                                    <label class="radio-tile-label" for="promo_type">Cashback</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="code">Kode Promo</label>
                        <input type="text" class="form-control" name="code" placeholder="Code" value="{{ old('code') }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea id="description" name="description" rows="10">{{ old('description') }}</textarea>
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
    CKEDITOR.replace('description');

</script>
@endsection