@extends('layouts.app2')

@section('title', 'Jual Mobil')

@section('content')
    <section class="section-create">
        <div class="container">
            
            <div class="max-w-4xl mx-auto  @if ($item->transaction_status == 3) my-10
        @elseif($item->transaction_status == 5) my-7 @else my-44 @endif pb-4 bg">
            <p class="text-2xl font-semibold text-gray-800 text-center my-5">Status Transaksi</p>
            <div class="flex pb-3 bg-white p-5 rounded-md">
                <div class="flex-1">
                </div>

                <div class="flex-1 flex-col space-y-2 bg">
                    <div class="w-32 h-10 @if ($item->transaction_status > 2) bg-green-400 @else border border-gray-400 @endif mx-auto rounded-full
                        text-lg text-white flex items-center">
                        @if ($item->transaction_status >= 3)
                            <span class="text-white text-center w-full">
                                <i class="fa fa-check w-full fill-current white"></i>
                            </span>
                        @else
                            <span class="text-gray-800 text-center w-full">1</span>
                        @endif
                    </div>
                    <div class="text-xs text-center">
                        @if ($item->transaction_status == 1)
                            Permintaan diterima, kami akan menghubungimu sebentar lagi
                        @elseif($item->transaction_status == 2)
                            Menunggu kedatangan pembeli
                        @elseif($item->transaction_status >= 3)
                            Permintaan berhasil
                        @else
                            Status Permintaan
                        @endif

                    </div>
                </div>


                <div class="w-10/12 align-center items-center align-middle content-center mt-4">
                    <div class="w-full bg-gray-400 rounded items-center align-middle align-center flex-1">
                        <div class="@if ($item->transaction_status >= 3) bg-green-400 @endif text-xs leading-none py-1 text-center
                            text-grey-darkest rounded "
                            style="width: 100%"></div>
                    </div>
                </div>


                <div class="flex-1 flex-col space-y-2">
                    <div class="w-32 h-10 @if ($item->transaction_status >= 5) bg-green-400 @else border border-gray-400 @endif mx-auto rounded-full
                        text-lg text-white flex items-center">
                        @if ($item->transaction_status >= 5)
                            <span class="text-white text-center w-full">
                                <i class="fa fa-check w-full fill-current white"></i>
                            </span>
                        @else
                            <span class="text-gray-800 text-center w-full">2</span>
                        @endif
                    </div>
                    <div class="text-xs text-center">
                        @if ($item->transaction_status == 3)
                            Lakukan pembayaran booking mobil
                        @elseif ($item->transaction_status == 4 )
                            Pembayaran booking sedang diverifikasi
                        @elseif ($item->transaction_status >= 5 )
                            Pembayaran booking berhasil
                        @else
                            Status Pembayaran
                        @endif

                    </div>
                </div>

                <div class="w-10/12 align-center items-center align-middle content-center mt-4">
                    <div class="w-full bg-gray-400 rounded items-center align-middle align-center flex-1">
                        <div class="@if ($item->transaction_status >= 5) bg-green-400 @endif text-xs leading-none py-1 text-center
                            text-grey-darkest
                            rounded" style="width: 100%"></div>
                    </div>
                </div>

                <div class="flex-1 flex-col space-y-2">
                    <div class="w-32 h-10 @if ($item->transaction_status >= 6) bg-green-400 @else border border-gray-400 @endif mx-auto rounded-full
                        text-lg text-white flex items-center">
                        @if ($item->transaction_status >= 6)
                            <span class="text-white text-center w-full">
                                <i class="fa fa-check w-full fill-current white"></i>
                            </span>
                        @else
                            <span class="text-gray-800 text-center w-full">3</span>
                        @endif
                    </div>
                    <div class="text-xs text-center">
                        @if ($item->transaction_status == 5)
                            Silahkan mengisi data pembelian mobil
                        @elseif($item->transaction_status == 6)
                            Data sudah terkirim
                        @else
                            Status Pengisian Data
                        @endif
                    </div>
                </div>

                <div class="w-10/12 align-center items-center align-middle content-center mt-4">
                    <div class="w-full bg-gray-400 rounded items-center align-middle align-center flex-1">
                        <div class="@if ($item->transaction_status >= 6) bg-green-400 @endif text-xs leading-none py-1 text-center
                            text-grey-darkest rounded"
                            style="width: 100%"></div>
                    </div>
                </div>


                <div class="flex-1 flex-col space-y-2">
                    <div class="w-32 h-10 @if ($item->transaction_status >= 8) bg-green-400 @else border border-gray-400 @endif
                        mx-auto rounded-full
                        text-lg text-white flex items-center">
                        @if ($item->transaction_status >= 8)
                            <span class="text-white text-center w-full">
                                <i class="fa fa-check w-full fill-current white"></i>
                            </span>
                        @else
                            <span class="text-gray-800 text-center w-full">4</span>
                        @endif
                    </div>
                    <div class="text-xs text-center">
                        @if ($item->transaction_status == 6)
                            Menunggu pembayaran dp atau full
                        @elseif($item->transaction_status == 7 )
                            Menunggu kedatangan Mobil
                        @elseif($item->transaction_status >= 8)
                            Mobil sudah diterima
                        @else
                            Status Mobil
                        @endif
                    </div>
                </div>

                <div class="w-10/12 align-center items-center align-middle content-center mt-4">
                    <div class="w-full bg-gray-400 rounded items-center align-middle align-center flex-1">
                        <div class="@if ($item->transaction_status >= 8) bg-green-400 @endif text-xs leading-none py-1
                            text-center text-grey-darkest rounded" style="width: 100%"></div>
                    </div>
                </div>


                <div class="flex-1 flex-col space-y-2">
                    <div class="w-32 h-10 @if ($item->transaction_status == 9) bg-green-400 @else border border-gray-400 @endif mx-auto rounded-full
                        text-lg text-white flex items-center">
                        @if ($item->transaction_status == 9)
                            <span class="text-white text-center w-full">
                                <i class="fa fa-check w-full fill-current white"></i>
                            </span>
                        @else
                            <span class="text-gray-800 text-center w-full">5</span>
                        @endif
                    </div>
                    <div class="text-xs text-center">
                        @if ($item->transaction_status == 9)
                            STNK Asli sudah diterima
                        @else
                            Status STNK
                        @endif
                    </div>
                </div>


                <div class="flex-1">
                </div>
            </div>
            @if ($item->transaction_status == 3)
                <div class="mx-32 mt-4 justify-center bg-white p-5">

                    <div class="text-center font-semibold text-gray-800 text-lg my-5">
                        @if ($item->booking_fee != null)
                            Total Pembayaran : Rp. {{ number_format($item->booking_fee, 0, ',', '.') }}

                        @else
                            Booking Fee akan segera diinput, tunggu beberapa saat lagi
                        @endif
                    </div>
                    <form action="{{ route('proofpayment-update', $item->id) }}" method="post" class="grid gap-3"
                        enctype="multipart/form-data">
                        @csrf
                        @method('Patch')
                        <div class="flex flex-col space-y-2">
                            <label for="proof_payment" class="text-gray-700 text-sm">Upload bukti pembayaran</label>
                            <input type="file" name="proof_payment" accept="image/*"
                                class="p-3 rounded-md border-gray-200 focus:border-blue-default border">
                        </div>
                        <button type="submit" class="p-3 bg-blue-600 text-white font-medium rounded-md">Upload
                            bukti</button>
                    </form>
                </div>
            @elseif($item->transaction_status == 5)
                <form action="{{ route('pols-create') }}" method="POST" class="flex flex-col space-y-4">
                    @csrf
                    <input name="transaction_id" type="hidden" value="{{ $item->id }}">
                    <div class="form-group">
                        <div class="grid grid-cols-2 gap-5">
                            <div class="flex flex-col">
                                <label for="name">Nama di KTP</label>
                                <input type="text" class="border border-gray-200 focus:border-blue-default p-3 focus:outline-none rounded-md"
                                    name="name" placeholder="Nama" aria-label="Name" value="">
                            </div>
                            <div class="flex flex-col">
                                <label for="lastname">Nomor KTP</label>
                                <input type="text" class="border border-gray-200 focus:border-blue-default p-3 focus:outline-none rounded-md"
                                    name="idcard_number" placeholder="Nomor KTP" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="grid grid-cols-2 gap-5">
                            <div class="flex flex-col">
                                <label for="name">Tempat Lahir</label>
                                <input type="text" class="border border-gray-200 focus:border-blue-default p-3 focus:outline-none rounded-md"
                                    name="place_of_birth" placeholder="Tempat Lahir" value="">
                            </div>
                            <div class="flex flex-col">
                                <label for="lastname">Tanggal Lahir</label>
                                <input type="text" class="border border-gray-200 focus:border-blue-default p-3 focus:outline-none rounded-md"
                                    name="date_of_birth" placeholder="Tanggal Lahir" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group flex flex-col">
                        <label for="address">Alamat di KTP</label>
                        <input name="address" id="address"
                            class="border border-gray-200 focus:border-blue-default p-3 focus:outline-none rounded-md"
                            placeholder="Alamat"></input>
                    </div>
                    <button type="submit" class="p-3 bg-blue-600 text-white rounded-md font-semibold">Submit</button>
                </form>

            @endif

        </div>
    </div>
</section>
@endsection
