@extends('layouts.backend')

@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header bg-light fw-semibold">
                        <i class="bi bi-capsule me-1"></i> Tambah Obat
                    </div>

                    <div class="card-body">
                        <form action="{{ route('backend.obat.store') }}" method="POST">
                            @csrf

                            <div class="row g-3">
                                {{-- KIRI --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Obat</label>
                                        <input type="text" name="nama_obat"
                                            class="form-control @error('nama_obat') is-invalid @enderror"
                                            value="{{ old('nama_obat') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Kategori</label>
                                        <input type="text" name="kategori"
                                            class="form-control @error('kategori') is-invalid @enderror"
                                            value="{{ old('kategori') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Unit</label>
                                        <input type="text" name="unit"
                                            class="form-control @error('unit') is-invalid @enderror"
                                            placeholder="Tablet / Botol / Strip" value="{{ old('unit') }}">
                                    </div>
                                </div>

                                {{-- KANAN --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Stok</label>
                                        <input type="number" name="stok"
                                            class="form-control @error('stok') is-invalid @enderror"
                                            value="{{ old('stok') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Kadaluarsa</label>
                                        <input type="date" name="tanggal_kadaluarsa"
                                            class="form-control @error('tanggal_kadaluarsa') is-invalid @enderror"
                                            value="{{ old('tanggal_kadaluarsa') }}">
                                    </div>
                                </div>
                            </div>

                            {{-- DESKRIPSI --}}
                            <div class="mt-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="3" placeholder="Keterangan tambahan obat">{{ old('deskripsi') }}</textarea>
                            </div>

                            {{-- BUTTON --}}
                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <button type="reset" class="btn btn-outline-secondary btn-sm">
                                    Reset
                                </button>
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Simpan Obat
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            const btn = e.target.querySelector('button[type="submit"]');
            btn.disabled = true;
            btn.innerText = 'Menyimpan...';
        });
    </script>
@endpush
