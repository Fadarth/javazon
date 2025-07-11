@extends('layouts.app')

@section('content')
    <style>
        .horizontal-scroll-container {
            display: flex;
            overflow-x: auto;
            gap: 1rem;
            padding-bottom: 10px;
            scroll-behavior: smooth;
        }

        .horizontal-scroll-container::-webkit-scrollbar {
            height: 8px;
        }

        .horizontal-scroll-container::-webkit-scrollbar-thumb {
            background-color: #ccc;
            border-radius: 4px;
        }

        .product-card {
            min-width: 220px;
            max-width: 220px;
            flex-shrink: 0;
            background-color: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .product-img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
    </style>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg px-4">
        <div class="py-4">
            <div class="d-flex gap-2 flex-wrap mb-4">
                <a href="#all-products" class="btn btn-outline-dark">All Products</a>
                @foreach ($categories as $category)
                    <a href="#category-{{ $category->id }}" class="btn btn-outline-primary">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>

            <div class="mb-5" id="all-products">
                <h4 class="mb-3">All Products</h4>

                <div class="horizontal-scroll-container">
                    @foreach ($allProducts as $product)
                        <div class="product-card">
                            <img src="{{ asset('images/' . $product->image) }}" alt="product" class="product-img">
                            <div class="p-2">
                                <h6 class="mb-1">{{ $product->name }}</h6>
                                <p class="text-muted mb-1">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                <a href="#" class="btn btn-sm btn-success w-100">
                                    <i class="fas fa-shopping-cart me-1"></i> Beli
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


            @if ($products->count())
                @foreach ($categories as $category)
                    <div class="mb-5" id="category-{{ $category->id }}">
                        <h5 class="mb-3">{{ $category->name }}</h5>
                        <div class="d-flex overflow-auto pb-2" style="gap: 1rem;">
                            @foreach ($category->products as $item)
                                <div class="card" style="min-width: 220px;">
                                    <img src="{{ asset('images/' . $item->image) }}" class="card-img-top"
                                        style="height: 150px; object-fit: cover;">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ $item->name }}</h6>
                                        <p class="text-muted mb-1">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                        <a href="#" class="btn btn-sm btn-success w-100">
                                            <i class="fas fa-shopping-cart me-1"></i> Beli
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center text-muted">Tidak ada barang ditemukan.</p>
            @endif

        </div>
    </main>
@endsection
<script>
    document.querySelectorAll('a[href^="#category-"]').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
</script>
