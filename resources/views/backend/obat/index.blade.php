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
                            <table class="table" id="itemobat">
                                <thead class="text-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Obat</th>
                                        <th>Kategori</th>
                                        <th>Stok</th>
                                        <th>Tanggal Kadaluarsa</th>
                                        <th>Unit</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($obat as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
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
                                            <td>{{ $item->tanggal_kadaluarsa }}</td>
                                            <td>{{ $item->unit }}</td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td>
                                                <a href="{{ route('backend.obat.show', $item->id) }}"
                                                    class="btn btn-info btn-sm"><i class='bx bx-show'></i></a>
                                                <a href="{{ route('backend.obat.edit', $item->id) }}"
                                                    class="btn btn-success btn-sm"><i class='bx bx-edit'></i></a>
                                                <form action="{{ route('backend.obat.destroy', $item->id) }}"
                                                    method="POST" style="display:inline;"
                                                    onsubmit="return confirm('yakin ingin menghapus obat ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"><i class='bx bx-trash'></i></button>
                                                </form>
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
        $(document).ready(function () {
            $('#itemobat').DataTable();
        });
    </script>
@endpush
