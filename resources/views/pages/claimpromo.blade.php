@extends('layouts.app')

@section('title', 'Mobil Bekas')

@section('content')
    <main class="claim-promo">
        <div class="container">
            <div class="grid justify-center my-10">
                <div class="border border-black w-96 ">
                    <div class="mb-5 space-y-2">
                        <h1 class="text-center text-lg font-semibold border-b py-3">Tambah Voucher</h1>
                        <form action="{{ route('claim') }}" method="post" class="flex flex-col space-y-3">
                            @csrf
                            <div class="flex">
                                <input type="text" name="code" id="code" placeholder="Masukkan Kode Promo"
                                    class="w-full mx-3 border uppercase outline-none focus:ring-2 focus:ring-blue-500 text-center rounded-sm py-2 border-blue-900 ">
                            </div>

                            <div class="flex">
                                <button class="w-full text-white text-lg mx-3 py-2 outline-none bg-green-400 text-center"
                                    type="submit">
                                    Klaim
                                </button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>

            <div class="grid justify-items-start mx-10 md:mx-20 mb-10">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    {{-- @if ($items->users_id == Auth::user()->id) --}}

                    @foreach ($items->promos as $item)
                        <div class="grid grid-cols-3 border @if(Carbon\Carbon::parse($item->expired) < $now) bg-gray-400 @endif">
                            <div class="flex border-r items-stretch @if(Carbon\Carbon::parse($item->expired) < $now) bg-gray-400 @else bg-green-400 @endif ">
                                <p class="m-3 self-center text-center text-white font-semibold text-xl">{{ $item->promo_type }}</p>
                            </div>
                            <div class="col-span-2"> 
                                <div class="m-3">
                                    <p class="font-medium" >Voucher Cashback Imlek</p>
                                    @if( Carbon\Carbon::parse($item->expired) >= $now )
                                        <p>Hingga {{ Carbon\Carbon::parse($item->expired)->format('d-m-Y')}}</p>
                                    @else
                                        <p>Expired {{ Carbon\Carbon::parse($item->expired)->format('d-m-Y') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- @endif --}}
                    {{-- <div class="grid grid-cols-3 border">
                        <div class="flex border-r items-stretch">
                            <p class="m-3 self-center">Cashback 10%</p>
                        </div>
                        <div class="col-span-2">
                            <div class="m-3">
                                <p>Voucher Cashback Imlek</p>
                                <p>Hingga 28.02.2021 </p>
                            </div>

                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </main>
@endsection
