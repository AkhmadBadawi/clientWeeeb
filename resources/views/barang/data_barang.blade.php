@extends('main')

@section('title', 'Data Barang')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Data Barang</h1>
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
                            <strong class="card-title">Data Barang</strong>
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
                                <a href="./add_barang" class="btn btn-primary">
                                    <i class="menu-icon fa fa-plus-square"></i> Tambah Data Barang
                                </a>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Stok Barang</th>
                                        <th>Harga Satuan</th>
                                        <th>Deskripsi</th>
                                        <th>Pemasok</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_barang as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data['id_barang'] }}</td>
                                            <td>{{ $data['nama_barang'] }}</td>
                                            <td>{{ $data['stok_barang'] }}</td>
                                            <td>{{ $data['harga_barang'] }}</td>
                                            <td>{{ $data['deskripsi'] }}</td>
                                            <td>{{ $nama_pemasok[$loop->index]}}</td>
                                            <td>
                                                <a href="{{ url('barang/' . $data['id_barang']) }}"
                                                    class="btn btn-secondary m-2" style="border-radius: 10px;"
                                                    title="Edit">
                                                    <i class="menu-icon fa fa-pencil"></i>
                                                </a>
                                                <form action="{{ url('barang/' . $data['id_barang']) }}" method="POST"
                                                    onsubmit="return confirm('Apakah Anda Yakin Menghapus Data ini?')"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" name="submit" class="btn btn-danger m-2"
                                                        style="border-radius: 10px;" title="Delete">
                                                        <i class="menu-icon fa fa-trash-o"></i>
                                                    </button>
                                                </form>
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
