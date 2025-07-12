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
                                    <div class="card-title"> Ubah Data rekam medis</div>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('rekam_medis.update', $rekam_medis->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-2">
                                            <label for="siswa_id">Pilih Siswa</label>
                                            <select name="siswa_id" class="form-control" required>
                                                @foreach ($siswa as $s)
                                                    <option value="{{ $s->id }}"
                                                        {{ $rekam_medis->siswa_id == $s->id ? 'selected' : '' }}>
                                                        {{ $s->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">tanggal </label>
                                            <input type="text" name="tanggal" class="form-control"
                                                value="{{ $rekam_medis->tanggal }}" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">keluhan </label>
                                            <input type="text" name="keluhan" class="form-control"
                                                value="{{ $rekam_medis->keluhan }}" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">tindakan </label>
                                            <input type="text" name="tindakan" class="form-control"
                                                value="{{ $rekam_medis->tindakan }}" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="obat_id">Obat</label>
                                            <select name="obat_id" class="form-control" required>
                                                @foreach ($obat as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $rekam_medis->obat_id == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nama_obat }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label for="user_id">Pilih Petugas</label>
                                        <select name="user_id" class="form-control" required>
                                            <option value="">-- Pilih Petugas --</option>
                                            @foreach ($users as $p)
                                                <option value="{{ $p->id }}"
                                                    {{ $rekam_medis->user_id == $p->id ? 'selected' : '' }}>
                                                    {{ $p->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="mb-2">
                                            <label for="">status </label>
                                            <input type="text" name="status" class="form-control"
                                                value="{{ $rekam_medis->status }}" required>
                                        </div>
                                        <div class="card-action">
                                            <button class="btn btn-info" style="float: right" type="submit">Ubah</button>
                                            <a href="{{ route('rekam_medis.index') }}" class=""><i
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
