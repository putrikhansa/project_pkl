@extends('layouts.backend')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner mt--8">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-11">
                        <div class="card full-height">
                            <div class="card-header">
                                <div class="card-title"> Show Data obat</div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Nama Obat</th>
                                        <td>{{ $obat->nama_obat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kategori</th>
                                        <td>{{ $obat->kategori }}</td>
                                    </tr>
                                    <tr>
                                        <th>Stok</th>
                                        <td>{{ $obat->stok }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Kadaluarsa</th>
                                        <td>{{ $obat->tanggal_kadaluarsa }}</td>
                                    </tr>
                                    <tr>
                                        <th>Unit</th>
                                        <td>{{ $obat->unit }}</td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi</th>
                                        <td>{{ $obat->deskripsi }}</td>
                                    </tr>
                                </table>
                                <a href="{{ route('obat.index') }}" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
