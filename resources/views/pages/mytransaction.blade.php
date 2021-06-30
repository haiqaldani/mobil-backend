@extends('pages.account')


@section('profile')
    <div class="rounded-md col-span-2 bg-white">
        <div class="m-5 grid grid-cols-1 gap-3">
            {{-- <div class="border border-gray-400 grid grid-cols-3 p-5 text-center divide-x">
                <p>Code</p>
                <p>Status Transaksi</p>
                <p>Aksi</p>
            </div> --}}
            @foreach ($items as $item)
                <a href="{{ route('transaction-status', $item->id) }}">
                    <div class="hover:shadow-md border border-gray-200 grid grid-cols-5 p-5 rounded-md cursor-pointer"
                        onclick="location.href='{{ route('transaction-status', $item->id) }}">
                        <p>{{ $item->code }}</p>
                        <p class="col-span-2">
                            @if ($item->car_model_id == null)
                                {{ $item->interest_buyers->car_models->model }}    
                            @else 
                                {{ $item->car_variants->variant }}   
                            @endif
                        </p>
                        <p>
                            @if ($item->transaction_status == 0)
                                Batal
                            @elseif($item->transaction_status == 1)
                                Pending
                            @elseif($item->transaction_status == 2)
                                Process
                            @elseif($item->transaction_status == 3)
                                Menunggu Pembayaran Booking Fee
                            @elseif($item->transaction_status == 4)
                                Pembayaran Sedang Diverifikasi
                            @elseif($item->transaction_status == 5)
                                Pembayaran Berhasil, Silahkan Mengisi Data
                            @elseif($item->transaction_status == 6)
                                Menunggu Pembayaran DP atau Full
                            @elseif($item->transaction_status == 7)
                                Menunggu Kedatangan Mobil
                            @elseif($item->transaction_status == 8)
                                Mobil Sudah Diterima
                            @else
                                Surat-Surat Asli Sudah Diterima
                            @endif
                        </p>
                        <p class="text-right">Detail</p>
                    </div>
                </a>
            @endforeach

            <!-- component -->


        </div>
    </div>
@endsection
