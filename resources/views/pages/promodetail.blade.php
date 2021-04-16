@extends('layouts.app')

@section('title', 'Promo')

@section('content')
    <header class="mb-5">
        <div class="container">
            <div class="bg-green-400 grid justify-center">
                <img class="object-fill object-center h-72" src="{{ url('/frontend/images/login.jpg') }}" alt="">
            </div>
        </div>

    </header>
    <main class="content-promo-detail">
        <div class="container">
            <h1 class="text-center text-2xl font-bold" >{{ $item->title }}</h1>
            <p>
                {!! $item->description !!}
            </p>
        </div>
    </main>
@endsection
