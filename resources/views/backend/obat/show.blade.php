@extends('layouts.backend')

@section('content')
    <div class="main-panel">
        <div class="content-fluid py-4">
            <div class="page-inner mt--8">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-10">
                        <div class="card full-height">

                            {{-- Header --}}
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Detail Data Obat</h5>
                            </div>

                            {{-- Body --}}
                            <div class="card-body py-4">
                                <table class="table table-borderless">
                                    <tr>
                                        <th width="30%">Nama Obat</th>
                                        <td>{{ $obat->nama_obat }}</td>
                                    </tr>

                                    <tr>
                                        <th>Kategori</th>
                                        <td>{{ $obat->kategori }}</td>
                                    </tr>

                                    <tr>
                                        <th>Stok</th>
                                        <td>{{ $obat->stok }} {{ $obat->unit }}</td>
                                    </tr>

                                    <tr>
                                        <th>Status Kadaluarsa</th>
                                        <td>
                                            @if ($obat->status_kadaluarsa == 'expired')
                                                <span class="badge bg-danger">Expired</span>
                                            @elseif ($obat->status_kadaluarsa == 'near')
                                                <span class="badge bg-warning text-dark">Hampir Expired</span>
                                            @else
                                                <span class="badge bg-success">Aman</span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Deskripsi</th>
                                        <td>{{ $obat->deskripsi }}</td>
                                    </tr>
                                </table>

                                {{-- Tombol --}}
                                <div class="mt-4">
                                    <a href="{{ route('backend.obat.index') }}" class="btn btn-secondary btn-sm">
                                        Kembali
                                    </a>

                                    @if (auth()->user()->role === 'admin')
                                        <a href="{{ route('backend.obat.edit', $obat->id) }}"
                                            class="btn btn-success btn-sm ms-2">
                                            Edit
                                        </a>
                                    @endif
                                </div>
                            </div>
                            {{-- End Body --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
