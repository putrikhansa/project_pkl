@extends('layouts.backend')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Data Siswa
                        <a href="{{ route('siswa.create') }}" class="btn btn-secondary btn-sm float-end">
                            Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {{-- <select id="filter-kelas" class="form-select mb-3" style="width: 200px">
                                <option value="">Semua Kelas</option>
                                @foreach ($kelasList as $kelas)
                                    <option value="{{ $kelas->nama_kelas }}">{{ $kelas->nama_kelas }}</option>
                                @endforeach
                            </select> --}}
                            <!-- ✅ Kolom Pencarian -->
                            <input type="text" id="search-input" class="form-control mb-3"
                                placeholder="Cari nama siswa atau kelas...">

                            <!-- ✅ Tabel Data -->
                            <table class="table" id="datasiswa">
                                <thead class="text-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Jenis Kelamin</th>
                                        @if (auth()->user()->role === 'admin')
                                            <th>Input Oleh</th> {{-- Kolom baru --}}
                                        @endif
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="data-siswa">
                                    @include('backend.siswa.search', ['siswas' => $siswas])
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
                    url: "{{ route('siswa.search') }}",
                    type: 'GET',
                    data: {
                        keyword: keyword,
                    },
                    success: function(response) {
                        $('#data-siswa').html(response.data);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        alert('Gagal memuat data.');
                    }
                });
            }

            $('#search-input').on('keyup', fetchData);
        });
    </script>
@endpush
