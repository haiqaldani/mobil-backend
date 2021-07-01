@extends('pages.account')


@section('profile')
    <div class="border col-span-2 bg-white">
        <div class="grid grid-cols-1 md:grid-cols-3 m-5 gap-5">
            @foreach ($items as $item)
                @if ($item->isFavoritedBy(Auth::user()) == $item->id)
                    <div class="border rounded-md cursor-pointer hover:shadow-md"
                        onclick="location.href='{{ route('model-detail', [$item->merks->slug, $item->slug_model]) }}'; ">
                        @if ($item->car_galleries->count() != null)
                            <div class="">
                                <img src="{{ $item->car_galleries->count() ? Storage::url($item->car_galleries->first()->image) : '' }}"
                                    alt="" class="object-center object-cover rounded w-auto p-2 md:h-28 h-40">
                            </div>

                        @else
                            <div class="bg-gray-300 h-28">
                            </div>
                        @endif
                        <div class="p-2">
                            <p class="">{{ $item->model }}</p>
                            <p class="md:text-sm text-base font-medium">
                                @if ($item->car_variants->count() == 1)
                                    Rp.
                                    {{ $item->car_variants->count() ? number_format($item->car_variants->first()->price, 0, ',', '.') : '' }}
                                @elseif ( $item->car_variants->count() == 0 )
                                    Harga Belum Ada
                                @else
                                    Rp.
                                    {{ $item->car_variants->count() ? number_format($item->car_variants->first()->price, 0, ',', '.') : '' }}
                                    -
                                    {{ $item->car_variants->count() ? number_format($item->car_variants->last()->price, 0, ',', '.') : '' }}
                                @endif
                            </p>
                            
                        </div>


                    </div>
                @endif
            @endforeach

        </div>
    </div>
@endsection
