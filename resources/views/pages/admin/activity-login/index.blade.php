@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 justify-content-between">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary">Aktivitas Login</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table_login" class="table" width="100%">
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
                              <td>{{ $item->device->platform }}</td>
                              <td>
                                  @if ($item->device->is_desktop == 1 )
                                      Desktop
                                  @elseif ($item->device->is_mobile == 1 )
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
@section('scripts')
   <script>
    $(document).ready(function() {
        $('#table_login').DataTable(

        );
    });
    </script>
@endsection
