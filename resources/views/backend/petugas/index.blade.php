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
                        Data petugas
                        <a href="{{ route('petugas.create') }}" class="btn btn-secondary btn-sm"
                            style="color:white; float: right;">
                            Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table class="table" id="datapetugas">
                                <thead class="text-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama petugas</th>
                                        <th>Email</th>
                                        <th>No Hp</th>


                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($petugas as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->no_hp }}</td>
                                            <td>
                                                <a href="{{ route('petugas.show', $data->id) }}"
                                                    class="btn btn-info btn-sm">Show</a>
                                                <a href="{{ route('petugas.edit', $data->id) }}"
                                                    class="btn btn-success btn-sm">Edit</a>
                                                <form action="{{ route('petugas.destroy', $data->id) }}" method="POST"
                                                    style="display:inline;"
                                                    onsubmit="return confirm('yakin ingin menghapus petugas ini?')">
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
