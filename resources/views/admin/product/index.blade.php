@extends('admin.layouts.app')
@section('title', 'Manajemen Produk')
@section('subtitle', 'Pengelompokan Kategori Produk')
@section('content')
    <div align="right">
            <a href="{{ route('admin.product.create') }}" class="btn table-action">
                <i class="bi bi-plus-circle-fill"></i>
                Tambah Produk
            </a>
        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Kategori</th>
                        <th>Nama Produk</th>
                        <th>Jumlah Stok</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if ($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" width="100"
                                        class="img-thumbnail" alt="{{ $item->name ?? '' }}">
                                @else
                                    <span class="text-muted opacity-50">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>{{ $item->category->name ?? 'N/A' }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>
                                Rp.{{ number_format($item->price, 2, ',', '.') }}
                            </td>
                            <td>
                                <a class="table-btn-action" title="Edit"
                                    href="{{ route('admin.product.edit', $item->id) }}">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.product.destroy', $item->id) }}" method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm ('Apakah anda yakin ingin menghapus data ini??')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="table-btn-action delete" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
