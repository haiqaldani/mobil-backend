@extends('pages.account')


@section('profile')
    <div class="border col-span-2">
        <div class="grid grid-cols-1 md:grid-cols-3 m-5 gap-5">
            @foreach ($items as $item)
                <div class="border rounded-md cursor-pointer relative"
                    onclick="location.href='{{ route('carsused', $item->slug) }}'; ">
                    @if ($item->status == 0)
                        <div
                            class="absolute bg-black items-center opacity-80 text-center py-28 font-semibold text-3xl text-white w-full h-full rounded-md">
                            Sudah Terjual</div>
                    @endif
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
                        <div class="grid grid-cols-2 mt-1 text-white text-center gap-2 text-sm">
                            <a href="{{ route('mycar-edit', $item->id) }}"
                                class="p-2 bg-blue-600 rounded-md hover:bg-blue-700">Edit</a>
                            <form action="{{ route('mycar-delete', $item->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="bg-red-600 p-2 rounded-md w-full">
                                    Hapus
                                </button>
                            </form>
                        </div>

                        <form action="{{ route('mycar-sold', $item->id) }}" method="post" class="mt-2">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" value="0" name="status">
                            <button class="bg-green-500 p-2 rounded-md w-full text-white">
                                Ubah Sudah Laku
                            </button>
                        </form>


                    </div>
                </div>

            @endforeach
        </div>
    </div>
@endsection
