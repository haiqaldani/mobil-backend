@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 justify-content-between">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary text-2xl">Mobil Favorite</h3>
                    {{-- <div class="">
                        <a href="{{ route('car-model.create') }}"
                            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Model Mobil
                        </a>
                    </div> --}}
                    
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table_car_model" class="table" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Mobil</th>
                                <th>Total disimpan</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @forelse($items as $item)
                            @if ( DB::table('favorites')->where('favoriteable_id', $item->id)->count() != 0 )
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->model }}</td>
                                <td>{{ DB::table('favorites')->where('favoriteable_id', $item->id)->count() }}</td>
                                {{-- <td>
                                    <form action="{{ route('car-model.destroy', $item->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>

                                </td> --}}
                            </tr>
                            @endif
                               
                            @empty
                                <td colspan="7" class="text-center">
                                    Data Kosong
                                </td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#table_car_model').DataTable(

        );
    });

</script>
@endsection
