@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="card shadow">
            <div class="card-header py-3 justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">Transaksi {{ $item->code }}</h3>
            </div>
            <div class="card-body">
                <!-- Content Row -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('interest-buyer.update', $item->id) }}" method="post"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    @if ($item->transaction_status == '6')
                    <input name="transaction_id" type="hidden" value="{{ $item->id }}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="name">Nama di KTP</label>
                                <input type="text" class="form-control" name="name" placeholder="First name"
                                    aria-label="Name" value="{{ $item->pols->name }}" @if($item->transaction_status >= 7) disabled @endif>
                            </div>
                            <div class="col">
                                <label for="lastname">Nomor KTP</label>
                                <input type="text" class="form-control" name="idcard_number" placeholder="Last name"
                                    aria-label="Last name" value="{{ $item->pols->idcard_number }}"  @if($item->transaction_status >= 7) disabled @endif>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="name">Tempat Lahir</label>
                                <input type="text" class="form-control" name="name" placeholder="First name"
                                    aria-label="Name" value="{{ $item->pols->place_of_birth }}"  @if($item->transaction_status >= 7) disabled @endif>
                            </div>
                            <div class="col">
                                <label for="lastname">Tanggal Lahir</label>
                                <input type="text" class="form-control" name="idcard_number" placeholder="Last name"
                                    aria-label="Last name" value="{{ $item->pols->date_of_birth }}"  @if($item->transaction_status >= 7) disabled @endif>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat di KTP</label>
                        <textarea name="address" id="address" class="form-control"  @if($item->transaction_status >= 7) disabled @endif>{{ $item->pols->address }}</textarea>
                    </div> 
                    @endif

                    @if ($item->transaction_status == 4)
                        <div class="form-group">
                            <img src="{{ Storage::url($item->proof_payment) }}" alt="{{ $item->code }}" style="height: 200px">
                        </div>
                    @endif
                   
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="transaction_status">
                            <option value="2" @if ($item->transaction_status == 2) selected @endif>Pembeli sudah dihubungi</option>
                            {{-- <option value="WAITING BOOKING FEE" @if ($item->transaction_status == 'WAITING BOOKING FEE') selected @endif>Menunggu pembayaran booking mobil</option> --}}
                            <option value="5" @if ($item->transaction_status == 5) selected @endif>Pembayaran booking mobil berhasil</option>
                            <option value="6" @if ($item->transaction_status == 6) selected @endif>Menunggu Pembayaran DP atau Full</option>
                            <option value="7" @if ($item->transaction_status == 7) selected @endif>Menunggu Kedatangan Mobil</option>
                            <option value="8" @if ($item->transaction_status == 8) selected @endif>Mobil telah diterima</option>
                            <option value="9" @if ($item->transaction_status == 9) selected @endif>STNK asli dan Mobil sudah diterima</option>
                            <option value="0" @if ($item->transaction_status == 0) selected @endif>Pembeli tidak berminat membeli</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Ubah
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
