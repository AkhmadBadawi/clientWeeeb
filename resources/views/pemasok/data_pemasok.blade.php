@extends('main')

@section('title', 'Data Pemasok')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Data Pemasok</h1>
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
                            <strong class="card-title">Data Pemasok</strong>
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
                                <a href="./add_pemasok" class="btn btn-primary">
                                    <i class="menu-icon fa fa-plus-square"></i> Tambah Data Pemasok
                                </a>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Pemasok</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_pemasok as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data['id_pemasok'] }}</td>
                                            <td>{{ $data['nama_pemasok'] }}</td>
                                            <td>{{ $data['alamat_pemasok'] }}</td>
                                            <td>{{ $data['telepon'] }}</td>
                                            <td>{{ $data['jenis_kelamin'] }}</td>
                                            <td>
                                                <a href="{{ url('pemasok/'.$data['id_pemasok']) }}" class="btn btn-secondary m-2" style="border-radius: 10px;" title="Edit">
                                                    <i class="menu-icon fa fa-pencil"></i>
                                                </a>
                                                <form action="{{ url('pemasok/'.$data['id_pemasok']) }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin Menghapus Data ini?')" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" name="submit" class="btn btn-danger m-2" style="border-radius: 10px;" title="Delete">
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
