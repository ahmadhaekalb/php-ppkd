@extends('admin.layouts.app')
@section('title', 'Tambah User');
@section('subtitle', 'Tambah Kategori produk baru');

@section('content')
    <form action="{{ route('admin.category.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label-custom"> Nama Lengkap</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom"> Slug (Opsional)</label>
            <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
            @error('slug')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom">Ikon</label>
            <input type="etxt" class="form-control" name="icon">
            @error('icon')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom">Urutan Tampil</label>
            <input type="number" class="form-control" name="sort_order" value="{{ old('sort_order') }}">
            @error('sort_order')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn-custom btn-custom-primary">Simpan</button>
        </div>
    </form>
@endsection
