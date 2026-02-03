@extends('layouts.backend')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col">
                <div class="card">


                    <div class="card">
                        {{-- Header --}}
                        <div class="card-header bg-primary d-flex justify-content-between align-items-center text-white">
                            <h5 class="mb-0">Data Rekam Medis</h5>
                            <a href="{{ route('backend.rekam_medis.create') }}" class="btn btn-light btn-sm">
                                <i class="bx bx-plus"></i> Tambah
                            </a>
                        </div>

                        {{-- Body --}}
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered align-middle" id="datarekam_medis">
                                    <thead class="table-light text-center">
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Nama Siswa</th>
                                            <th width="12%">Tanggal</th>
                                            <th>Keluhan</th>
                                            <th>Tindakan</th>
                                            <th width="10%">Obat</th>
                                            <th width="10%">Status</th>
                                            <th width="12%">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($rekam_medis as $data)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td><strong>{{ $data->siswa->nama ?? '-' }}</strong></td>
                                                <td class="text-center">
                                                    {{ \Carbon\Carbon::parse($data->tanggal)->format('d/m/Y') }}</td>
                                                <td class="text-truncate" style="max-width: 150px;"
                                                    title="{{ $data->keluhan }}">
                                                    {{ $data->keluhan }}
                                                </td>
                                                <td class="text-truncate" style="max-width: 180px;"
                                                    title="{{ $data->tindakan }}">
                                                    {{ $data->tindakan }}
                                                </td>
                                                <td class="text-center">{{ $data->obat->nama_obat ?? '-' }}</td>
                                                <td class="text-center">
                                                    @if ($data->status === 'Pulang')
                                                        <span class="badge bg-danger">Pulang</span>
                                                    @elseif ($data->status === 'Kembali Ke Kelas')
                                                        <span class="badge bg-success">Kembali Ke Kelas</span>
                                                    @elseif ($data->status === 'Di UKS')
                                                        <span class="badge bg-warning text-dark">Di UKS</span>
                                                    @else
                                                        <span class="badge bg-secondary">{{ $data->status }}</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <div
                                                        class="d-inline-flex align-items-center justify-content-center gap-1">
                                                        {{-- Detail --}}
                                                        <a href="{{ route('backend.rekam_medis.show', $data->id) }}"
                                                            class="btn btn-info btn-sm d-flex align-items-center justify-content-center"
                                                            style="width: 30px; height: 30px;" title="Detail">
                                                            <i class="bx bx-show fs-5"></i>
                                                        </a>

                                                        {{-- Edit --}}
                                                        <a href="{{ route('backend.rekam_medis.edit', $data->id) }}"
                                                            class="btn btn-success btn-sm d-flex align-items-center justify-content-center"
                                                            style="width: 30px; height: 30px;" title="Edit">
                                                            <i class="bx bx-edit fs-5"></i>
                                                        </a>

                                                        {{-- Hapus (Admin Only) --}}
                                                        @if (auth()->user()->role === 'admin')
                                                            <form
                                                                action="{{ route('backend.rekam_medis.destroy', $data->id) }}"
                                                                method="POST" class="m-0 d-inline"
                                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm d-flex align-items-center justify-content-center"
                                                                    style="width: 30px; height: 30px;" title="Hapus">
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
            $('#datarekam_medis').DataTable({
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100],
                columnDefs: [{
                    orderable: false,
                    targets: 7 // Kolom Aksi sekarang ada di index ke-7
                }],
                language: {
                    lengthMenu: "Tampilkan _MENU_ data",
                    search: "Cari:",
                    zeroRecords: "Data rekam medis tidak ditemukan",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    infoEmpty: "Tidak ada data tersedia",
                    paginate: {
                        next: "Next",
                        previous: "Prev"
                    }
                }
            });
        });
    </script>
@endpush
