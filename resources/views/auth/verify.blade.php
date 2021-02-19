@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="border mx-48 my-10 flex-col flex rounded-lg">
            <div class="m-5">
                <div class="border-b-2">
                    <h1 class="font-bold text-xl">{{ __('Verify Your Email Address') }}</h1>
                </div>
                <div class="m-3">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit"
                            class="text-blue-500 underline hover:text-black">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
