@extends('frontend.layout')

@section('content')
    <section class="container py-5">
        <h2 class="mb-4 text-center">Jadwal Pemeriksaan Kesehatan</h2>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kelas</th>
                        <th>Petugas</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jadwal as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                            <td>{{ $item->kelas->nama ?? '-' }}</td>
                            <td>{{ $item->user->name ?? '-' }}</td>
                            <td>{{ $item->keterangan }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada jadwal</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
