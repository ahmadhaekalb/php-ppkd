@extends('admin.layouts.app')
@section('title', 'Edit Kategori Produk');
@section('subtitle', 'Edit Kategori Produk yang sudah ada');

@section('content')
    <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $c)
                    <option value="{{ $c->id }}" {{ $product->category_id == $c->id ? 'selected' : '' }}>
                        {{ $c->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom"> Nama Produk</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}">
            @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom">Stok</label>
            <input type="text" class="form-control" name="stock" value="{{ old('stock', $product->stock) }}">
            @error('stock')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom">Harga</label>
            <input type="text" class="form-control" name="price" value="{{ old('price', $product->price) }}">
            @error('price')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar Produk</label>
            @if ($product->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100"
                        class="img-thumbnail">
                </div>
            @endif
            <input type="file" name="image" id="image" class="form-control">
            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
        </div>
        <div class="">
            <button type="submit" class="btn-custom btn-custom-primary">Simpan Perubahan</button>
            <a href="{{ route('admin.product.index') }}" class="btn-custom btn-custom-danger">Batal</a>
        </div>
    </form>
@endsection
