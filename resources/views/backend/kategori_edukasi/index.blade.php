@extends('layouts.backend')

@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Kategori Edukasi</h5>
                        <p class="m-b-0">Manajemen pengelompokan konten kesehatan</p>
                    </div>
                </div>
                <div class="col-md-4 text-right">
                    <a href="{{ route('backend.kategori_edukasi.create') }}" class="btn btn-primary btn-round">
                        <i class="fa fa-plus"></i> Tambah Kategori
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">

                    @if (session('success'))
                        <div class="alert alert-success icons-alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="icofont icofont-close-line-circled"></i>
                            </button>
                            <p><strong>Sukses!</strong> {{ session('success') }}</p>
                        </div>
                    @endif

                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="10%" class="text-center">No</th>
                                        <th>Nama Kategori</th>
                                        <th width="15%" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kategori as $item)
                                        <tr>
                                            <td class="text-center"><strong>{{ $loop->iteration }}</strong></td>
                                            <td style="color: #000 !important;">{{ $item->nama_kategori }}</td>
                                            <td class="text-center">
                                                <form action="{{ route('backend.kategori_edukasi.destroy', $item->id) }}"
                                                    method="POST">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm shadow-sm"
                                                        onclick="return confirm('Hapus?')">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Data kosong</td>
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
@endsection
