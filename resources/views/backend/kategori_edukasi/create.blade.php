@extends('layouts.backend')

@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Kategori Edukasi</h5>
                        <p class="m-b-0">Kelola pengelompokan materi kesehatan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Tambah Kategori Baru</h5>
                                </div>
                                <div class="card-block">
                                    <form action="{{ route('backend.kategori_edukasi.store') }}" method="POST">
                                        @csrf

                                        <div class="form-group form-default">
                                            <label class="float-label">Nama Kategori</label>
                                            <input type="text" name="nama_kategori"
                                                class="form-control @error('nama_kategori') is-invalid @enderror"
                                                placeholder="Contoh: Kebersihan Diri, Nutrisi, dll"
                                                value="{{ old('nama_kategori') }}" required>
                                            <span class="form-bar"></span>

                                            @error('nama_kategori')
                                                <small class="text-danger mt-2 d-block">
                                                    <i class="fa fa-exclamation-circle"></i> {{ $message }}
                                                </small>
                                            @enderror
                                        </div>

                                        <div class="hr-line m-t-20 m-b-20"></div>

                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('backend.kategori_edukasi.index') }}"
                                                class="btn btn-inverse btn-round waves-effect waves-light">
                                                <i class="fa fa-arrow-left"></i> Kembali
                                            </a>
                                            <button type="submit"
                                                class="btn btn-primary btn-round waves-effect waves-light">
                                                <i class="fa fa-save"></i> Simpan Kategori
                                            </button>
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
