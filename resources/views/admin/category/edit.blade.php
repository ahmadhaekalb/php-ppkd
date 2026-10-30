@extends('admin.layouts.app')
@section('title', 'Tambah User');
@section('subtitle', 'Buat akun baru dengan akses ke Panel Admin');

@section('content')
    <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label-custom"> Nama Lengkap</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}">
            @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom"> Slug (Opsional)</label>
            <input type="text" class="form-control" name="slug" value="{{ old('slug'), $category->slug }}">
            @error('slug')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom">Ikon</label>
            <input type="etxt" class="form-control" name="icon" value="{{ old('icon'), $category->icon }}">
            @error('icon')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom">Urutan Tampil</label>
            <input type="number" class="form-control" name="sort_order" value="{{ old('sort_order'), $category->sort_order}}">
            @error('sort_order')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn-custom btn-custom-primary">Simpan</button>
        </div>
    </form>
@endsection
