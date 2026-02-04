@extends('layouts.backend')

@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Edukasi Kesehatan</h5>
                        <p class="m-b-0">Manajemen konten informasi kesehatan siswa</p>
                    </div>
                </div>
                <div class="col-md-4 text-right">
                    <a href="{{ route('backend.edukasi.create') }}" class="btn btn-primary btn-round">
                        <i class="fa fa-plus"></i> Tambah Edukasi
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h5>Daftar Materi Edukasi</h5>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="fa fa-wrench open-card-option"></i></li>
                                    <li><i class="fa fa-window-maximize full-card"></i></li>
                                    <li><i class="fa fa-minus minimize-card"></i></li>
                                    <li><i class="fa fa-refresh reload-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th width="5%" class="text-center">No</th>
                                            <th width="10%">Foto</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Penulis</th>
                                            <th class="text-center">Status</th>
                                            <th width="15%" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($edukasi as $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>
                                                    @if ($item->foto)
                                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="Thumbnail"
                                                            style="width: 70px; height: 50px; object-fit: cover; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                                    @else
                                                        <div class="text-center bg-light"
                                                            style="width: 70px; height: 50px; line-height: 50px; border-radius: 5px; font-size: 10px; color: #ccc;">
                                                            No Image
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <strong>{{ $item->judul }}</strong>
                                                    <br>
                                                    <small class="text-muted"><i class="fa fa-calendar"></i>
                                                        {{ $item->tanggal_publish ? $item->tanggal_publish->format('d M Y') : '-' }}</small>
                                                </td>
                                                <td>
                                                    <span
                                                        class="label label-primary">{{ $item->kategori->nama_kategori }}</span>
                                                </td>
                                                <td>{{ $item->penulis->name }}</td>
                                                <td class="text-center">
                                                    <form action="{{ route('backend.edukasi.toggle', $item->id) }}"
                                                        method="POST" id="form-toggle-{{ $item->id }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <label class="switch-custom">
                                                            <input type="checkbox"
                                                                onchange="document.getElementById('form-toggle-{{ $item->id }}').submit()"
                                                                {{ $item->status == 'publish' ? 'checked' : '' }}>
                                                            <span class="slider-text round"></span>
                                                        </label>
                                                    </form>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('backend.edukasi.edit', $item->id) }}"
                                                        class="btn btn-sm btn-info btn-outline-info" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <form action="{{ route('backend.edukasi.destroy', $item->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger btn-outline-danger" title="Hapus">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center text-muted">
                                                    <br>
                                                    <i class="fa fa-folder-open fa-3x"></i>
                                                    <p class="m-t-10">Belum ada data edukasi.</p>
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
    </div>
@endsection

@push('styles')
    <style>
        /* Menyelaraskan vertical align tabel agar konten di tengah */
        .table td {
            vertical-align: middle !important;
        }

        /* Container switch */
        .switch-custom {
            position: relative;
            display: inline-block;
            width: 75px;
            height: 30px;
            margin-bottom: 0;
        }

        .switch-custom input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider-text {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider-text:before {
            position: absolute;
            content: "";
            height: 22px;
            width: 22px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
            z-index: 2;
        }

        .slider-text:after {
            content: "DRAFT";
            color: white;
            display: block;
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 60%;
            font-size: 10px;
            font-family: Arial, sans-serif;
            font-weight: bold;
        }

        input:checked+.slider-text {
            background-color: #1977cc;
        }

        input:checked+.slider-text:before {
            transform: translateX(45px);
        }

        input:checked+.slider-text:after {
            content: "PUB";
            left: 35%;
        }
    </style>
@endpush
