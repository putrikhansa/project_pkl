@extends('layouts.backend')
@section('content')
    <div class="wrapper">
        <div class="main-panel">
            <div class="content">
                <div class="page-inner mt--8">
                    <div class="row justify-content-center mt-5">
                        <div class="col-md-11">
                            <div class="card full-height">
                                <div class="card-header">
                                    <div class="card-title"> Ubah Data Obat</div>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('obat.update', $obat->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-2">
                                            <label for="">nama_obat </label>
                                            <input type="text" name="nama_obat" class="form-control"
                                                value="{{ $obat->nama_obat }}" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">kategori </label>
                                            <input type="text" name="kategori" class="form-control"
                                                value="{{ $obat->kategori }}" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">stok </label>
                                            <input type="number" name="stok" class="form-control"
                                                value="{{ $obat->stok }}" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">tanggal kadaluarsa </label>
                                            <input type="date" name="tanggal_kadaluarsa" class="form-control"
                                                value="{{ $obat->tanggal_kadaluarsa }}" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Unit </label>
                                            <input type="text" name="unit" class="form-control"
                                                value="{{ $obat->unit }}" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Deskripsi </label>
                                            <textarea name="deskripsi" id="" class="form-control">{{ $obat->deskripsi }}</textarea>
                                        </div>

                                        <div class="card-action">
                                            <button class="btn btn-info" style="float: right" type="submit">Ubah</button>
                                            <a href="{{ route('obat.index') }}" class=""><i
                                                    class="flaticon-back"></i></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
