@extends('layouts.backend')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner mt--8">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-11">
                        <div class="card full-height">
                            <div class="card-header">
                                <div class="card-title"> Show Data rekam_medis</div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Nama Siswa</th>
                                        <td>{{ $rekam_medis->siswa->nama ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kelas</th>
                                        <td>{{ $rekam_medis->siswa->kelas->nama_kelas ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Keluhan</th>
                                        <td>{{ $rekam_medis->keluhan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tindakan</th>
                                        <td>{{ $rekam_medis->tindakan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Obat</th>
                                        <td>{{ $rekam_medis->obat->nama_obat ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Petugas</th>
                                        <td>{{ $rekam_medis->user->name ?? '-' }}</td>
                                    </tr>

                                </table>
                                <a href="{{ route('rekam_medis.index') }}" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
