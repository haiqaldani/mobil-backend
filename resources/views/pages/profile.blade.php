@extends('pages.account')


@section('profile')
    <div class="border col-span-2 bg-white">
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
                            class="flex flex-col hover:bg-blue-default items-center border border-gray-300 hover:shadow-md px-4 py-2 hover:text-white rounded-md tracking-wide cursor-pointer">
                            <span class="text-base">Pilih Foto</span>
                            <input type='file' name="profile_picture" class="hidden" accept="image/*" />
                        </label>
                    </div>
                </div>

                <div class="form-group flex flex-col space-y-3">

                </div>
                <div class="form-group flex flex-col">
                    <label for="lastname" class="text-gray-700">Nama Lengkap</label>
                    <input type="text" class="px-3 py-2 rounded-md focus:outline-none border-gray-200 focus:border-blue-default border" name="full_name" placeholder="Nama Lengkap"
                        aria-label="Last name" value="{{ $item->full_name }}">
                </div>

                <div class="form-group flex flex-col">
                    <label for="username" class="text-gray-700">Username</label>
                    <input type="text" class="px-3 py-2 rounded-md focus:outline-none border-gray-200 focus:border-blue-default border" name="username" placeholder="Username"
                        value="{{ $item->username }}">
                </div>

                <div class="form-group flex flex-col">
                    <label for="email" class="text-gray-700">Email</label>
                    <input type="text" class="px-3 py-2 rounded-md focus:outline-none border-gray-200 focus:border-blue-default border" name="email" placeholder="Email"
                        value="{{ $item->email }}">
                </div>

                <div class="form-group flex flex-col">
                    <label for="phone_number" class="text-gray-700">Phone Number</label>
                    <div class="flex flex-row">
                        <div class="py-2 px-3 bg-blue-default text-white rounded-l-md">+62</div>
                        <input type="text" class="px-3 py-2 rounded-r-md focus:outline-none border-gray-200 w-full focus:border-blue-default border" name="phone_number" placeholder="Phone Number"
                        value="{{ $item->phone_number }}">
                    </div>
                   
                </div>
                <div class="form-group grid grid-flow-col space-x-3">
                    <div class="flex flex-col">
                        <label for="province" class="text-gray-700">Province</label>
                        <input type="text" class="px-3 py-2 rounded-md focus:outline-none border-gray-200 focus:border-blue-default border" name="province" placeholder="Province"
                            aria-label="Province" value="{{ $item->province }}">
                    </div>
                    <div class="flex flex-col">
                        <label for="province" class="text-gray-700">City</label>
                        <input type="text" class="px-3 py-2 rounded-md focus:outline-none border-gray-200 focus:border-blue-default border" name="city" placeholder="City" aria-label="City"
                            value="{{ $item->city }}">
                    </div>
                </div>
                <div class="form-group flex flex-col">
                    <label for="address" class="text-gray-700">Address</label>
                    <textarea class="px-3 py-2 rounded-md focus:outline-none border-gray-200 focus:border-blue-default border" name="address" placeholder="Address"
                        value="{{ $item->address }}"> {{ $item->address }}</textarea>
                </div>
                <button type="submit" class="py-2 text-white bg-blue-500 hover:bg-blue-600 w-full">
                    Ubah
                </button>
            </form>
        </div>
    </div>
@endsection
