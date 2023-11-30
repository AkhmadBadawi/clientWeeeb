@extends('main')

@section('title', 'Data Penjualan')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Data Penjualan</h1>
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
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Transaksi</strong>
                        </div>

                        @if ($errors->any())
                        <div class="alert alert-danger mt-3 ">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        
                        @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <div class="card-body">
                            <div class="button-add" style="margin-bottom: 20px; width: 20px;">
                                <a href="./add_pelanggan" class="btn btn-primary">
                                    <i class="menu-icon fa fa-plus-square"></i> Tambah Transaksi
                                </a>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Transaksi</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Nama Barang</th>
                                        <th>Total Pembayaran</th>
                                        <th>Metode Pembayaran</th>
                                        <th>Status Pembayaran</th>
                                        <th>Tanggal Pengiriman</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_penjualan as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data['id_penjualan'] }}</td>
                                            <td>{{ $nama_pelanggan[$loop->index] }}</td>
                                            <td>{{ $nama_barang[$loop->index] }}</td>
                                            <td>{{ $data['total_pembayaran'] }}</td>
                                            <td>{{ $data['metode_pembayaran'] }}</td>
                                            <td>{{ $data['status_pembayaran'] }}</td>
                                            <td>{{ $data['tanggal'] }}</td>
                                            <td>
                                                <a href="{{ url('penjualan/'.$data['id_penjualan']) }}" class="btn btn-secondary m-2" style="border-radius: 10px;" title="Edit">
                                                    <i class="menu-icon fa fa-pencil"></i>
                                                </a>
                                                {{-- <form action="{{ url('penjualan/'.$data['id_penjualan']) }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin Menghapus Data ini?')" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" name="submit" class="btn btn-danger m-2" style="border-radius: 10px;" title="Delete">
                                                        <i class="menu-icon fa fa-trash-o"></i>
                                                    </button>
                                                </form> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection
