@extends('main')

@section('title', 'Form Data Pelanggan')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Form Data Pelanggan</h1>
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
                    <div class="card-header"><strong>Formulir Data Pelanggan</strong>
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
                            <div class="form-group"><label for="id_pelanggan" class=" form-control-label">ID
                                    Pelanggan</label><input type="text" id="id_pelanggan"
                                    placeholder="Masukkan ID Pelanggan" name="id_pelanggan" class="form-control"
                                    value="{{ isset($data['id_pelanggan']) ? $data['id_pelanggan'] : old('id_pelanggan') }}"
                                    disabled>
                                <input type="hidden" id="id_pelanggan" placeholder="Masukkan ID Pelanggan"
                                    name="id_pelanggan" class="form-control"
                                    value="{{ isset($data['id_pelanggan']) ? $data['id_pelanggan'] : old('id_pelanggan') }}">
                            </div>
                            <div class="form-group"><label for="nama_pelanggan" class=" form-control-label">Nama
                                    Pelanggan</label><input type="text" id="nama_pelanggan"
                                    placeholder="Masukkan Nama Pelanggan" name="nama_pelanggan" class="form-control"
                                    value="{{ isset($data['nama_pelanggan']) ? $data['nama_pelanggan'] : old('nama_pelanggan') }}">
                            </div>
                            <div class="form-group"><label for="alamat" class=" form-control-label">Alamat
                                    Pelanggan</label><input type="text" id="alamat"
                                    placeholder="Masukkan Alamat Pelanggan" name="alamat" class="form-control"
                                    value="{{ isset($data['alamat']) ? $data['alamat'] : old('alamat') }}">
                            </div>
                            <div class="form-group"><label for="email" class=" form-control-label">Email
                                    Pelanggan</label><input type="text" id="email"
                                    placeholder="Masukkan Email Pelanggan" name="email" class="form-control"
                                    value="{{ isset($data['email']) ? $data['email'] : old('email') }}">
                            </div>

                            <div class="row form-group mt-5">
                                <div class="col col-md-3">
                                    <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin Pelanggan</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                        <option value="Laki-Laki" {{ (isset($data['jenis_kelamin']) && $data['jenis_kelamin'] == 'Laki-Laki') ? 'selected' : (old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '') }}>
                                            Laki-Laki
                                        </option>
                                        <option value="Perempuan" {{ (isset($data['jenis_kelamin']) && $data['jenis_kelamin'] == 'Perempuan') ? 'selected' : (old('jenis_kelamin') == 'Perempuan' ? 'selected' : '') }}>
                                            Perempuan
                                        </option>
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
