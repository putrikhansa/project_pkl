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
                                    <div class="card-title"> Ubah Data user</div>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('user.update', $users->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-2">
                                            <label for="">nama </label>
                                            <input type="text" name="nama" class="form-control"
                                                value="{{ $users->nama }}" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">No Hp </label>
                                            <input type="text" name="no_hp" class="form-control"
                                                value="{{ $users->no_hp }}" required>
                                        </div>

                                        <div class="card-action">
                                            <button class="btn btn-info" style="float: right" type="submit">Ubah</button>
                                            <a href="{{ route('user.index') }}" class=""><i
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
