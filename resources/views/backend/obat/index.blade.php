@extends('layouts.backend')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Data Obat
                        <a href="{{ route('backend.obat.create') }}" class="btn btn-secondary btn-sm float-right">
                            Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table class="table table-striped table-bordered align-middle" id="itemobat">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Nama Obat</th>
                                        <th>Kategori</th>
                                        <th width="10%">Stok</th>
                                        <th width="15%">Status Kadaluarsa</th>
                                        <th width="10%">Unit</th>
                                        <th>Deskripsi</th>
                                        <th width="12%">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($obat as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_obat }}</td>
                                            <td>{{ $item->kategori }}</td>
                                            <td>
                                                @if ($item->stok == 0)
                                                    <span class="badge bg-danger">Stok Habis</span>
                                                @elseif ($item->stok < 5)
                                                    <span class="badge bg-warning text-dark">Sisa {{ $item->stok }}</span>
                                                @else
                                                    {{ $item->stok }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @php $status = $item->status_kadaluarsa; @endphp

                                                @if ($status == 'expired')
                                                    <span class="badge bg-danger">Expired</span>
                                                @elseif ($status == 'near')
                                                    <span class="badge bg-warning text-dark">Hampir Expired</span>
                                                @else
                                                    <span class="badge bg-success">Aman</span>
                                                @endif
                                            </td>

                                            <td>{{ $item->unit }}</td>
                                            <td class="text-truncate" style="max-width: 200px;">
                                                {{ $item->deskripsi }}
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center" style="gap: 5px;">

                                                    {{-- Semua role boleh lihat --}}
                                                    <a href="{{ route('backend.obat.show', $item->id) }}"
                                                        class="btn btn-info btn-sm" title="Detail">
                                                        <i class="bx bx-show"></i>
                                                    </a>

                                                    {{-- Admin & Petugas boleh edit --}}
                                                    <a href="{{ route('backend.obat.edit', $item->id) }}"
                                                        class="btn btn-success btn-sm" title="Edit">
                                                        <i class="bx bx-edit"></i>
                                                    </a>

                                                    {{-- HANYA ADMIN BOLEH HAPUS --}}
                                                    @if (auth()->user()->role === 'admin')
                                                        <form action="{{ route('backend.obat.destroy', $item->id) }}"
                                                            method="POST" class="d-inline"
                                                            onsubmit="return confirm('Yakin ingin menghapus obat ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm" title="Hapus">
                                                                <i class="bx bx-trash"></i>
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
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function() {
            $('#itemobat').DataTable({
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100],
                columnDefs: [{
                    orderable: false,
                    targets: 7
                }],
                language: {
                    lengthMenu: "Tampilkan _MENU_ data",
                    search: "Cari:",
                    zeroRecords: "Data tidak ditemukan",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    infoEmpty: "Tidak ada data",
                    infoFiltered: "(difilter dari _MAX_ total data)",
                    paginate: {
                        next: "›",
                        previous: "‹"
                    }
                }
            });
        });
    </script>
@endpush
