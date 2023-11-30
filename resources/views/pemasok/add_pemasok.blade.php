@extends('main')

@section('title', 'Form Data Pemasok')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Form Data Pemasok</h1>
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
            <form action="./pemasok" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header"><strong>Formulir Data Pemasok</strong>
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
                            <div class="form-group"><label for="id_pemasok" class=" form-control-label">ID
                                    Pemasok</label><input type="number" id="id_pemasok"
                                    placeholder="Masukkan ID Pemasok" name="id_pemasok" class="form-control" value="{{ old('id_pemasok') }}"></div>
                            <div class="form-group"><label for="nama_pemasok" class=" form-control-label">Nama
                                    Pemasok</label><input type="text" id="nama_pemasok"
                                    placeholder="Masukkan Nama Pemasok" name="nama_pemasok" class="form-control" value="{{ old('nama_pemasok') }}">
                            </div>
                            <div class="form-group"><label for="alamat_pemasok" class=" form-control-label">Alamat
                                    Pemasok</label><input type="text" id="alamat_pemasok"
                                    placeholder="Masukkan Alamat Pemasok" name="alamat_pemasok" class="form-control" value="{{ old('alamat_pemasok') }}"
                                    ></div>
                            <div class="form-group"><label for="telepon" class=" form-control-label">Nomer Telepon
                                    Pemasok</label><input type="number" id="telepon"
                                    placeholder="Masukkan Nomer Telepon Pemasok" name="telepon" class="form-control" value="{{ old('telepon') }}"
                                    ></div>
                            <div class="row form-group mt-5">
                                <div class="col col-md-3"><label for="jenis_kelamin" class=" form-control-label">Jenis Kelamin
                                        Pemasok</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
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
