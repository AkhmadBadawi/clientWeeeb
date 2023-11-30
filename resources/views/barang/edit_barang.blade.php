@extends('main')

@section('title', 'Form Data Barang')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Form Data Barang</h1>
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
                    <div class="card-header"><strong>Formulir Data Barang</strong>
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
                            <div class="form-group"><label for="id_barang" class=" form-control-label">ID
                                    Barang</label><input type="text" id="id_barang" placeholder="Masukkan ID Barang"
                                    name="id_Barang+" class="form-control"
                                    value="{{ isset($data['id_barang']) ? $data['id_barang'] : old('id_barang') }}"
                                    disabled>
                                <input type="hidden" id="id_barang" placeholder="Masukkan ID Barang" name="id_barang"
                                    class="form-control"
                                    value="{{ isset($data['id_barang']) ? $data['id_barang'] : old('id_barang') }}">
                            </div>
                            <div class="form-group"><label for="nama_barang" class=" form-control-label">Nama
                                    Barang</label><input type="text" id="nama_barang"
                                    placeholder="Masukkan Nama Barang" name="nama_barang" class="form-control"
                                    value="{{ isset($data['nama_barang']) ? $data['nama_barang'] : old('nama_barang') }}">
                            </div>
                            <div class="form-group"><label for="alamat_barang" class=" form-control-label">Stok
                                    Barang</label><input type="number" id="stok_barang"
                                    placeholder="Masukkan Stok Barang" name="stok_barang" class="form-control"
                                    value="{{ isset($data['stok_barang']) ? $data['stok_barang'] : old('stok_barang') }}">
                            </div>
                            <div class="form-group"><label for="harga_barang" class=" form-control-label">Stok
                                Barang</label><input type="number" id="harga_barang"
                                placeholder="Masukkan Harga Barang" name="harga_barang" class="form-control"
                                value="{{ isset($data['harga_barang']) ? $data['harga_barang'] : old('harga_barang') }}">
                        </div>
                            <div class="form-group"><label for="deskripsi" class=" form-control-label">Deskripsi
                                    Barang</label><input type="text" id="deeskripsi"
                                    placeholder="Masukkan Deskripsi Barang" name="deskripsi" class="form-control"
                                    value="{{ isset($data['deskripsi']) ? $data['deskripsi'] : old('deskripsi') }}"></div>
                            <div class="row form-group mt-5">
                                <div class="col col-md-3">
                                        
                                    <label for="id_pemasok" class="form-control-label">Pemasok</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="id_pemasok" id="id_pemasok" class="form-control">
                                        @foreach ($data_pemasok as $item)
                                            <option value="{{ $item['id_pemasok'] }}" @if ($pemasok['id_pemasok'] == $item['id_pemasok']) selected @endif>{{ $item['nama_pemasok'] }}</option>
                                        @endforeach
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
