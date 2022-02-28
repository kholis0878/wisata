@extends('layouts.app')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
                <p>A free and open source Bootstrap 4 admin template</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            </ul>
        </div>
        <div class="row col-12">
            <div class="tile col-12 mb-4">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="mb-3 line-head" id="buttons">List Wilayah
                                <a href="{{ route('district.create') }}"
                                    class="pull-right btn btn-md btn btn-success">Edit Wilayah</a>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <form class="col-12" action="{{ route('district.update', $district->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="district_name">Nama Wilayah</label>
                            <input value="{{ $district->district_name }}" class="form-control" id="district_name" type="text" name="district_name"
                                placeholder="Masukkan nama wilayah"><small class="form-text text-muted">We'll never
                                share your email with anyone else.</small>
                        </div>
                        <div class="tile-footer text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('district.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
