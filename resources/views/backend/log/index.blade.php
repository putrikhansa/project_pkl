@extends('layouts.backend')

@section('content')
    <style>
        /* Bikin tulisan hitam pekat dan tegas */
        .table td,
        .table th {
            color: #2c3e50 !important;
            vertical-align: middle;
            font-weight: 500;
        }

        .table thead th {
            background-color: #34495e !important;
            color: #ffffff !important;
            font-weight: 700 !important;
            text-transform: uppercase;
            font-size: 11px;
        }

        .badge-aksi {
            padding: 5px 10px;
            border-radius: 4px;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 10px;
        }
    </style>

    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Log Aktivitas Sistem</h5>
                        <p class="m-b-0">Riwayat seluruh perubahan data oleh petugas</p>
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
                            <h5>Daftar Jejak Audit</h5>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="50">#</th>
                                            <th width="180">Waktu Kejadian</th>
                                            <th width="150">Nama Petugas</th>
                                            <th class="text-center" width="120">Jenis Aksi</th>
                                            <th>Target Tabel</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($logs as $log)
                                            <tr>
                                                <td class="text-center">
                                                    <b>{{ ($logs->currentPage() - 1) * $logs->perPage() + $loop->iteration }}</b>
                                                </td>
                                                <td class="text-dark">{{ $log->created_at->format('d/m/Y H:i:s') }}</td>
                                                <td>
                                                    <span class="text-primary font-weight-bold">
                                                        <i class="fa fa-user-circle m-r-5"></i>
                                                        {{ $log->user->name ?? 'Sistem' }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    {{-- Warnain Badge berdasarkan Aksi --}}
                                                    @php
                                                        $color = 'badge-secondary';
                                                        if (str_contains(strtolower($log->aksi), 'tambah')) {
                                                            $color = 'btn-success';
                                                        }
                                                        if (str_contains(strtolower($log->aksi), 'hapus')) {
                                                            $color = 'btn-danger';
                                                        }
                                                        if (str_contains(strtolower($log->aksi), 'ubah')) {
                                                            $color = 'btn-warning';
                                                        }
                                                    @endphp
                                                    <span
                                                        class="badge {{ $color }} btn-sm">{{ $log->aksi }}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="label label-inverse-info">{{ strtoupper($log->tabel ?? '-') }}</span>
                                                </td>
                                                <td><small
                                                        class="text-muted">{{ $log->deskripsi ?? 'Tidak ada detail' }}</small>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center p-4">
                                                    <i class="fa fa-history fa-3x text-muted m-b-10"></i>
                                                    <p>Belum ada riwayat aktivitas yang tercatat.</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="m-t-20">
                                {{ $logs->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
