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
                            <h2 class="mb-3 line-head" id="buttons">List Tujuan
                                <a href="{{ route('destination.create') }}"
                                    class="pull-right btn btn-md btn btn-success">Tambah Data</a>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <form class="col-12" action="{{ route('destination.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="category">Kategori</label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="district">Wilayah</label>
                            <select class="form-control" id="district" name="district">
                                <option value="" disabled selected>Pilih Wilayah</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->district_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="destination_name">Nama Tujuan</label>
                            <input class="form-control" id="destination_name" type="text" name="destination_name"
                                placeholder="Masukkan nama wilayah"><small class="form-text text-muted">We'll never
                                share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="destination_content">Konten</label>
                            <input class="form-control" id="destination_content" type="text" name="destination_content"
                                placeholder="Masukkan nama wilayah"><small class="form-text text-muted">We'll never
                                share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="destination_photo">Foto</label><br>
                            <input id="destination_photo" type="file" name="destination_photo">
                        </div>
                        <div class="tile-footer text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('destination.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
