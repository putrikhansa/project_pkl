@extends('layouts.backend')
@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Tambah User
                    </div>
                    <div class="card-body">
                        <form action="{{ route('backend.user.store') }}" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label for="">nama </label>
                                <input type="text" name="name"
                                    class="form-control
                            @error('name') is-invalid @enderror">
                            </div>
                            <div class="mb-2">
                                <label for="">email </label>
                                <input type="email" name="email"
                                    class="form-control
                            @error('email') is-invalid @enderror">
                            </div>
                            <div class="mb-2">
                                <label for="">no hp </label>
                                <input type="number" name="no_hp"
                                    class="form-control
                            @error('no_hp') is-invalid @enderror">
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" id="role" class="form-control" required>
                                    <option value="">-- Pilih Role --</option>
                                    <option value="petugas" {{ old('role') == 'petugas' ? 'selected' : '' }}>Petugas
                                    </option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="">Password</label>
                                <input type="password" name="password"
                                    class="form-control
                            @error('password') is-invalid @enderror">
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
