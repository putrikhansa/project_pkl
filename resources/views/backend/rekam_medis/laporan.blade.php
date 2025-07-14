@extends('layouts.backend')

@section('content')
    <div class="container-fluid py-4">
        <h4>Laporan Rekam Medis</h4>

        <form method="GET" action="{{ route('backend.rekam_medis.laporan') }}" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <label>Dari Tanggal:</label>
                    <input type="date" name="tanggal_awal" class="form-control" value="{{ request('tanggal_awal') }}">
                </div>
                <div class="col-md-4">
                    <label>Sampai Tanggal:</label>
                    <input type="date" name="tanggal_akhir" class="form-control" value="{{ request('tanggal_akhir') }}">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Tampilkan</button>
                </div>
            </div>
        </form>

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Tanggal</th>
                            <th>Keluhan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rekamMedis as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->siswa->nama }}</td>
                                <td>{{ $item->siswa->kelas->nama_kelas ?? '-' }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->keluhan }}</td>
                                <td>
                                    <span
                                        class="badge badge-status {{ $item->status === 'Pulang' ? 'bg-success' : 'bg-danger' }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data untuk tanggal tersebut.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex" style="gap: 10px;">

                    <a href="{{ route('rekam_medis.export.pdf', ['tanggal_awal' => request('tanggal_awal'), 'tanggal_akhir' => request('tanggal_akhir')]) }}"
                        class="btn btn-danger" target="_blank">
                        <i class="bx bxs-file-pdf"></i>
                        PDF
                    </a>

                    <a href="{{ route('backend.rekam_medis.export.excel', ['tanggal_awal' => request('tanggal_awal'), 'tanggal_akhir' => request('tanggal_akhir')]) }}"
                        class="btn btn-success " target="_blank">
                        <i class="bx bxs-file-export "></i>
                        Excel
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
