@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-5">
                <img src="{{ asset('images/' . $product->image) }}" alt="Gambar Produk" class="img-fluid rounded">
            </div>
            <div class="col-md-7">
                <h2>{{ $product->name }}</h2>
                <p class="text-muted mb-2">Kategori: {{ $product->category->name ?? '-' }}</p>
                <h4 class="text-success">Rp {{ number_format($product->price, 0, ',', '.') }}</h4>
                <p class="mt-3">{{ $product->description }}</p>
                <p>Stok: {{ $product->stock }}</p>

                <a href="#" class="btn btn-primary">
                    <i class="fas fa-cart-plus me-1"></i> Tambah ke Keranjang
                </a>
            </div>
        </div>
    </div>
@endsection
