@extends('layouts.app')

@section('title', 'Promo')

@section('content')
    <main class="content-promo my-10">
        <div class="container">
            <div class="mx-10 flex flex-col space-y-4">
                <h3 class="text-xl font-bold" >Semua Promo</h3>
                <div class="grid grid-cols-4 gap-5">
                    @foreach ($items as $item)
                        <div class="border rounded cursor-pointer" onclick="location.href='{{ route('promo-detail', $item->slug) }}' ; ">
                            <img class="object-fill object-center rounded" src="{{ url('/frontend/images/login.jpg') }}" alt="">
                            <div class="m-2">
                                <p class="font-semibold text-lg" >{{ $item->title }}</p>
                                <p class="text-xs text-gray-500">Periode : {{ strftime("%d %b %Y",strtotime($item->created_at)) }} - {{ strftime("%d %b %Y",strtotime($item->expired)) }}</p>
                            </div>
                           
                        </div>
                    @endforeach
                </div>
            </div>
           
        </div>
    </main>
@endsection