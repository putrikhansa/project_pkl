@extends('layouts.backend')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col">
                <div class="card">

                    {{-- HEADER --}}
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Data Siswa</h5>


                        <a href="{{ route('backend.siswa.create') }}" class="btn btn-light btn-sm">
                            Tambah
                        </a>

                    </div>

                    {{-- BODY --}}
                    <div class="card-body">
                        <div class="table-responsive">

                            {{-- SEARCH --}}
                            <input type="text" id="search-input" class="form-control mb-3"
                                placeholder="Cari nama siswa atau kelas...">
                            <table class="table table-bordered table-hover align-middle">
                                <thead class="table-secondary text-center">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="15%">NIS</th>
                                        <th>Nama Siswa</th>
                                        <th width="15%">Kelas</th>
                                        <th width="15%">Jenis Kelamin</th>

                                        @if (auth()->user()->role === 'admin')
                                            <th width="15%">Input Oleh</th>
                                        @endif

                                        <th width="20%">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($siswas as $index => $siswa)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td class="text-center">{{ $siswa->nis }}</td>
                                            <td>{{ $siswa->nama }}</td>
                                            <td class="text-center">{{ $siswa->kelas->nama_kelas }}</td>
                                            <td class="text-center">{{ $siswa->jenis_kelamin }}</td>

                                            @if (auth()->user()->role === 'admin')
                                                <td class="text-center">{{ $siswa->user->name ?? '-' }}</td>
                                            @endif

                                            <td class="text-center">
                                                <a href="{{ route('backend.siswa.show', $siswa->id) }}"
                                                    class="btn btn-info btn-sm">
                                                    Detail
                                                </a>

                                                @if (auth()->user()->role === 'petugas')
                                                    <a href="{{ route('backend.siswa.edit', $siswa->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        Edit
                                                    </a>

                                                    <form action="{{ route('backend.siswa.destroy', $siswa->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Yakin hapus data?')">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">
                                                Data siswa belum ada
                                            </td>
                                        </tr>
                                    @endforelse
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
    <script>
        $(document).ready(function() {
            function fetchData() {
                let keyword = $('#search-input').val();

                $.ajax({
                    url: "{{ route('backend.siswa.search') }}",
                    type: 'GET',
                    data: {
                        keyword
                    },
                    success: function(response) {
                        $('#data-siswa').html(response.data);
                    },
                    error: function() {
                        alert('Gagal memuat data.');
                    }
                });
            }

            $('#search-input').on('keyup', fetchData);
        });
    </script>
@endpush
