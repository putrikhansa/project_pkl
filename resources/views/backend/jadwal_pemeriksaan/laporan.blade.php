@extends('layouts.backend')

@section('content')
    <style>
        /* Paksa tulisan keluar dan tegas */
        .table td,
        .table th {
            color: #2c3e50 !important;
            vertical-align: middle;
            font-weight: 500;
        }

        .table thead th {
            background-color: #f8f9fa !important;
            color: #111 !important;
            font-weight: 700 !important;
            text-transform: uppercase;
            font-size: 11px;
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
                        <h5 class="m-b-10">Laporan Jadwal Pemeriksaan</h5>
                        <p class="m-b-0">Pantau agenda pemeriksaan kesehatan rutin siswa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">

                    {{-- Area Filter --}}
                    <div class="card card-filter m-b-20">
                        <div class="card-block">
                            <form method="GET" action="{{ route('backend.jadwal_pemeriksaan.laporan') }}">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark">Dari Tanggal</label>
                                            <input type="date" name="tanggal_awal" class="form-control"
                                                value="{{ request('tanggal_awal') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark">Sampai Tanggal</label>
                                            <input type="date" name="tanggal_akhir" class="form-control"
                                                value="{{ request('tanggal_akhir') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>&nbsp;</label>
                                        <button type="submit" class="btn btn-primary btn-block btn-round shadow-sm">
                                            <i class="fa fa-filter"></i> Filter Jadwal
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- Tabel Laporan --}}
                    <div class="card">
                        <div class="card-header">
                            <h5>Data Jadwal Pemeriksaan</h5>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="15%">Tanggal</th>
                                            <th width="20%">Kelas</th>
                                            <th width="25%">Petugas/Pemeriksa</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($jadwal as $item)
                                            <tr>
                                                <td class="text-center">
                                                    <span class="text-dark font-weight-bold">
                                                        {{ date('d/m/Y', strtotime($item->tanggal)) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="label label-inverse-primary">{{ $item->kelas->nama_kelas ?? '-' }}</span>
                                                </td>
                                                <td>
                                                    <i class="fa fa-user-md text-primary m-r-5"></i>
                                                    {{ $item->user->name ?? '-' }}
                                                </td>
                                                <td>{{ $item->keterangan }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted p-4">
                                                    <i class="fa fa-calendar-times-o fa-3x m-b-10"></i>
                                                    <p>Tidak ada jadwal pemeriksaan ditemukan pada rentang tanggal tersebut.
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            {{-- Tombol Export --}}
                            @if (auth()->user()->role === 'admin' && $jadwal->count() > 0)
                                <div class="hr-line m-t-20 m-b-20"></div>
                                <div class="d-flex justify-content-end">
                                    <form action="{{ route('backend.jadwal_pemeriksaan.export.pdf') }}" method="GET"
                                        target="_blank">
                                        <input type="hidden" name="tanggal_awal" value="{{ request('tanggal_awal') }}">
                                        <input type="hidden" name="tanggal_akhir" value="{{ request('tanggal_akhir') }}">
                                        <button type="submit" class="btn btn-danger btn-round shadow-sm">
                                            <i class="fa fa-file-pdf-o"></i> Unduh PDF
                                        </button>
                                    </form>
                                </div>
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
