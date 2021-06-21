@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 justify-content-between">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary text-2xl">Mobil</h3>
                    <a href="{{ route('car.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Mobil
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table_car" class="table" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Tahun Mobil</th>
                                <th>Transmisi</th>
                                <th>Bahan Bakar</th>
                                <th>Penjual</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @forelse($items as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->car_year }}</td>
                                    <td>{{ $item->car_variants->transmission }}</td>
                                    <td>{{ $item->car_variants->fuel }}</td>
                                    <td>{{ $item->users->username }}</td>
                                    <td>
                                        <a clas href="{{ route('car-galleries', $item->id) }}" class="btn btn-info">
                                            <i class="fa fa-file-image"></i>
                                        </a>
                                        <a href="{{ route('car.edit', $item->id) }}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <a clas href="{{ route('car.show', $item->id) }}" class="btn btn-info">
                                            <i class="fa fa-eye"></i>

                                        </a>
                                        <form action="{{ route('car.destroy', $item->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
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
        $('#table_car').DataTable(

        );
    });

</script>
<script type="text/javascript">
    function changeAtiveTab(event, tabID) {
        let element = event.target;
        while (element.nodeName !== "A") {
            element = element.parentNode;
        }
        ulElement = element.parentNode.parentNode;
        aElements = ulElement.querySelectorAll("li > a");
        tabContents = document.getElementById("tabs-id").querySelectorAll(".tab-content > div");
        for (let i = 0; i < aElements.length; i++) {
            aElements[i].classList.remove("underline");
            aElements[i].classList.remove("text-blue-600");
            aElements[i].classList.add("no-underline");
            aElements[i].classList.add("text-black");
            tabContents[i].classList.add("hidden");
            tabContents[i].classList.remove("block");
        }
        element.classList.remove("no-underline");
        element.classList.remove("text-black");
        element.classList.add("underline");
        element.classList.add("text-blue-600");
        document.getElementById(tabID).classList.remove("hidden");
        document.getElementById(tabID).classList.add("block");
    }

</script>
<script type="text/javascript">
    
</script>
@endsection
