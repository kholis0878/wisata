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
                            <h2 class="mb-3 line-head" id="buttons">Category List
                                <a href="{{ route('category.create') }}"
                                    class="pull-right btn btn-md btn btn-success">Edit Kategori</a>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <form class="col-12" action="{{ route('category.update', $category->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="category_name">Nama Kategori</label>
                            <input value="{{ $category->name }}" class="form-control" id="category_name" type="text" name="name"
                                placeholder="Masukkan nama wisata, ex: Wisata Sungai"><small class="form-text text-muted" id="emailHelp">We'll never
                                share your email with anyone else.</small>
                        </div>
                        <div class="tile-footer text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('category.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
