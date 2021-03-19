@extends('pages.account')


@section('profile')
    <div class="border col-span-2">
        <div class="m-5">
            <form action="{{ route('profile-seller.update') }}" class=" space-y-3" method="post"
                enctype="multipart/form-data">
                @method('Patch')
                @csrf
                <div class="flex flex-row space-x-5">
                    {{-- <div class="rounded-full object-center object-cover w-52 h-52 shadow-md "
                style="background-image: url('{{ Storage::url($item->profil_picture) }}');"></div> --}}
                    <img src="{{ Storage::url($item->profil_picture) }}"
                        class="rounded-full w-32 h-32 shadow-md object-cover z-10 border"
                        alt="Foto {{ $item->username }}">

                    <div class="flex w-full items-center">
                        <label
                            class="flex flex-col hover:bg-gray-400 items-center border border-gray-500 bg-gray-300 px-4 py-2 text-blue rounded-md shadow-md tracking-wide cursor-pointer">
                            <span class="text-base">Pilih Foto</span>
                            <input type='file' name="profile_picture" class="hidden" accept="image/*" />
                        </label>
                    </div>
                </div>

                <div class="form-group flex flex-col space-y-3">

                </div>
                <div class="form-group flex flex-col">
                    <label for="lastname">Full Name</label>
                    <input type="text" class="py-2 border px-2" name="lastname" placeholder="Last name"
                        aria-label="Last name" value="{{ $item->full_name }}">
                </div>

                <div class="form-group flex flex-col">
                    <label for="username">Username</label>
                    <input type="text" class="py-2 border px-2" name="username" placeholder="Email"
                        value="{{ $item->username }}">
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
                        value="{{ $item->address }}"> {{ $item->address }}</textarea>
                </div>
                <button type="submit" class="py-2 text-white bg-blue-500 hover:bg-blue-600 w-full">
                    Ubah
                </button>
            </form>
        </div>
    </div>
@endsection
