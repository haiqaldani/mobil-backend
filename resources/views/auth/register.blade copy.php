<!-- @extends('layouts.app')

@section('title', 'Register')

@section('content')
    <main style="background-image: url('{{ url('frontend/images/login.jpg') }}'); background-size: 2000px; background-position: center; background-repeat: no-repeat;">
        <div class="container">
            <div class="grid px-5 py-5 justify-center">
                <div class="bg-white rounded-sm ">
                    <form class="mx-10 my-10 justify-center space-y-3" method="POST" action="{{ route('register') }}">
                        @csrf
                        <h4 class="font-semibold text-center text-2xl">Register</h4>    
                        <div class="form-group">
                            <div class="grid grid-cols-2 gap-2">
                                <div class="">
                                    <label class="font-semibold" for="first_name">First Name</label>
                                    <input class="w-full px-2 py-2 border border-blue-400 focus:outline-none focus:border-black"
                                        id="first_name" type="text"
                                        class="form-control @error('first_name') is-invalid @enderror" first_name="first_name"
                                        value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                </div>
                                <div class="">
                                    <label class="font-semibold" for="last_name">Last Name</label>
                                    <input class="w-full px-2 py-2 border border-blue-400 focus:outline-none focus:border-black"
                                        id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                                        last_name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name"
                                        autofocus>
                                </div>
    
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="font-semibold">{{ __('E-Mail Address') }}</label>
    
                            <div class="">
                                <input class="w-full px-2 py-2 border border-blue-400 focus:outline-none  focus:border-black"
                                    id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="username" class="font-semibold">{{ __('Phone Number') }}</label>
                            <div class="flex flex-row">
                                <p class="flex p-2 bg-blue-900 text-white font-medium">+62</p>
                                <input
                                    class="flex w-full px-2 py-2 border border-blue-400 focus:outline-none focus:border-black"
                                    id="name" type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                    name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number"
                                    autofocus>
    
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="password" class="font-semibold">{{ __('Password') }}</label>
    
                            <div class="">
                                <input class="w-full px-2 py-2 border border-blue-400 focus:outline-none  focus:border-black"
                                    id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password">
    
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
                                <input class="w-full px-2 py-2 border border-blue-400 focus:outline-none  focus:border-black"
                                    id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                    required autocomplete="new-password">
                            </div>
                        </div>
    
                        <div class="form-group">
                            <div class="">
                                <button type="submit" class="w-full py-2 bg-yellow-400 hover:bg-yellow-500 text-white">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <div class="form-group flex flex-row justify-center space-x-2">
                            <hr class="flex w-20 my-2.5" />
                            <p class="flex text-sm">Have Account?</p>
                            <hr class="flex w-20 my-2.5" />
                        </div>
    
                        <div class="form-group ">
                            <div class="flex flex-col space-y-2">
                                <a class="text-center rounded-sm text-white py-2 bg-blue-500 hover:bg-blue-600"
                                    href="{{ route('login') }}">
                                    Login
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
              
            </div>
        </div>
    </main>
@endsection -->
