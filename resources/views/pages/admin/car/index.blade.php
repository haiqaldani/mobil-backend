@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Mobil</h1>
          <a href="{{ route('car.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
              <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Mobil
          </a>
      </div>

      <!-- Content Row -->
      <div class="row">
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                              <td>{{ $item->transmission }}</td>
                              <td>{{ $item->fuel }}</td>
                              <td>{{ $item->users->name }}</td>
                              <td>
                                  <a href="{{ route('car.edit', $item->id) }}" class="btn btn-info">
                                      <i class="fa fa-pencil-alt"></i>
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
