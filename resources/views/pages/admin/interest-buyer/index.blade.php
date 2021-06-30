@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 justify-content-between">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary text-2xl">Pembeli Berminat</h3>
                    {{-- <a href="{{ route('merk.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                          <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Merk
                      </a> --}}
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table_merk" class="table" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Nomor HP/WA</th>
                                <th>Jadwal</th>
                                <th>Pembayaran</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @forelse($items as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td><a
                                            href="{{ route('user.edit', $item->users->id) }}">{{ $item->users->full_name }}</a>
                                    </td>
                                    <td>
                                        <a href="http://wa.me/62{{ $item->phone_number }}">
                                            62{{ $item->users->phone_number }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($item->schedule)->format('d F Y h:m') }}</p>
                                    </td>
                                    <td>{{ $item->payment }}</td>
                                    <td>
                                        @if ($item->transactions->transaction_status == 0)
                                            CANCEL
                                        @elseif($item->transactions->transaction_status == 1)
                                            PENDING
                                        @elseif($item->transactions->transaction_status == 2)
                                            PROCESS
                                        @elseif($item->transactions->transaction_status == 3)
                                            WAITING BOOKING FEE
                                        @elseif($item->transactions->transaction_status == 4)
                                            BOKING FEE IN VERIFICATION
                                        @elseif($item->transactions->transaction_status == 5)
                                            PAYMENT SUCCESS
                                        @elseif($item->transactions->transaction_status == 6)
                                           WAITING FOR PAYMENT FULL OR DP
                                        @elseif($item->transactions->transaction_status == 7)
                                            WAITING CAR
                                        @elseif($item->transactions->transaction_status == 8)
                                            CAR RECIVED
                                        @else
                                            SUCCESS
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <a href="http://wa.me/62{{ $item->phone_number }}" class="btn btn-success">
                                            <i class="fa fa-comment"></i>
                                        </a> --}}
                                        @if ($item->transactions->transaction_status == 2)
                                            <a href="{{ route('transaction.edit', $item->transactions->id) }}"
                                                class="btn btn-info">
                                                <i class="fa fa-plus"></i>
                                                Booking Fee
                                            </a>
                                        @endif

                                        <a href="{{ route('interest-buyer.edit', $item->transactions->id) }}"
                                            class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>

                                
                                        <form action="{{ route('interest-buyer.destroy', $item->id) }}" method="post"
                                            class="d-inline">
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
        $('#table_cartype').DataTable(

        );
    });
</script>
@endsection
