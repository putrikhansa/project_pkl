@extends('layouts.backend')

@section('content')
    <div class="container-fluid py-4">
        <h4>Laporan Rekam Medis</h4>

        <form method="GET" action="{{ route('rekam_medis.laporan') }}" class="mb-4">
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
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
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
                                <td>{{ $item->status }}</td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data untuk tanggal tersebut.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <a href="{{ route('rekam_medis.export.pdf', ['tanggal_awal' => request('tanggal_awal'), 'tanggal_akhir' => request('tanggal_akhir')]) }}"
                    class="btn btn-danger mb-3" target="_blank">
                    Export PDF
                </a>
            </div>
        </div>
    </div>
@endsection
