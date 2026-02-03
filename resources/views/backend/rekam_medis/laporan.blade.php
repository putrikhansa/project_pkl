@extends('layouts.backend')

@section('content')
    {{-- Style khusus untuk mempertegas tulisan --}}
    <style>
        .table td,
        .table th {
            color: #2c3e50 !important;
            /* Warna gelap tegas */
            vertical-align: middle;
            font-weight: 500;
        }

        .table thead th {
            background-color: #f8f9fa !important;
            color: #111 !important;
            font-weight: 700 !important;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 0.5px;
        }

        .card-filter {
            background: #f4f7fa;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
        }
    </style>

    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Laporan Rekam Medis</h5>
                        <p class="m-b-0">Filter dan unduh data kunjungan UKS</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">

                    {{-- Form Filter --}}
                    <div class="card card-filter m-b-20">
                        <div class="card-block">
                            <form method="GET" action="{{ route('backend.rekam_medis.laporan') }}">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Dari Tanggal</label>
                                            <input type="date" name="tanggal_awal" class="form-control"
                                                value="{{ request('tanggal_awal') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Sampai Tanggal</label>
                                            <input type="date" name="tanggal_akhir" class="form-control"
                                                value="{{ request('tanggal_akhir') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>&nbsp;</label>
                                        <button type="submit" class="btn btn-primary btn-block btn-round">
                                            <i class="fa fa-search"></i> Tampilkan Data
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- Tabel Data --}}
                    <div class="card">
                        <div class="card-header">
                            <h5>Hasil Rekapitulasi</h5>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="fa fa-window-maximize full-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nama Siswa</th>
                                            <th class="text-center">Kelas</th>
                                            <th class="text-center">Tanggal</th>
                                            <th>Keluhan</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($rekamMedis as $item)
                                            <tr>
                                                <td class="text-center"><b>{{ $loop->iteration }}</b></td>

                                                {{-- Pastikan pakai $item, bukan $data --}}
                                                <td>
                                                    <strong>{{ $item->siswa->nama ?? 'Siswa Terhapus' }}</strong><br>
                                                    <small class="text-muted">NIS: {{ $item->siswa->nis ?? '-' }}</small>
                                                </td>

                                                <td class="text-center">{{ $item->siswa->kelas->nama_kelas ?? '-' }}</td>
                                                <td class="text-center">{{ date('d/m/Y', strtotime($item->tanggal)) }}</td>
                                                <td>{{ $item->keluhan }}</td>

                                                <td class="text-center">
                                                    {{-- Kita bersihkan spasi dan cek tanpa peduli huruf besar/kecil --}}
                                                    @if (trim(strtolower($item->status)) === 'pulang')
                                                        <span class="label label-danger">Pulang</span>
                                                    @else
                                                        <span class="label label-success">Kembali Ke Kelas</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Data tidak ditemukan.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            {{-- Tombol Export (Muncul kalau ada data) --}}
                            @if ($rekamMedis->count() > 0 && auth()->user()->role === 'admin')
                                <div class="hr-line m-t-20 m-b-20"></div>
                                <div class="d-flex justify-content-end">
                                    <div class="btn-group">
                                        <a href="{{ route('rekam_medis.export.pdf', request()->all()) }}"
                                            class="btn btn-danger btn-round" target="_blank">
                                            <i class="fa fa-file-pdf-o"></i> Export PDF
                                        </a>
                                        <a href="{{ route('backend.rekam_medis.export.excel', request()->all()) }}"
                                            class="btn btn-success btn-round" target="_blank">
                                            <i class="fa fa-file-excel-o"></i> Export Excel
                                        </a>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
