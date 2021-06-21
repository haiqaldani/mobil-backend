@extends('layouts.app')

@section('title', 'Promo')

@section('content')
    <header class="nav-header">
        <div class="container border-gray-200 border-b border-opacity-50 mb-5">
            <div class="flex flex-row md:mx-20 mx-10 my-2 space-x-2">
                <a class="px-1 font-semibold text-blue-600 hover:text-black" href="{{ url('/') }}">Beranda</a>
                <p class="font-semibold"> &gt; </p>
                <a class="px-1 font-semibold  text-blue-600 hover:text-black" href="{{ url('/promo') }}">Promo</a>
                <p class="font-semibold"> &gt; </p>
                <p class="font-semibold"> {{ $item->title }}</p>
            </div>
        </div>
        <main class="content-promo-detail">
            <div class="container mb-5">
                <div class="space-y-5">
                    <div class="grid justify-center">
                        <img class="object-cover w-full object-center h-72 rounded px-24"
                            src="{{ Storage::url($item->image) }}" alt="">
                    </div>
                    <div class="space-y-5">
                        <p class="text-center text-2xl font-semibold">{{ $item->title }}</p>
                        <div class="grid justify-center">
                            <div class="border p-5 space-y-3">
                                <p class="text-center text-lg">Kode Voucher</p>
                                <div class="border border-blue-600 rounded-md w-80">
                                    <p class="my-3 text-center">{{ $item->code }}</p>
                                </div>
                                <p class="text-xs text-center pb-5 border-b">Periode :
                                    {{ strftime('%d %b %Y', strtotime($item->created_at)) }} -
                                    {{ strftime('%d %b %Y', strtotime($item->expired)) }}</p>
                                <p class="text-center">
                                    @if ($item->promo_type == 'Discount')
                                        Potongan Diskon {{ $item->amount }}%
                                    @else
                                        Potongan Harga Rp. {{ number_format($item->amount, 0, ',', '.') }}
                                    @endif
                                </p>
                                <form action="{{ route('button-claim') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="promos_id" value="{{ $item->id }}">
                                    <button type="submit" class="w-full  @if (Carbon\Carbon::parse($item->expired) < $now || $item->quantity == 0) bg-gray-400 @else bg-blue-600 @endif text-white
                                            text-center p-3 rounded-md" @if (Carbon\Carbon::parse($item->expired) < $now || $item->quantity == 0) disabled @endif>
                                            @if (Carbon\Carbon::parse($item->expired) < $now) Kupon Sudah
                                            Kadaluarsa @elseif($item->quantity == 0) Kupon Habis @else Klaim Promo @endif</button>
                                </form>
                            </div>
                        </div>
                        <div class="mx-24">
                            {!! $item->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endsection
