@extends('layouts.backend')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col">
                <div class="card">

                    {{-- Header --}}
                    <div class="card-header bg-primary d-flex justify-content-between align-items-center text-white">
                        <h5 class="mb-0">Data Kelas</h5>

                        {{-- Tambah: ADMIN SAJA --}}
                        @if (auth()->user()->role === 'admin')
                            <a href="{{ route('backend.kelas.create') }}" class="btn btn-light btn-sm">
                                Tambah
                            </a>
                        @endif
                    </div>

                    {{-- Body --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered align-middle" id="datakelas">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th width="10%">No</th>
                                        <th>Nama Kelas</th>

                                        {{-- Kolom aksi hanya untuk admin --}}
                                        @if (auth()->user()->role === 'admin')
                                            <th width="25%">Aksi</th>
                                        @endif
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($kelas as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $data->nama_kelas }}</td>

                                            {{-- Aksi ADMIN --}}
                                            @if (auth()->user()->role === 'admin')
                                                <td class="text-center">
                                                    <a href="{{ route('backend.kelas.edit', $data->id) }}"
                                                        class="btn btn-success btn-sm" title="Edit">
                                                        <i class="bx bx-edit"></i>
                                                    </a>

                                                    <form action="{{ route('backend.kelas.destroy', $data->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Yakin ingin menghapus kelas ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" title="Hapus">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            @endif
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
            $('#datakelas').DataTable({
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100],
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
