@extends('layouts.backend')


@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary">
                        Data siswa
                        <a href="{{ route('siswa.create') }}" class="btn btn-secondary btn-sm"
                            style="color:white; float: right;">
                            Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table table-responsive">
                            <select id="filter-kelas" class="form-control mb-3">
                                <option value="">-- Semua Kelas --</option>
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                                @endforeach
                            </select>
                            <table class="table" id="datasiswa">
                                <thead class="text-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="data-siswa">
                                    @include('backend.siswa._table', ['siswas' => $siswas])
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#filter-kelas').on('change', function() {
            let kelasId = $(this).val();
            console.log('Filter kelas:', kelasId); // debug

            $.ajax({
                url: "{{ route('siswa.filter') }}",
                type: 'GET',
                data: {
                    kelas_id: kelasId
                },
                success: function(response) {
                    console.log(response.data); // debug isi respon
                    $('#data-siswa').html(response.data);
                },
                error: function(xhr) {
                    console.log('Error:', xhr.responseText);
                    alert('Gagal memuat data.');
                }
            });
        });
    </script>
@endpush
