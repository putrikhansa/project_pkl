@extends('layouts.backend')
@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ubah Data Rekam Medis</div>
                    <div class="card-body">
                        <form action="{{ route('backend.rekam_medis.update', $rekam_medis->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- Kelas --}}
                            <div class="mb-3">
                                <label for="kelas_id">Pilih Kelas</label>
                                <select id="kelasSelect" class="form-control">
                                    <option value="">-- Pilih Kelas --</option>
                                    @foreach ($kelas as $k)
                                        <option value="{{ $k->id }}"
                                            {{ $rekam_medis->siswa->kelas_id == $k->id ? 'selected' : '' }}>
                                            {{ $k->nama_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Siswa --}}
                            <div class="mb-3">
                                <label for="siswa_id">Pilih Siswa</label>
                                <select name="siswa_id" id="siswaSelect" class="form-control" required>
                                    <option value="{{ $rekam_medis->siswa->id }}">{{ $rekam_medis->siswa->nama }}</option>
                                </select>
                            </div>

                            {{-- Tanggal --}}
                            <div class="mb-3">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" value="{{ $rekam_medis->tanggal }}" required>
                            </div>

                            {{-- Keluhan --}}
                            <div class="mb-3">
                                <label for="keluhan">Keluhan</label>
                                <input type="text" name="keluhan" class="form-control" value="{{ $rekam_medis->keluhan }}" required>
                            </div>

                            {{-- Tindakan --}}
                            <div class="mb-3">
                                <label for="tindakan">Tindakan</label>
                                <input type="text" name="tindakan" class="form-control" value="{{ $rekam_medis->tindakan }}" required>
                            </div>

                            {{-- Obat --}}
                            <div class="mb-3">
                                <label for="obat_id">Obat</label>
                                <select name="obat_id" class="form-control">
                                    <option value="">-- Pilih Obat --</option>
                                    @foreach ($obat as $item)
                                        <option value="{{ $item->id }}" {{ $rekam_medis->obat_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama_obat }} (Stok: {{ $item->stok }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Petugas --}}
                            <div class="mb-3">
                                <label for="user_id">Petugas</label>
                                <select name="user_id" class="form-control" required>
                                    @foreach ($users as $u)
                                        <option value="{{ $u->id }}" {{ $rekam_medis->user_id == $u->id ? 'selected' : '' }}>
                                            {{ $u->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Status --}}
                            <div class="mb-3">
                                <label for="status">Status</label>
                                <input type="text" name="status" class="form-control" value="{{ $rekam_medis->status }}" required>
                            </div>

                            <div class="mb-2">
                                <button type="submit" class="btn btn-outline-primary btn-sm">Simpan</button>
                                <a href="{{ route('backend.rekam_medis.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Script AJAX --}}
    @push('scripts')
        <script>
            document.getElementById('kelasSelect').addEventListener('change', function () {
                var kelasId = this.value;
                var siswaSelect = document.getElementById('siswaSelect');
                siswaSelect.innerHTML = '<option>Memuat data...</option>';

                fetch('/get-siswa-by-kelas/' + kelasId)
                    .then(response => response.json())
                    .then(data => {
                        siswaSelect.innerHTML = '<option value="">-- Pilih Siswa --</option>';
                        data.forEach(function (siswa) {
                            var option = document.createElement('option');
                            option.value = siswa.id;
                            option.text = siswa.nama;
                            siswaSelect.appendChild(option);
                        });
                    });
            });
        </script>
    @endpush
@endsection
