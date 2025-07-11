@extends('layouts.backend')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary">
                        Data obat
                        <a href="{{ route('obat.create') }}" class="btn btn-secondary btn-sm" style="color:white; float: right;">
                            Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table class="table" id="dataobat">
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
                                    @foreach ($obat as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->nama_obat }}</td>
                                            <td>{{ $data->kategori }}</td>
                                            <td>{{ $data->stok }}</td>
                                            <td>{{ $data->tanggal_kadaluarsa }}</td>
                                            <td>{{ $data->unit }}</td>
                                            <td>{{ $data->deskripsi }}</td>

                                            <td>
                                                <a href="{{ route('obat.show', $data->id) }}"
                                                    class="btn btn-info btn-sm">Show</a>
                                                    <a href="{{ route('obat.edit', $data->id) }}"
                                                    class="btn btn-success btn-sm">Edit</a>
                                                <form action="{{ route('obat.destroy', $data->id) }}" method="POST"
                                                    style="display:inline;"
                                                    onsubmit="return confirm('yakin ingin menghapus obat ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">Hapus</button>
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
@endpush
