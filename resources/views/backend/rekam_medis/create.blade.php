@extends('layouts.backend')
@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Tambah rekam medis
                    </div>
                    <div class="card-body">
                        <form action="{{ route('rekam_medis.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="siswa_id">Pilih Siswa</label>
                                <select name="siswa_id" class="form-control">
                                    <option value="">-- Pilih Siswa --</option>
                                    @foreach ($siswa as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->nama ?? '-' }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('siswa_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="">tanggal </label>
                                <input type="date" name="tanggal"
                                    class="form-control
                            @error('tanggal') is-invalid @enderror">

                            </div>
                            <div class="mb-2">
                                <label for="">keluhan </label>
                                <input type="text" name="keluhan"
                                    class="form-control
                            @error('keluhan') is-invalid @enderror">

                            </div>
                            <div class="mb-2">
                                <label for="">Tindakan </label>
                                <input type="text" name="tindakan"
                                    class="form-control
                            @error('tindakan') is-invalid @enderror">

                            </div>
                            <div class="mb-3">
                                <label for="obat_id">Pilih Obat</label>
                                <select name="obat_id" class="form-control" multiple>
                                    @foreach ($obat as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_obat }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="petugas_id">Pilih Petugas</label>
                                <select name="petugas_id" class="form-control">
                                    <option value="">-- Pilih Petugas --</option>
                                    @foreach ($petugas as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="">status </label>
                                <input type="text" name="status"
                                    class="form-control
                            @error('status') is-invalid @enderror">

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
