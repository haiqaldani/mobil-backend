@extends('layouts.app3')

@section('title', 'Register')

@section('content')
    <section class="flex flex-col md:flex-row h-screen items-center">

        <div class="bg-blue-600 hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen">
            <img src="{{ url('frontend/images/login.jpg') }}"
                alt="" class="w-full h-full object-cover">
        </div>

        <div
            class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12 flex items-center justify-center">

            <div class="w-full h-100">

                <a href="{{ url('/') }}" class="text-xl font-bold">Mobil</a>

                <h1 class="text-xl md:text-2xl font-bold leading-tight mt-5">Create your account</h1>

                <form class="mt-6 space-y-3" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="">
                        <label class="block text-gray-700" for="fullname">Full Name</label>
                        <input id="fullname" type="text"
                            class="w-full px-4 py-3 mt-2 rounded-lg bg-gray-200  border focus:border-blue-500 focus:bg-white focus:outline-none  @error('full_name') is-invalid @enderror"
                            name="full_name" value="{{ old('full_name') }}" placeholder="Enter your Full Name" autocomplete
                            autofocus>

                        @error('full_name')
                            <span class="invalid-feedback" role="alert">
                                <p class="text-red-600 text-xs">{{ $message }}</p>
                            </span>
                        @enderror
                    </div>

                    <div class="">
                        <label class="block text-gray-700">Email</label>
                        <input id="email" type="text"
                            class="w-full px-4 py-3 mt-2 rounded-lg bg-gray-200  border   focus:border-blue-500 focus:bg-white focus:outline-none @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="Enter your Email" autocomplete autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <p class="text-red-600 text-xs">{{ $message }}</p>
                            </span>
                        @enderror

                    </div>
                    <div class="">
                        <label class="block text-gray-700">Phone Number</label>
                        <div class="flex flex-row mt-2 ">
                            <p class="flex px-4 py-3 bg-blue-600 text-white rounded-l-lg font">+62</p>
                            <input id="phone_number" type="text"
                                class="flex w-full px-4 py-3 rounded-r-lg bg-gray-200 border focus:border-blue-500 focus:bg-white focus:outline-none @error('phone_number') is-invalid @enderror"
                                name="phone_number" value="{{ old('phone_number') }}"  placeholder="Enter your Phone Number" autocomplete
                                autofocus>
                        </div>


                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <p class="text-red-600 text-xs" >{{ $message }}</p>
                            </span>
                        @enderror
                    </div>
                    <div class="">
                        <label class="block text-gray-700">Password</label>

                        <input type="password" name="password" id="password" placeholder="At least 8 characters"
                            class="w-full px-4 py-3 mt-2 rounded-lg bg-gray-200  border focus:border-blue-500 focus:bg-white focus:outline-none @error('password') is-invalid @enderror">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <p class="text-red-600 text-xs">{{ $message }}</p>
                            </span>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full block bg-blue-600 hover:bg-blue-500 focus:bg-blue-500 text-white font-semibold rounded-lg px-4 py-3">Register</button>
                </form>

                <hr class="my-5 border-gray-300 w-full">

                <p class="mt-3">Have already an account? <a href="{{ route('login') }}"
                        class="text-blue-500 hover:text-blue-700 font-semibold">Login</a></p>

                <p class="text-sm text-gray-500 mt-12">&copy; 2020 Mobil - All Rights Reserved.</p>
            </div>
        </div>

    </section>
@endsection
