@extends('layouts.backend')

@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card shadow-sm">
                    <div class="card-header bg-light fw-semibold">
                        <i class="bi bi-journal-medical me-1"></i> Tambah Rekam Medis
                    </div>

                    <div class="card-body">
                        <form action="{{ route('backend.rekam_medis.store') }}" method="POST">
                            @csrf

                            <div class="row g-4">

                                {{-- DATA SISWA --}}
                                <div class="col-md-6">
                                    <div class="border rounded p-3 h-100">
                                        <h6 class="text-primary mb-3">
                                            <i class="bi bi-person-lines-fill me-1"></i> Data Siswa
                                        </h6>

                                        <div class="form-group mb-3">
                                            <label>Pilih Kelas</label>
                                            <select id="kelas_id" class="form-control" required>
                                                <option value="">-- Pilih Kelas --</option>
                                                @foreach ($kelas as $k)
                                                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Pilih Siswa</label>
                                            <select name="siswa_id" id="siswa_id" class="form-control" required disabled>
                                                <option value="">-- Pilih Kelas Terlebih Dahulu --</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Tanggal Pemeriksaan</label>
                                            <input type="date" name="tanggal" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Keluhan</label>
                                            <input type="text" name="keluhan" class="form-control"
                                                placeholder="Contoh: pusing, demam">
                                        </div>
                                    </div>
                                </div>

                                {{-- DATA MEDIS --}}
                                <div class="col-md-6">
                                    <div class="border rounded p-3 h-100">
                                        <h6 class="text-success mb-3">
                                            <i class="bi bi-clipboard-pulse me-1"></i> Data Medis
                                        </h6>

                                        <div class="mb-3">
                                            <label class="form-label">Tindakan</label>
                                            <input type="text" class="form-control" placeholder="Otomatis saat simpan"
                                                readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Obat</label>
                                            <select name="obat_id" class="form-control">
                                                <option value="">-- Pilih Obat --</option>
                                                @foreach ($obat as $o)
                                                    <option value="{{ $o->id }}">
                                                        {{ $o->nama_obat }} (Stok: {{ $o->stok }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Petugas</label>
                                            <input type="text" class="form-control" value="{{ auth()->user()->name }}"
                                                readonly>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="status">Status Pasca Pemeriksaan</label>
                                            <select name="status" id="status"
                                                class="form-control @error('status') is-invalid @enderror" required>
                                                <option value="">-- Pilih Status --</option>
                                                <option value="Kembali Ke Kelas"
                                                    {{ old('status') == 'Kembali Ke Kelas' ? 'selected' : '' }}>Kembali Ke
                                                    Kelas</option>
                                                <option value="Di UKS" {{ old('status') == 'Di UKS' ? 'selected' : '' }}>Di
                                                    UKS (Observasi)</option>
                                                <option value="Pulang" {{ old('status') == 'Pulang' ? 'selected' : '' }}>
                                                    Pulang</option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>

                            {{-- BUTTON --}}
                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <button type="reset" class="btn btn-outline-secondary btn-sm">
                                    Reset
                                </button>
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Simpan Data
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
        $(document).ready(function() {
            $('#kelas_id').on('change', function() {
                let kelasID = $(this).val();
                let siswaSelect = $('#siswa_id');

                // Kalo pilihan kelas dikosongin
                if (!kelasID) {
                    siswaSelect.html('<option value="">-- Pilih Kelas Terlebih Dahulu --</option>').prop(
                        'disabled', true);
                    return;
                }

                // Jalankan AJAX
                $.ajax({
                    url: "{{ url('/get-siswa-by-kelas') }}/" + kelasID,
                    type: "GET",
                    dataType: "json",
                    beforeSend: function() {
                        siswaSelect.html('<option value="">Sedang memuat...</option>').prop(
                            'disabled', true);
                    },
                    success: function(data) {
                        siswaSelect.prop('disabled', false);
                        siswaSelect.html('<option value="">-- Pilih Siswa --</option>');

                        $.each(data, function(key, value) {
                            // Kita tampilin NIS + Nama biar nggak ketuker
                            siswaSelect.append('<option value="' + value.id + '">[' +
                                value.nis + '] - ' + value.nama + '</option>');
                        });
                    },
                    error: function() {
                        alert('Gagal mengambil data siswa!');
                    }
                });
            });
        });
    </script>
@endpush
