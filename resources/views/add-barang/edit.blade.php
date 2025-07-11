@extends('main')

@section('title', 'Media Galeri Edit')

@section('content')
    <div class="mb-4">
        <h1 class="h3 mb-0 text-gray-800">Media Galeri Edit</h1>
        <div class="row mb-3 mt-4">

            <div class="col-xl-12 col-lg-12 mb-4">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Media Galeri - Edit</h6>
                        <a class="m-0 float-right btn btn-warning btn-sm" href="{{ url('media-galeri') }}">Back
                            <i class="fas fa-undo"></i></a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('media-galeri.update', $megari->id) }}" method="POST" id="form-edit"
                            enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal"
                                    value="{{ $megari->tanggal ? \Carbon\Carbon::parse($megari->tanggal)->format('Y-m-d') : '' }}">
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{ $megari->title }}">
                            </div>
                            @if ($megari->foto)
                                <div class="mb-3">
                                    <img style="max-width:100px; max-height:100px"
                                        src="{{ url('images') . '/' . $megari->foto }}" alt="Foto" />
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" class="form-control" name="foto" id="foto">
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea type="text" class="form-control" rows="4" id="content" name="content">{{ $megari->content }}</textarea>
                            </div>
                            @php
                                $opsiBidang = [
                                    'pelayanan' => 'Pelayanan Publik',
                                    'profile' => 'Profile Dinas',
                                    'informasi' => 'Informasi Perikanan',
                                    'videogaleri' => 'Video Galeri',
                                    'inhum' => 'Informasi Hukum',
                                ];

                                $userRole = Auth::user()->role;
                            @endphp

                            <div class="form-group">
                                <label for="bidang">Bidang</label>

                                {{-- Admin bebas memilih --}}
                                @if ($userRole === 'admin')
                                    <select class="form-control" name="bidang" id="bidang">
                                        <option value="">-- Pilih Bidang --</option>
                                        @foreach ($opsiBidang as $val => $label)
                                            <option value="{{ $val }}"
                                                {{ $megari->bidang == $val ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>

                                    {{-- User biasa: tampilkan 1 opsi dan kunci --}}
                                @else
                                    <input type="hidden" name="bidang" value="{{ $userRole }}">
                                    <select class="form-control" disabled>
                                        <option value="{{ $userRole }}">
                                            {{ $opsiBidang[$userRole] ?? ucfirst($userRole) }}
                                        </option>
                                    </select>
                                @endif
                            </div>

                        </form>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit" form="form-edit">
                            Submit <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
