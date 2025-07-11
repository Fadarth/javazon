@extends('layouts.app')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg px-4">
        <div class="py-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Daftar Barang</h4>
                <a href="{{ url('add-barang/add') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-plus me-1"></i> Tambah Barang
                </a>
            </div>

            {{-- Flash message --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-header pb-0">
                    <h6 class="mb-0">Tabel Barang</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder">No</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder">Nama</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder">Deskripsi</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder">Harga</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder">Stok</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder">Foto</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder">Kategori</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-sm">{{ $row->name }}</td>
                                        <td class="text-sm">{{ Str::limit($row->description, 50) }}</td>
                                        <td class="text-sm">Rp {{ number_format($row->price, 0, ',', '.') }}</td>
                                        <td class="text-sm">{{ $row->stock }}</td>
                                        <td>
                                            @if ($row->image)
                                                <img src="{{ asset('images/' . $row->image) }}" class="img-thumbnail"
                                                    style="width: 80px; height: 80px; object-fit: cover;">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                                        <td class="text-sm">{{ $row->category->name ?? '-' }}</td>
                                        <td>
                                            <a href="{{ route('add-barang.edit', $row->id) }}"
                                                class="btn btn-sm btn-warning me-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('add-barang.delete', $row->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if ($data->isEmpty())
                            <p class="text-center text-muted mt-3">Tidak ada data barang.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
