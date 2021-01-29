@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="card shadow">
            <div class="card-header py-3 justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">User {{ $item->username }}</h3>
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
                <form action="{{ route('user.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" name="firstname" placeholder="First name"
                                    aria-label="First name" value="{{ $item->firstname }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" name="lastname" placeholder="Last name"
                                    aria-label="Last name" value="{{ $item->lastname }}" disabled>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="card" style="height: 10rem">
                                <img src="{{ Storage::url($item->profil_picture) }}" style="height: 100%;"
                                    alt="Foto {{ $item->username }}">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $item->email }}"
                            disabled>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" placeholder="Phone Number"
                            value="{{ $item->phone_number }}" disabled>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="province">Province</label>
                                <input type="text" class="form-control" name="province" placeholder="Province"
                                    aria-label="Province" value="{{ $item->province }}" disabled>
                            </div>
                            <div class="col">
                                <label for="province">City</label>
                                <input type="text" class="form-control" name="city" placeholder="City" aria-label="City"
                                    value="{{ $item->city }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" name="address" placeholder="Address" value="{{ $item->address }}"
                            disabled></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-select" name="status" aria-label="Default select example">
                            <option value="1" @if ($item->status = 1) selected @endif>Active</option>
                            <option value="0" @if ($item->status = 0) selected @endif>Non Active</option>
                        </select>
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
