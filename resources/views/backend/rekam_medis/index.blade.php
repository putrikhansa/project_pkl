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
                        Data Rekam Medis
                        <a href="{{ route('backend.rekam_medis.create') }}" class="btn btn-secondary btn-sm"
                            style="color:white; float: right;">
                            Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table class="table" id="datarekam_medis">
                                <thead class="text-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Siswa Id</th>
                                        <th>Tanggal</th>
                                        <th>Keluhan</th>
                                        <th>Tindakan</th>
                                        <th>Obat Id</th>
                                        <th>users Id</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rekam_medis as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->siswa->nama ?? '-' }}</td>
                                            <td>{{ $data->tanggal }}</td>
                                            <td>{{ $data->keluhan }}</td>
                                            <td>{{ $data->tindakan }}</td>
                                            <td>{{ $data->obat->id }}</td>
                                            <td>{{ $data->user->name }}</td>
                                            <td>
                                                <span
                                                    class="badge badge-status {{ $data->status === 'Pulang' ? 'bg-success' : 'bg-danger' }}">
                                                    {{ ucfirst($data->status) }}
                                                </span>
                                            </td>
                                            {{-- <td>{{ $data->status }}</td> --}}


                                            <td>
                                                <a href="{{ route('backend.rekam_medis.show', $data->id) }}"
                                                    class="btn btn-info btn-sm"><i class='bx bx-show'></i></a>
                                                <a href="{{ route('backend.rekam_medis.edit', $data->id) }}"
                                                    class="btn btn-success btn-sm"><i class='bx bx-edit'></i></a>
                                                <form action="{{ route('backend.rekam_medis.destroy', $data->id) }}"
                                                    method="POST" style="display:inline;"
                                                    onsubmit="return confirm('yakin ingin menghapus rekam_medis ini?')">
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
@endpush
