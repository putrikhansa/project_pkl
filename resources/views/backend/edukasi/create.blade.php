@extends('layouts.backend')

@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Tambah Edukasi Kesehatan</h5>
                        <p class="m-b-0">Buat materi edukasi baru untuk informasi kesehatan siswa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Form Edukasi</h5>
                                    <span>Pastikan semua data terisi dengan benar sebelum disimpan.</span>
                                </div>
                                <div class="card-block">
                                    <form action="{{ route('backend.edukasi.store') }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group form-default">
                                                    <label class="float-label">Judul Edukasi</label>
                                                    <input type="text" name="judul" class="form-control"
                                                        placeholder="Masukkan judul materi..." required>
                                                    <span class="form-bar"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-default">
                                                    <label class="float-label">Kategori</label>
                                                    <select name="kategori_id" class="form-control" required>
                                                        <option value="">-- Pilih Kategori --</option>
                                                        @foreach ($kategori as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama_kategori }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="form-bar"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group form-default">
                                            <label class="float-label">Isi Edukasi</label>
                                            <textarea name="isi" rows="8" class="form-control" placeholder="Tuliskan materi edukasi di sini..." required></textarea>
                                            <span class="form-bar"></span>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group form-default">
                                                    <label class="float-label">Status Publikasi</label>
                                                    <select name="status" class="form-control">
                                                        <option value="draft">Draft (Hanya Admin)</option>
                                                        <option value="publish">Publish (Tampil di Frontend)</option>
                                                    </select>
                                                    <span class="form-bar"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="form-group m-b-0">
                                            <button type="submit"
                                                class="btn btn-primary btn-round waves-effect waves-light">
                                                <i class="fa fa-save"></i> Simpan Materi
                                            </button>
                                            <a href="{{ route('backend.edukasi.index') }}"
                                                class="btn btn-inverse btn-round waves-effect waves-light">
                                                <i class="fa fa-arrow-left"></i> Kembali
                                            </a>
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
