@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <section class="section-profile">
        <div class="container">
            <div class="md:mx-20 mx-10 my-10">
                <h1 class="text-2xl font-bold text-center mb-5">Profile</h1>
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                @if (Auth::user()->email_verified_at == null)
                    <div class="bg-red-500 p-2 rounded-sm text-white">
                        Before proceeding, please check your email for a
                        verification link.
                    </div>
                @endif
                <div class="grid grid-cols-3 justify-center gap-5">
                    <div class="space-y-5">
                        <div class="border rounded">
                            <div class="flex flex-row m-5">
                                <img src="{{ Storage::url(Auth::user()->profil_picture) }}"
                                    class="rounded-full w-24 h-24 shadow-md object-cover z-10 border"
                                    alt="Foto {{ Auth::user()->username }}">
                                <div class="flex flex-col mx-3 my-5">
                                    <p class="text-xl font-semibold">{{ Auth::user()->full_name }}</p>
                                    <p>Private</p>
                                </div>

                            </div>
                        </div>
                        <div class="flex flex-col border">
                            <a href="{{ route('profile-seller.edit') }}"
                                class="p-3 text-gray-500 hover:bg-opacity-10 hover:bg-gray-500">Profile</a>
                            <hr />
                            <a href="" class="p-3 text-gray-500 hover:bg-opacity-10 hover:bg-gray-500">Profile</a>
                            <hr />
                            <a href="" class="p-3 text-gray-500 hover:bg-opacity-10 hover:bg-gray-500">Profile</a>
                            <hr />
                            <a href="{{ route('change-password') }}"
                                class="p-3 text-gray-500 hover:bg-opacity-10 hover:bg-gray-500">Change Password</a>
                        </div>
                    </div>

                    @yield('profile')

                </div>

            </div>
        </div>
    </section>


@endsection
@section('script')
    <script>
    </script>
@endsection
