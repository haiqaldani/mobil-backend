<!-- @extends('layouts.app')

@section('title', 'Login')

@section('content')
<main style="background-image: url('{{ url('frontend/images/login.jpg') }}'); background-size: 2000px; background-position: center; background-repeat: no-repeat;">
    <div class="container">
        <div class="grid px-5 py-5 justify-center">
            <div class="bg-white rounded-sm">
                <form class="mx-10 my-10 space-y-3" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h4 class="font-semibold text-2xl">Login</h4>
                    <div class="form-group">
                        <label for="email" class="font-semibold">Email or Username</label>

                        <div class="">
                            <input id="username" type="text"
                                class="w-full px-2 py-2 border border-blue-400 focus:outline-none  focus:border-black  @error('username') is-invalid @enderror"
                                name="username" value="{{ old('username') }}" required autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="font-semibold">{{ __('Password') }}</label>

                        <div class="">
                            <input id="password" type="password"
                                class="w-full px-2 py-2 border border-blue-400 focus:outline-none focus:border-black @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class=" offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="flex flex-col space-y-2">
                            <button type="submit" class="py-2 bg-blue-500 hover:bg-blue-600 text-white">
                                {{ __('Login') }}
                            </button>

                            @if(Route::has('password.request'))
                                <a class="hover:text-blue-600 text-sm"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="form-group flex flex-row justify-center space-x-2">
                        <hr class="flex w-16 my-2.5" />
                        <p class="flex text-sm">Don't Have Account?</p>
                        <hr class="flex w-16 my-2.5" />
                    </div>
                    <div class="form-group ">
                        <div class="flex flex-col space-y-2">
                            <a class="text-center rounded-sm text-white py-2 bg-yellow-400 hover:bg-yellow-500"
                                href="{{ route('register') }}">
                                Register
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection -->
