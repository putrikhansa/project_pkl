@extends('layouts.backend')
@section('content')
    <div class="wrapper">
        <div class="main-panel">
            <div class="content">
                <div class="page-inner mt--8">
                    <div class="row justify-content-center mt-5">
                        <div class="col-md-11">
                            <div class="card full-height">
                                <div class="card-header">
                                    <div class="card-title"> Ubah Data Jadwal Pemeriksaan</div>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('jadwal_pemeriksaan.update', $jadwal_pemeriksaan->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-2">
                                            <label for="">tanggal </label>
                                            <input type="date" name="tanggal" class="form-control"
                                                value="{{ $jadwal_pemeriksaan->tanggal }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="kelas_id">Pilih Kelas</label>
                                            <select name="kelas_id" class="form-control">
                                                @foreach ($kelas as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $jadwal_pemeriksaan->kelas_id == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nama_kelas }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="user_id">Pilih Petugas</label>
                                            <select name="user_id" class="form-control">
                                                @foreach ($users as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $jadwal_pemeriksaan->user_id == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">keterangan </label>
                                            <input type="text" name="keterangan" class="form-control"
                                                value="{{ $jadwal_pemeriksaan->keterangan }}" required>
                                        </div>

                                        <div class="card-action">
                                            <button class="btn btn-info" style="float: right" type="submit">Ubah</button>
                                            <a href="{{ route('jadwal_pemeriksaan.index') }}" class=""><i
                                                    class="flaticon-back"></i></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
