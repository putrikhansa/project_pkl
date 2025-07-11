@extends('layouts.backend')
@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Tambah petugas
                    </div>
                    <div class="card-body">
                        <form action="{{ route('petugas.store') }}" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label for="">Nama </label>
                                <input type="text" name="name"
                                    class="form-control
                            @error('name') is-invalid @enderror">

                            </div>
                            <div class="mb-2">
                                <label for="">Email </label>
                                <input type="email" name="email"
                                    class="form-control
                            @error('email') is-invalid @enderror">

                            </div>
                           
                            <div class="mb-2">
                                <label for="">password </label>
                                <input type="password" name="password"
                                    class="form-control
                            @error('password') is-invalid @enderror">

                            </div>
                            <div class="mb-2">
                                <label for="">no_hp </label>
                                <input type="text" name="no_hp"
                                    class="form-control
                            @error('no_hp') is-invalid @enderror">

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
