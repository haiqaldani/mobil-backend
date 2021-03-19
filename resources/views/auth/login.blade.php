@extends('layouts.app3')

@section('title', 'Login')

@section('content')
    <section class="flex flex-col md:flex-row h-screen items-center">

        <div class="bg-blue-600 hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen">
            <img src="{{ url('frontend/images/login.jpg') }}"
                alt="" class="w-full h-full object-cover">
        </div>

        <div class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12
                                        flex items-center justify-center">

            <div class="w-full h-100">

                <a href="{{ url('/') }}" class="text-xl font-bold">Mobil</a>

                <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12">Log in to your account</h1>

                <form class="mt-6 space-y-3" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div>
                        <label class="block text-gray-700">Email or Username</label>
                        <input id="username" type="text"
                            class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none @error('username') is-invalid @enderror"
                            name="username" value="{{ old('username') }}" placeholder="Enter your Email/Username"
                            autocomplete autofocus>

                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <p class="text-red-600 text-xs">{{ $message }}</p>
                            </span>
                        @enderror
                    </div>

                    <div class="">
                        <label class="block text-gray-700">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter your Password"
                            class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
                                                focus:bg-white focus:outline-none  @error('password') is-invalid @enderror">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <p class="text-red-600 text-xs">{{ $message }}</p>
                            </span>
                        @enderror
                    </div>


                    @if (Route::has('password.request'))
                        <div class="text-right mt-2">
                            <a href="{{ route('password.request') }}"
                                class="text-sm font-semibold text-gray-700 hover:text-blue-700 focus:text-blue-700">Forgot
                                Password?</a>
                        </div>
                    @endif

                    <button type="submit" class="w-full block bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 text-white font-semibold rounded-lg
                                              px-4 py-3">Log In</button>
                </form>

                <hr class="my-6 border-gray-300 w-full">

                <p class="mt-8">Need an account? <a href="{{ route('register') }}"
                        class="text-blue-500 hover:text-blue-700 font-semibold">Create
                        an
                        account</a></p>

                <p class="text-sm text-gray-500 mt-12">&copy; 2020 Mobil - All Rights Reserved.</p>
            </div>
        </div>

    </section>
@endsection
