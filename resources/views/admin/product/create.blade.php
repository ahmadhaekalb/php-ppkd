@extends('admin.layouts.app')
@section('title', 'Tambah Produk')
@section('subtitle', 'Tambahkan produk baru untuk ditambahkan ke dalam daftar produk yang tersedia')

@section('content')
    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Produk (Wajib)*</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="slug">Slug (Opsional)</label>
                    <input type="text" name="slug" id="slug" class="form-control">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select name="category_id" id="category_id" class="form-select">
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="brief_description">Deskripsi Singkat*</label>
            <input type="text" name="brief_description" id="brief_description" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="editor" cols="30" rows="10" class="form-control"></textarea>

        </div>

        <div class="row">
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="price">Harga</label>
                    <input type="number" name="price" id="price" class="form-control">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="price">Harga Art Cartoon</label>
                    <input type="number" name="price_art_cartoon" class="form-control">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="price">Harga Art Paper</label>
                    <input type="number" name="price_art_paper" class="form-control">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="price">Harga HVS</label>
                    <input type="number" name="price_hvs" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="price" class="form-label">Harga Laminating Doff</label>
                    <input type="number" name="price_doft" class="form-control">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="price" class="form-label">Harga Laminating Glossy</label>
                    <input type="number" name="price_glossy" class="form-control">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="price" class="form-label">Harga Potong (Min 5x5 cm)</label>
                    <input type="number" name="cutting_price" class="form-control">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="image">Gambar (Opsional)</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn-custom btn-custom-primary">Simpan</button>
            <a href="{{ url()->previous() }}" class="btn-custom btn-custom-warning">Kembali</a>
        </div>
    </form>
@endsection
