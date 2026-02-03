@extends('layouts.backend')

@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Edit Edukasi Kesehatan</h5>
                        <p class="m-b-0">Perbarui informasi atau konten edukasi kesehatan siswa</p>
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
                                    <h5>Form Update Materi</h5>
                                    <span>Silakan ubah data pada form di bawah ini.</span>
                                </div>
                                <div class="card-block">
                                    <form action="{{ route('backend.edukasi.update', $edukasi->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group form-default">
                                                    <label class="float-label">Judul Edukasi</label>
                                                    <input type="text" name="judul"
                                                        class="form-control @error('judul') is-invalid @enderror"
                                                        value="{{ old('judul', $edukasi->judul) }}" required>
                                                    <span class="form-bar"></span>
                                                    @error('judul')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-default">
                                                    <label class="float-label">Kategori</label>
                                                    <select name="kategori_id"
                                                        class="form-control @error('kategori_id') is-invalid @enderror"
                                                        required>
                                                        <option value="">-- Pilih Kategori --</option>
                                                        @foreach ($kategori as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ $edukasi->kategori_id == $item->id ? 'selected' : '' }}>
                                                                {{ $item->nama_kategori }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="form-bar"></span>
                                                    @error('kategori_id')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group form-default">
                                            <label class="float-label">Isi Edukasi</label>
                                            <textarea name="isi" rows="10" class="form-control @error('isi') is-invalid @enderror" required>{{ old('isi', $edukasi->isi) }}</textarea>
                                            <span class="form-bar"></span>
                                            @error('isi')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group form-default">
                                                    <label class="float-label">Status Publikasi</label>
                                                    <select name="status" class="form-control">
                                                        <option value="draft"
                                                            {{ $edukasi->status == 'draft' ? 'selected' : '' }}>Draft (Hanya
                                                            Admin)</option>
                                                        <option value="publish"
                                                            {{ $edukasi->status == 'publish' ? 'selected' : '' }}>Publish
                                                            (Tampil di Frontend)</option>
                                                    </select>
                                                    <span class="form-bar"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="form-group m-b-0">
                                            <button type="submit"
                                                class="btn btn-primary btn-round waves-effect waves-light">
                                                <i class="fa fa-refresh"></i> Simpan Perubahan
                                            </button>
                                            <a href="{{ route('backend.edukasi.index') }}"
                                                class="btn btn-inverse btn-round waves-effect waves-light">
                                                <i class="fa fa-times"></i> Batal
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
