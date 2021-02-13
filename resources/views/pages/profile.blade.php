@extends('layouts.app3')

@section('title', 'Profile')

@section('content')
    <section class="section-profile">
        <div class="container">
            <div class="flex flex-col mx-15 my-10">
                <h1 class="text-2xl font-bold text-center">Profile</h1>
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                <div class="border">
                    <div class="card">
                        <img src="{{ Storage::url($item->profil_picture) }}" class="rounded-full w-52 h-52 shadow-md"
                            alt="Foto {{ $item->username }}">
                    </div>
                    <form action="{{ route('profile-update', $item->id) }}" class="flex flex-col w-2/4 space-y-3"
                        method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="grid grid-flow-col space-x-3">
                            <div class="form-group flex flex-col">
                                <label for="firstname">First Name</label>
                                <input type="text" class="py-2 border px-2" name="firstname" placeholder="First name"
                                    aria-label="First name" value="{{ $item->firstname }}">
                            </div>
                            <div class="form-group flex flex-col">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="py-2 border px-2" name="lastname" placeholder="Last name"
                                    aria-label="Last name" value="{{ $item->lastname }}">
                            </div>
                        </div>

                        <div class="form-group flex flex-col">
                            <label for="email">Email</label>
                            <input type="text" class="py-2 border px-2" name="email" placeholder="Email"
                                value="{{ $item->email }}">
                        </div>
                        <div class="form-group flex flex-col">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="py-2 border px-2" name="phone_number" placeholder="Phone Number"
                                value="{{ $item->phone_number }}">
                        </div>
                        <div class="form-group grid grid-flow-col space-x-3">
                            <div class="flex flex-col">
                                <label for="province">Province</label>
                                <input type="text" class="py-2 border px-2" name="province" placeholder="Province"
                                    aria-label="Province" value="{{ $item->province }}">
                            </div>
                            <div class="flex flex-col">
                                <label for="province">City</label>
                                <input type="text" class="py-2 border px-2" name="city" placeholder="City" aria-label="City"
                                    value="{{ $item->city }}">
                            </div>
                        </div>
                        <div class="form-group flex flex-col">
                            <label for="address">Address</label>
                            <textarea class="py-2 border px-2" name="address" placeholder="Address"
                                value="{{ $item->address }}"></textarea>
                        </div>
                        <button type="submit" class="py-2 text-white bg-blue-500 hover:bg-blue-600">
                            Ubah
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection
