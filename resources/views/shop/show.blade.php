@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div class="row bg-white p-3 rounded shadow-sm">
            <div class="col-md-5 text-center">
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                    class="img-fluid border rounded mb-3" style="max-height:400px; object-fit:contain;">
                <div class="d-flex justify-content-center gap-2">
                    <img src="{{ asset('images/' . $product->image) }}" class="border rounded"
                        style="height:60px;cursor:pointer;">
                </div>
            </div>

            <div class="col-md-7">
                <h3 class="fw-bold mb-2">{{ $product->name }}</h3>

                <div class="mb-2">
                    <span class="text-warning me-2">
                        ★★★★★
                    </span>
                    <small class="text-muted">(2 Penilaian)</small>
                </div>

                <h2 class="text-danger fw-bold mb-3">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </h2>

                <div class="mb-3">
                    <strong>Stok:</strong> {{ $product->stock }}
                </div>

                <div class="mb-3">
                    <strong>Kategori:</strong> {{ $product->category->name ?? '-' }}
                </div>

                <div class="d-flex align-items-center mb-3">
                    <strong class="me-3">Kuantitas:</strong>
                    <input type="number" min="1" value="1" class="form-control w-auto text-center">
                </div>

                <div class="d-flex gap-2">
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-flex gap-2">
                        @csrf
                        {{-- <input type="number" name="quantity" min="1" value="1"
                            class="form-control w-auto text-center"> --}}
                        <button type="submit" class="btn btn-outline-info btn-lg flex-fill">
                            <i class="fas fa-cart-plus me-2"></i> Masukkan Keranjang
                        </button>
                    </form>

                    <form action="#" method="POST" class="d-flex gap-2 mt-2">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-primary btn-lg flex-fill">
                            Beli Sekarang
                        </button>
                    </form>

                </div>
            </div>
        </div>

        <div class="bg-white p-4 rounded shadow-sm mt-4">
            <h4 class="fw-bold mb-3">Deskripsi Produk</h4>
            <div style="white-space: pre-line;">
                {!! nl2br(e($product->description)) !!}
            </div>
        </div>
    </div>
@endsection
