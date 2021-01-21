@extends('layouts.app2')

@section('title', 'Locked')

@section('content')
<header class="title bg-gray-200 py-5">
    <div class="container mx-15">
        <h3 class="text-4xl font-bold">Login ke Mobil</h3>
    </div>
</header>
<main class="pb-5 bg-gray-200">
    <div class="container bg-gray-200">
        <div class="flex flex-col w-80 bg-white rounded-sm">
            <form class="mx-5 my-3 space-y-3" method="POST" action="{{ route('login.unlock') }}">
                @csrf
                <h4 class="font-semibold text-2xl">Account Locked</h4>

                <div class="form-group">
                    <label for="password" class="font-semibold">{{ __('Password') }}</label>

                    <div class="">
                        <input id="password" type="password"
                            class="w-full px-2 py-2 border border-blue-400 focus:outline-none focus:border-black {{ $errors->has('password') ? ' is-invalid' : '' }}"
                            name="password" required autocomplete="current-password">

                        @if($error->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $error->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group ">
                    <div class="flex flex-col space-y-2">
                        <button type="submit" class="py-2 bg-blue-500 hover:bg-blue-600 text-white">
                            {{ __('Unlock') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="flex flex-row px-5 py-5 mx-15 space-x-5 justify-around bg-gray-50">
            <div class="flex flex-col space-y-5">
                <div class="">
                    <h4 class="font-bold text-2xl">
                        Account Locked
                    </h4>
                    <p class="">
                        Masukkan password dan buka kunci.
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
