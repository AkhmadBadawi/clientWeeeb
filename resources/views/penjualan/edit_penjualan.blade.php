@extends('main')

@section('title', 'Form Edit Data Penjualan')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Form Edit Data Penjualan</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="./home">Dashboard</a></li>
                        <li class="active">WeebStore</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <form action="" method="POST">
                @csrf

                @method('put')
                <div class="card">
                    <div class="card-header"><strong>Form Edit Data Penjualan</strong>
                        @if ($errors->any())
                            <div class="alert alert-danger mt-3 ">
                                <ul>
                                    @foreach ($errors->all() as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="form-group"><label for="id_penjualan" class=" form-control-label">ID
                                    Penjualan</label><input type="text" id="id_penjualan"
                                    placeholder="Masukkan ID Penjualan" name="id_penjualan" class="form-control"
                                    value="{{ isset($data['id_penjualan']) ? $data['id_penjualan'] : old('id_penjualan') }}"
                                    disabled>
                                <input type="hidden" id="id_penjualan" name="id_penjualan" class="form-control"
                                    value="{{ isset($data['id_penjualan']) ? $data['id_penjualan'] : old('id_penjualan') }}">
                                <input type="hidden" id="id_pelanggan" name="id_pelanggan" class="form-control"
                                    value="{{ isset($data['id_pelanggan']) ? $data['id_pelanggan'] : old('id_pelanggan') }}">
                            </div>
                            <div class="row form-group mt-5">
                                <div class="col col-md-3"><label for="id_barang" class=" form-control-label">Nama
                                        Barang</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="id_barang" id="id_barang" class="form-control">
                                        @foreach ($data_barang as $item)
                                            <option value="{{ $item['id_barang'] }}"
                                                @if ($data['id_barang'] == $item['id_barang']) selected @endif>{{ $item['nama_barang'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group mt-5">
                                <div class="col col-md-3"><label for="metode_pembayaran" class=" form-control-label">Metode
                                        Pembayaran</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="metode_pembayaran" id="metode_pembayaran" class="form-control">
                                        <option value="Kredit" @if ($data['metode_pembayaran'] == 'Kredit') selected @endif>Kredit
                                        </option>
                                        <option value="Cash" @if ($data['metode_pembayaran'] == 'Cash') selected @endif>Cash
                                        </option>
                                        <option value="Debit" @if ($data['metode_pembayaran'] == 'Debit') selected @endif>Debit
                                        </option>
                                        <option value="Transfer" @if ($data['metode_pembayaran'] == 'Transfer') selected @endif>Transfer
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group mt-5">
                                <div class="col col-md-3"><label for="status_pembayaran" class=" form-control-label">Status
                                        Pembayaran</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="status_pembayaran" id="status_pembayaran" class="form-control">
                                        <option value="Lunas" @if ($data['status_pembayaran'] == 'Lunas') selected @endif>Lunas
                                        </option>
                                        <option value="Belum Lunas" @if ($data['status_pembayaran'] == 'Belum Lunas') selected @endif>Belum
                                            Lunas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"><label for="total_pembayaran" class=" form-control-label">Total
                                    Bayar</label><input type="number" id="total_pembayaran"
                                    placeholder="Masukkan Total Pembayaran" name="total_pembayaran" class="form-control"
                                    value="{{ isset($data['total_pembayaran']) ? $data['total_pembayaran'] : old('total_pembayaran') }}">
                            </div>
                            <div class="form-group"><label for="tanggal" class=" form-control-label">Tanggal
                                    Pengiriman</label><input type="date" id="tanggal"
                                    placeholder="Masukkan Total Pembayaran" name="tanggal" class="form-control"
                                    value="{{ isset($data['tanggal']) ? $data['tanggal'] : old('tanggal') }}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
            </form>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection
