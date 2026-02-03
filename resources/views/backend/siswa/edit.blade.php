@extends('layouts.backend')

@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ubah Data Siswa</div>
                    <div class="card-body">
                        <form action="{{ route('backend.siswa.update', $siswa->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- NIS --}}
                            <div class="mb-3">
                                <label for="nis">NIS</label>
                                <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror"
                                    value="{{ old('nis', $siswa->nis) }}" readonly>
                                @error('nis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- Nama --}}
                            <div class="mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama"
                                    class="form-control @error('nama') is-invalid @enderror"
                                    value="{{ old('nama', $siswa->nama) }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Kelas --}}
                            <div class="mb-3">
                                <label for="kelas_id">Kelas</label>
                                <select name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror">
                                    <option value="">-- Pilih Kelas --</option>
                                    @foreach ($kelas as $kelas)
                                        <option value="{{ $kelas->id }}"
                                            {{ old('kelas_id', $siswa->kelas_id) == $kelas->id ? 'selected' : '' }}>
                                            {{ $kelas->nama_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kelas_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Jenis Kelamin --}}
                            <div class="mb-3">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin"
                                    class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                    <option value="">Pilih Opsi</option>
                                    <option value="Laki-Laki"
                                        {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>
                                        Laki-Laki</option>
                                    <option value="Perempuan"
                                        {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tombol --}}
                            <div class="card-action">
                                <button class="btn btn-info" style="float: right" type="submit">Ubah</button>
                                <a href="{{ route('backend.siswa.index') }}" class=""><i
                                        class="flaticon-back"></i></a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
