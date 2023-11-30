@extends('main')

@section('title', 'Data Pelanggan')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Data Pelanggan</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="./home">Dashboard</a></li>
                        <li class="active">WeebStore/li>
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
                            <strong class="card-title">Data Pelanggan</strong>
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
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Pelanggan</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_pelanggan as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data['id_pelanggan'] }}</td>
                                            <td>{{ $data['nama_pelanggan'] }}</td>
                                            <td>{{ $data['alamat'] }}</td>
                                            <td>{{ $data['email'] }}</td>
                                            <td>{{ $data['jenis_kelamin'] }}</td>
                                            <td>
                                                <a href="{{ url('pelanggan/'.$data['id_pelanggan']) }}" class="btn btn-secondary m-2" style="border-radius: 10px;" title="Edit">
                                                    <i class="menu-icon fa fa-pencil"></i>
                                                </a>
                                                <form action="{{ url('pelanggan/'.$data['id_pelanggan']) }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin Menghapus Data ini?')" class="d-inline">
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
