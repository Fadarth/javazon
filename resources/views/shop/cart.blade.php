@extends('layouts.app')
<style>
    .custom-blue {
        background-color: #00BFFF !important;
        /* biru Bootstrap */
        color: #fff !important;
        /* teks putih */
    }

    .custom-blue th {
        border-color: #00BFFF !important;
        /* opsional, border biru lebih gelap */
    }
</style>

@section('content')
    <div class="container my-5">
        <h3 class="mb-4 fw-bold">🛒 Keranjang Belanja</h3>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table custom-blue">
                    <tr>
                        <th><input type="checkbox"></th>
                        <th>Produk</th>
                        <th>Harga Satuan</th>
                        <th>Kuantitas</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <tr>
                            <td>
                                <input type="checkbox" name="selected[]" value="{{ $item->id }}">
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('images/' . $item->product->image) }}" alt="..." class="rounded"
                                        style="width: 70px; height: 70px; object-fit: cover;">
                                    <div class="ms-3">
                                        <strong>{{ $item->product->name }}</strong><br>
                                        <small>Warna: {{ $item->variant ?? '-' }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>Rp {{ number_format($item->product->price, 0, ',', '.') }}</td>
                            <td>
                                <div class="input-group" style="width: 120px;">
                                    <button class="btn btn-outline-secondary btn-sm">-</button>
                                    <input type="text" class="form-control text-center" value="{{ $item->quantity }}">
                                    <button class="btn btn-outline-secondary btn-sm">+</button>
                                </div>
                            </td>
                            <td>
                                Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- RINGKASAN -->
        <div class="row justify-content-end mt-4">
            <div class="col-md-5">
                <div class="card shadow-sm p-4">
                    <h5 class="fw-bold mb-3">Ringkasan Belanja</h5>

                    <div class="mb-2">
                        <label for="voucher" class="form-label">Voucher</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="voucher" placeholder="Masukkan kode promo">
                            <button class="btn btn-outline-primary">Apply</button>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <span>Subtotal</span>
                        <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>
                    <div class="d-flex justify-content-between mt-1">
                        <span>Diskon</span>
                        <span class="text-success">- Rp {{ number_format($discount ?? 0, 0, ',', '.') }}</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between fs-5 fw-bold">
                        <span>Total</span>
                        <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>

                    <button class="btn btn-primary w-100 mt-4 py-2 fw-bold">
                        Checkout
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
