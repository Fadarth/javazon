@extends('layouts.app')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg px-4">
        <div class="py-4">
            <h4 class="mb-4">Tambah Barang</h4>

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Form Tambah Barang</h6>
                    <a href="{{ url('add-barang') }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-undo me-1"></i> Kembali
                    </a>
                </div>

                <div class="card-body">
                    <form action="{{ route('add-barang.store') }}" method="POST" id="form-add"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Nama Barang</label>
                            <input type="text" name="name" class="form-control border"
                                placeholder="Masukkan nama barang..." value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">Deskripsi</label>
                            <textarea name="description" rows="4" class="form-control border" placeholder="Masukkan deskripsi barang...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label fw-bold">Harga</label>
                            <input type="number" name="price" class="form-control border" placeholder="Contoh: 100000"
                                value="{{ old('price') }}">
                            @error('price')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="stock" class="form-label fw-bold">Stok</label>
                            <input type="number" name="stock" class="form-control border"
                                placeholder="Jumlah stok tersedia" value="{{ old('stock') }}">
                            @error('stock')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label fw-bold">Kategori</label>
                            <select name="category_id" class="form-select border">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}"
                                        {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label fw-bold">Foto Barang</label>
                            <input type="file" name="image" class="form-control border p-2" style="cursor: pointer;">
                            @error('image')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </form>

                </div>

                <div class="card-footer text-end">
                    <button type="submit" form="form-add" class="btn btn-primary">
                        <i class="fas fa-paper-plane me-1"></i> Submit
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection
