@extends('layouts.backend')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary">
                        Data user
                        <a href="{{ route('backend.user.create') }}" class="btn btn-secondary btn-sm"
                            style="color:white; float: right;">
                            Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table class="table" id="datauser">
                                <thead class="text-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama user</th>
                                        <th>Email</th>
                                        <th>No Hp</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $index => $user)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if ($user->role === 'admin' && empty($user->no_hp))
                                                    <span class="text-muted fst-italic">Tidak Tersedia</span>
                                                @else
                                                    {{ $user->no_hp }}
                                                @endif
                                            </td>
                                            <td>{{ ucfirst($user->role) }}</td>
                                            {{-- <td>

                                                <form action="{{ route('backend.user.destroy', $user->id) }}" method="POST"
                                                    style="display: inline-block;"
                                                    onsubmit="return confirm('Yakin hapus user ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>
@endpush
