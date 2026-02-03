@extends('layouts.backend')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
    <style>
        /* Agar teks keterangan tidak meluber panjang */
        .text-truncate-custom {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* Style supaya header card terlihat bersih */
        .card-header.bg-primary h5 {
            color: #fff !important;
            margin-bottom: 0;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col">
                <div class="card shadow-sm border-0">
                    {{-- Header --}}
                    <div class="card-header bg-primary d-flex justify-content-between align-items-center py-3">
                        <h5 class="text-white"><i class="bx bx-calendar me-2"></i>Data Jadwal Pemeriksaan</h5>
                        <a href="{{ route('backend.jadwal_pemeriksaan.create') }}" class="btn btn-light btn-sm fw-bold">
                            <i class="bx bx-plus"></i> Tambah Jadwal
                        </a>
                    </div>

                    {{-- Body --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered align-middle" id="datajadwal_pemeriksaan"
                                style="width:100%">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="15%">Tanggal</th>
                                        <th width="15%">Kelas</th>
                                        <th>Petugas</th>
                                        <th>Keterangan</th>
                                        <th width="12%">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($jadwal_pemeriksaan as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                <strong>{{ \Carbon\Carbon::parse($data->tanggal)->format('d/m/Y') }}</strong>
                                                <br>
                                                @if (\Carbon\Carbon::parse($data->tanggal)->isToday())
                                                    <span class="badge bg-danger" style="font-size: 10px;">Hari Ini</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <span class="badge bg-info text-white">
                                                    {{ $data->kelas->nama_kelas ?? '-' }}
                                                </span>
                                            </td>
                                            <td>
                                                <i class="bx bx-user-circle me-1 text-primary"></i>
                                                {{ $data->user->name ?? '-' }}
                                            </td>
                                            <td>
                                                <div class="text-truncate-custom" title="{{ $data->keterangan }}">
                                                    {{ $data->keterangan ?? '-' }}
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-inline-flex align-items-center justify-content-center gap-1">
                                                    {{-- Detail --}}
                                                    <a href="{{ route('backend.jadwal_pemeriksaan.show', $data->id) }}"
                                                        class="btn btn-info btn-sm d-flex align-items-center justify-content-center"
                                                        style="width: 32px; height: 32px;" title="Detail">
                                                        <i class="bx bx-show fs-5 text-white"></i>
                                                    </a>

                                                    {{-- Edit --}}
                                                    <a href="{{ route('backend.jadwal_pemeriksaan.edit', $data->id) }}"
                                                        class="btn btn-success btn-sm d-flex align-items-center justify-content-center"
                                                        style="width: 32px; height: 32px;" title="Edit">
                                                        <i class="bx bx-edit fs-5"></i>
                                                    </a>

                                                    {{-- Hapus (Admin Only) --}}
                                                    @if (auth()->user()->role === 'admin')
                                                        <form
                                                            action="{{ route('backend.jadwal_pemeriksaan.destroy', $data->id) }}"
                                                            method="POST" class="m-0 d-inline"
                                                            onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm d-flex align-items-center justify-content-center"
                                                                style="width: 32px; height: 32px;" title="Hapus">
                                                                <i class="bx bx-trash fs-5"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- End Body --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>

    <script>
        $(document).ready(function() {
            if (!$.fn.DataTable.isDataTable('#datajadwal_pemeriksaan')) {
                $('#datajadwal_pemeriksaan').DataTable({
                    pageLength: 10,
                    lengthMenu: [10, 25, 50, 100],
                    columnDefs: [{
                        orderable: false,
                        targets: 5 // Kolom Aksi (index ke-5)
                    }],
                    language: {
                        lengthMenu: "Tampilkan _MENU_ data",
                        search: "Cari Jadwal:",
                        zeroRecords: "Data jadwal tidak ditemukan",
                        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                        infoEmpty: "Tidak ada data tersedia",
                        paginate: {
                            next: "Next",
                            previous: "Prev"
                        }
                    }
                });
            }
        });
    </script>
@endpush
