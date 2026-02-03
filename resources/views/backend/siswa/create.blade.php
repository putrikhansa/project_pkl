@extends('layouts.backend')

@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h6 class="mb-0">Tambah Data Siswa</h6>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('backend.siswa.store') }}" method="POST">
                            @csrf

                            {{-- NIS --}}
                            <div class="mb-3">
                                <label class="form-label">NIS</label>
                                <input type="text" name="nis" value="{{ old('nis') }}"
                                    class="form-control @error('nis') is-invalid @enderror" placeholder="Contoh: 26001">
                                @error('nis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Nama --}}
                            <div class="mb-3">
                                <label class="form-label">Nama Siswa</label>
                                <input type="text" name="nama" value="{{ old('nama') }}"
                                    class="form-control @error('nama') is-invalid @enderror"
                                    placeholder="Masukkan nama siswa">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Kelas --}}
                            <div class="mb-3">
                                <label class="form-label">Kelas</label>
                                <select name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror">
                                    <option value="">-- Pilih Kelas --</option>
                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('kelas_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kelas_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Jenis Kelamin --}}
                            <div class="mb-4">
                                <label class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin"
                                    class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>
                                    <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>
                                        Laki-Laki
                                    </option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tombol --}}
                            <div class="d-flex justify-content-end gap-2">
                                <button type="reset" class="btn btn-warning btn-sm">
                                    Reset
                                </button>
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
