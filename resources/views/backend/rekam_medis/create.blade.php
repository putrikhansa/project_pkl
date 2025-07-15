@extends('layouts.backend')

@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Tambah Rekam Medis
                    </div>
                    <div class="card-body">
                        <form action="{{ route('backend.rekam_medis.store') }}" method="POST">
                            @csrf

                            {{-- Pilih Kelas --}}
                            <div class="mb-3">
                                <label for="kelasSelect">Pilih Kelas</label>
                                <select id="kelasSelect" class="form-control">
                                    <option value="">-- Pilih Kelas --</option>
                                    @foreach ($kelas as $k)
                                        <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Pilih Siswa --}}
                            <div class="mb-3">
                                <label for="siswaSelect">Pilih Siswa</label>
                                <select name="siswa_id" id="siswaSelect" class="form-control">
                                    <option value="">-- Pilih Siswa --</option>
                                </select>

                                @error('siswa_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tanggal --}}
                            <div class="mb-2">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal"
                                    class="form-control @error('tanggal') is-invalid @enderror">
                            </div>

                            {{-- Keluhan --}}
                            <div class="mb-2">
                                <label for="keluhan">Keluhan</label>
                                <input type="text" name="keluhan"
                                    class="form-control @error('keluhan') is-invalid @enderror">
                            </div>

                            {{-- Tindakan (diisi otomatis saat simpan) --}}
                            <div class="mb-2">
                                <label for="tindakan">Tindakan</label>
                                <input type="text" name="tindakan" class="form-control"
                                    placeholder="Otomatis saat simpan" readonly>
                            </div>

                            {{-- Obat --}}
                            <div class="mb-3">
                                <label for="obat_id">Obat (Opsional)</label>
                                <select name="obat_id" class="form-control">
                                    <option value="">-- Pilih Obat --</option>
                                    @foreach ($obat as $o)
                                        <option value="{{ $o->id }}">{{ $o->nama_obat }} (Stok: {{ $o->stok }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Petugas --}}
                            <div class="mb-3">
                                <label>Petugas</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                            </div>

                            {{-- Status --}}
                            <div class="mb-2">
                                <label for="status">Status</label>
                                <input type="text" name="status"
                                    class="form-control @error('status') is-invalid @enderror">
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

@push('scripts')
    <script>
        document.getElementById('kelasSelect').addEventListener('change', function() {
            const kelasId = this.value;
            const siswaSelect = document.getElementById('siswaSelect');

            siswaSelect.innerHTML = '<option value="">-- Memuat data siswa... --</option>';

            fetch(`/get-siswa-by-kelas/${kelasId}`)
                .then(response => response.json())
                .then(data => {
                    siswaSelect.innerHTML = '<option value="">-- Pilih Siswa --</option>';
                    data.forEach(siswa => {
                        siswaSelect.innerHTML += `<option value="${siswa.id}">${siswa.nama}</option>`;
                    });
                })
                .catch(error => {
                    console.error('Gagal memuat siswa:', error);
                    siswaSelect.innerHTML = '<option value="">-- Gagal memuat siswa --</option>';
                });
        });
    </script>
@endpush
