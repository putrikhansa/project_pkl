@extends('layouts.backend')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Tambah siswa
                    </div>
                    <div class="card-body">
                        <form action="{{ route('backend.siswa.store') }}" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label for="">nama </label>
                                <input type="text" name="nama"
                                    class="form-control
                            @error('nama') is-invalid @enderror">
                            </div>
                            <div class="mb-3">
                                <label for="kelas_id">Kelas</label>
                                <select name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror"
                                    required>
                                    <option value="">-- Pilih Kelas --</option>
                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('kelas_id', $siswa->kelas_id ?? '') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kelas_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="">Jenis Kelamin </label>
                                <select name="jenis_kelamin" id=""
                                    class="form-control
                            @error('jenis_kelamin') is-invalid @enderror">
                                    <option value="">Pilih Opsi</option>
                                    <option value="Perempuan">Perempuan</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <button type="submit" class="btn btn-sm btn-outline-primary">Simpan</button>
                                <button type="reset" class="btn btn-sm btn-outline-warning">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
