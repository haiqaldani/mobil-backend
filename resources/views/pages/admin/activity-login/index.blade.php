@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gallery</h1>
          <a href="{{ route('gallery.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
              <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Gallery
          </a>
      </div>

      <!-- Content Row -->
      <div class="row">
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                      <tr>
                          <th>No</th>
                          <th>User ID</th>
                          <th>Ip Address</th>
                          <th>Platform</th>
                          <th>Desktop/Mobile</th>
                          <th>Trusted</th>
                          <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        @php $no = 1; @endphp
                      @forelse($items as $item)
                          <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $item->user_id }}</td>
                              <td>{{ $item->ip_address }}</td>
                              <td>{{ $item->platform }}</td>
                              <td>
                                  @if ($item->is_desktop == 1 )
                                      Desktop
                                  @elseif ($item->is_mobile == 1 )
                                      Mobile
                                  @endif
                              </td>
                              <td>
                                  @if ($item->is_trusted == 1 )
                                      Trusted
                                  @else
                                      Distrusted
                                  @endif
                              </td>
                              <td>
                                  <form action="{{ route('activity-login.destroy', $item->id) }}" method="post" class="d-inline">
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
