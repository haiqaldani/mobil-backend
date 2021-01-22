@extends('layouts.app')

@section('title', 'Register')

@section('content')
<header class="title bg-gray-200 py-5">
    <div class="container mx-15">
        <h3 class="text-4xl font-bold">Register ke Mobil</h3>
    </div>
</header>
<main class="pb-5 bg-gray-200">
    <div class="container bg-gray-200">
        <div class="flex flex-row px-5 py-5 mx-15 space-x-5 justify-around bg-gray-50">
            <div class="flex flex-col space-y-5">
                <div class="">
                    <h4 class="font-bold text-2xl">
                        Sinkronisasi Platform
                    </h4>
                    <p class="">
                        Sekarang Anda dapat menampilkan semua mobil favorit dan simpan pencarian di desktop, mobile dan
                        aplikasi kami.
                    </p>
                </div>
                <div class="">
                    <h4 class="font-bold text-2xl">
                        Notifikasi email
                    </h4>
                    <p class="">
                        Notifikasi listing terbaru kami langsung ke email Anda.
                    </p>
                </div>
                <div class="">
                    <h4 class="font-bold text-2xl">
                        Mobil Preferred
                    </h4>
                    <p class="">
                        Terima tawaran dan listing terkini di situs kami lengkap dengan berita dari tim editorial kami.
                    </p>
                </div>
            </div>
            <div class="flex flex-col w-80 bg-white rounded-sm">
                <form class="mx-5 my-3 space-y-3" method="POST" action="{{ route('register') }}">
                    @csrf
                    <h4 class="font-semibold text-2xl">Register</h4>
                    {{-- <div class="form-group">
                        <label for="name" class="font-semibold">{{ __('Name') }}</label>
                
                        <div class="">
                            <input class="w-full px-2 py-2 border border-blue-400 focus:outline-none focus:border-black" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}

                    <div class="form-group">
                        <label for="username" class="font-semibold">{{ __('Username') }}</label>
                
                        <div class="">
                            <input class="w-full px-2 py-2 border border-blue-400 focus:outline-none focus:border-black" id="name" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                
                    <div class="form-group row">
                        <label for="email" class="font-semibold">{{ __('E-Mail Address') }}</label>
                
                        <div class="">
                            <input class="w-full px-2 py-2 border border-blue-400 focus:outline-none  focus:border-black" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                
                    <div class="form-group row">
                        <label for="password" class="font-semibold">{{ __('Password') }}</label>
                
                        <div class="">
                            <input class="w-full px-2 py-2 border border-blue-400 focus:outline-none  focus:border-black" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                
                    <div class="form-group row">
                        <label for="password-confirm" class="font-semibold">{{ __('Confirm Password') }}</label>
                
                        <div class="">
                            <input class="w-full px-2 py-2 border border-blue-400 focus:outline-none  focus:border-black" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                
                    <div class="form-group">
                        <div class="">
                            <button  type="submit" class="w-full py-2 bg-yellow-400 hover:bg-yellow-500 text-white">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                    <div class="form-group flex flex-row justify-center space-x-2">
                        <hr class="flex w-20 my-2.5"/>
                        <p class="flex text-sm">Have Account?</p>
                        <hr class="flex w-20 my-2.5"/>
                    </div>
                    
                    <div class="form-group ">
                        <div class="flex flex-col space-y-2">
                            <a class="text-center rounded-sm text-white py-2 bg-blue-500 hover:bg-blue-600" href="{{ route('login') }}">
                                Login
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
