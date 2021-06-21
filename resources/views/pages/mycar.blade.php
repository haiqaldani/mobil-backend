@extends('pages.account')


@section('profile')
    <div class="border col-span-2">
        <div class="grid grid-cols-3 m-5 gap-5">
            @foreach ($items as $item)
                <div class="border rounded-md cursor-pointer"
                    onclick="location.href='{{ route('carsused', $item->slug) }}'; ">
                    @if ($item->galleries->count() != null)
                        <div class="">
                            <img src="{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}"
                                alt="" class="object-center object-cover w-full rounded p-2 h-28">
                        </div>

                    @else
                        <div class="bg-gray-300 h-28">
                        </div>
                    @endif
                    <div class="p-2">
                        <p class="">{{ $item->title }}</p>
                        <p class="font-semibold">
                            Rp. {{ number_format($item->price, 0, ',', '.') }}
                        </p>
                        <div class="grid grid-cols-2 mt-1 text-white text-center gap-2">
                            <a href="{{ route('mycar-edit', $item->id) }}" class="p-2 bg-blue-600 rounded-md hover:bg-blue-700">Edit</a>
                            <a href="" class="p-2 bg-green-400 rounded-md hover:bg-green-500">Edit Foto</a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
@endsection
