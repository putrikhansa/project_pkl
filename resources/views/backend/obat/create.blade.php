@extends('layouts.backend')
@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Tambah obat
                    </div>
                    <div class="card-body">
                        <form action="{{ route('obat.store') }}" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label for="">Nama Obat </label>
                                <input type="text" name="nama_obat"
                                    class="form-control
                            @error('nama_obat') is-invalid @enderror">

                            </div>
                            <div class="mb-2">
                                <label for="">Kategori </label>
                                <input type="text" name="kategori"
                                    class="form-control
                            @error('kategori') is-invalid @enderror">

                            </div>
                            <div class="mb-2">
                                <label for="">Stok </label>
                                <input type="number" name="stok"
                                    class="form-control
                            @error('stok') is-invalid @enderror">

                            </div>
                            <div class="mb-2">
                                <label for="">Tanggal Kadaluarsa </label>
                                <input type="date" name="tanggal_kadaluarsa"
                                    class="form-control
                            @error('tanggal_kadaluarsa') is-invalid @enderror">


                            </div>
                            <div class="mb-2">
                                <label for="">Unit </label>
                                <input type="text" name="unit"
                                    class="form-control
                            @error('unit') is-invalid @enderror">

                            </div>
                            <div class="mb-3">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi') }}</textarea>
                            </div>
                            <div class="mb-2">
                                <button type="submit" class="btn btn-sm btn-outline-primary">Simpan</button>
                                <button type="reset" class="btn btn-sm btn-outline-warning">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
