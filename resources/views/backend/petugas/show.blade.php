@extends('layouts.backend')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner mt--8">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-11">
                        <div class="card full-height">
                            <div class="card-header">
                                <div class="card-title"> Show Data user</div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Nama user</th>
                                        <td>{{ $users->name }}</td>
                                    </tr>
                                  

                                    <tr>
                                        <th>No Hp</th>
                                        <td>{{ $users->no_hp }}</td>
                                    </tr>

                                </table>
                                <a href="{{ route('user.index') }}" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
