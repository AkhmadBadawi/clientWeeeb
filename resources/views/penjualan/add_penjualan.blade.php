@extends('main')

@section('title', 'Form Data Penjualan')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Form Data Penjualan</h1>
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
            @if (session()->has('gagal'))
                <div class="alert alert-danger">
                    {{ session('gagal') }}
                </div>
            @endif
            <form action="./penjualan" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header"><strong>Formulir Data Penjualan</strong>
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
                                    Penjualan</label><input type="number" id="id_penjualan"
                                    placeholder="{{ $random }}" name="id_penjualan" class="form-control"
                                    value="{{ $random }}"  disabled>
                                    <input type="hidden" id="id_penjualan"
                                    placeholder="{{ $random }}" name="id_penjualan" class="form-control"
                                    value="{{ $random }}">
                                <input type="hidden" id="id_pelanggan" name="id_pelanggan" class="form-control"
                                    value="{{ $id_pelanggan ?? old('id_pelanggan') }}">
                            </div>
                            <div class="row form-group mt-5">
                                <div class="col col-md-3"><label for="id_barang" class=" form-control-label">Nama
                                        Barang</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="id_barang" id="id_barang" class="form-control">
                                        @foreach ($data_barang as $item)
                                            <option value="{{ $item['id_barang'] }}">{{ $item['nama_barang'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group mt-5">
                                <div class="col col-md-3"><label for="metode_pembayaran" class=" form-control-label">Metode
                                        Pembayaran</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="metode_pembayaran" id="metode_pembayaran" class="form-control">
                                        <option value="Kredit">Kredit</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Debit">Debit</option>
                                        <option value="Transfer">Transfer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group mt-5">
                                <div class="col col-md-3"><label for="status_pembayaran" class=" form-control-label">Status
                                        Pembayaran</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="status_pembayaran" id="status_pembayaran" class="form-control">
                                        <option value="Lunas">Lunas</option>
                                        <option value="Belum Lunas">Belum Lunas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"><label for="jumlah" class=" form-control-label">Jumlah
                                    Barang</label><input type="number" id="jumlah" placeholder="Masukkan Jumlah Barang"
                                    name="jumlah" class="form-control" value="{{ old('jumlah') }}">
                            </div>
                            <div class="form-group"><label for="tanggal" class=" form-control-label">Tanggal
                                    Pengirima</label><input type="date" id="tanggal"
                                    placeholder="Masukkan Jumlah Barang" name="tanggal" class="form-control"
                                    value="{{ old('tanggal') }}">
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
