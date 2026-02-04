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
                    <div class="card">
                        <div class="card-header">
                            <h5>Form Edukasi</h5>
                            <span>Pastikan semua data terisi dengan benar sebelum disimpan.</span>
                        </div>
                        <div class="card-block">
                            <form action="{{ route('backend.edukasi.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group form-default">
                                            <label class="float-label">Judul Edukasi</label>
                                            <input type="text" name="judul"
                                                class="form-control @error('judul') is-invalid @enderror"
                                                value="{{ old('judul') }}" placeholder="Masukkan judul materi..." required>
                                            @error('judul')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-default">
                                            <label class="float-label">Kategori</label>
                                            <select name="kategori_id"
                                                class="form-control @error('kategori_id') is-invalid @enderror" required>
                                                <option value="">-- Pilih Kategori --</option>
                                                @foreach ($kategori as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('kategori_id') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nama_kategori }}</option>
                                                @endforeach
                                            </select>
                                            @error('kategori_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group form-default">
                                    <label class="float-label">Isi Edukasi</label>
                                    <textarea name="isi" rows="8" class="form-control @error('isi') is-invalid @enderror"
                                        placeholder="Tuliskan materi edukasi di sini..." required>{{ old('isi') }}</textarea>
                                    @error('isi')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-default">
                                            <label class="float-label">Foto Utama (Thumbnail)</label>
                                            <input type="file" name="foto"
                                                class="form-control @error('foto') is-invalid @enderror"
                                                onchange="previewImage(this)">
                                            <small class="text-muted">Format: JPG, PNG, JPEG. Max: 2MB</small>
                                            @error('foto')
                                                <br><small class="text-danger">{{ $message }}</small>
                                            @enderror

                                            <div class="mt-3">
                                                <img id="img-preview" src="" class="img-fluid rounded"
                                                    style="display:none; max-height: 200px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-default">
                                            <label class="float-label">Status Publikasi</label>
                                            <select name="status" class="form-control">
                                                <option value="draft">Draft (Hanya Admin)</option>
                                                <option value="publish">Publish (Tampil di Frontend)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="form-group m-b-0 text-right">
                                    <a href="{{ route('backend.edukasi.index') }}"
                                        class="btn btn-inverse btn-round waves-effect waves-light">
                                        <i class="fa fa-arrow-left"></i> Kembali
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-round waves-effect waves-light">
                                        <i class="fa fa-save"></i> Simpan Materi
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('img-preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
