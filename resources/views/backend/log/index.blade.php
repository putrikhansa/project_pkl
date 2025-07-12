@extends('layouts.backend') {{-- ganti sesuai layout kamu --}}

@section('content')
    <div class="container mt-4">
        <h3 class="mb-4">Log Aktivitas</h3>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Waktu</th>
                        <th>Petugas</th> {{-- Kolom baru --}}
                        <th>Aksi</th>
                        <th>Tabel</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($logs as $log)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $log->created_at->format('d M Y H:i') }}</td>
                            <td>{{ $log->user->name ?? '-' }}</td>
                            <td>{{ $log->aksi }}</td>
                            <td>{{ $log->tabel ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada aktivitas tercatat.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
