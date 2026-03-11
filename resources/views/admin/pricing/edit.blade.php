@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Pricing /</span> Edit Paket {{ strtoupper($pricing->nama_paket) }}
    </h4>

    {{-- PERBAIKAN: Tambahkan 'admin.' di depan rute update --}}
    <form action="{{ route('admin.pricing.update', $pricing->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- BAGIAN 1: HEADER SECTION (Hanya untuk Paket ID 1) --}}
        @if($pricing->id == 1)
        <div class="card mb-4 border-primary">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0 text-white">Pengaturan Judul Utama (Section Header)</h5>
            </div>
            <div class="card-body mt-3">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Judul Awal</label>
                        <input type="text" name="section_judul_awal" class="form-control" value="{{ $pricing->section_judul_awal }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Highlight (Turun ke Bawah)</label>
                        <input type="text" name="section_highlight_text" class="form-control" value="{{ $pricing->section_highlight_text }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Judul Akhir</label>
                        <input type="text" name="section_judul_akhir" class="form-control" value="{{ $pricing->section_judul_akhir }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Sub Judul</label>
                    <textarea name="section_sub_judul" class="form-control" rows="2">{{ $pricing->section_sub_judul }}</textarea>
                </div>
            </div>
        </div>
        @endif

        {{-- BAGIAN 2: DETAIL KARTU PAKET --}}
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Detail Kartu Paket</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Paket</label>
                        <input type="text" name="nama_paket" class="form-control" value="{{ $pricing->nama_paket }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
        <label class="form-label font-weight-bold">Upload Icon (Gambar)</label>
        <input type="file" name="icon" class="form-control" accept="image/*">
        
        @if($pricing->icon)
            <div class="mt-3 d-flex align-items-center p-2 border rounded bg-light">
                <div class="text-center me-3">
                    <img src="{{ asset('storage/' . $pricing->icon) }}" width="45" class="rounded shadow-sm bg-white p-1">
                    <p class="mb-0 mt-1 small text-muted">Icon Saat Ini</p>
                </div>
                <div class="form-check">
                    <input class="form-check-input border-danger" type="checkbox" name="remove_icon" id="remove_icon" value="1">
                    <label class="form-check-label text-danger fw-bold" for="remove_icon">
                        <i class="bx bx-trash"></i> Hapus Icon Ini
                    </label>
                </div>
            </div>
        @endif
        <small class="text-muted">Format: PNG, JPG (Max 1MB). Biarkan kosong jika tidak ingin mengubah icon.</small>
    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi Singkat</label>
                    <textarea name="deskripsi" class="form-control" rows="2" required>{{ $pricing->deskripsi }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Harga Lengkap</label>
                        <input type="text" name="harga_lengkap" class="form-control" value="{{ $pricing->harga_lengkap }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Teks Tombol</label>
                        <input type="text" name="teks_button" class="form-control" value="{{ $pricing->teks_button }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Benefit / Fitur (Pisahkan dengan koma)</label>
                    <textarea name="fitur" class="form-control" rows="3" required>{{ $pricing->fitur }}</textarea>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                    {{-- PERBAIKAN: Tambahkan 'admin.' di depan --}}
                    <a href="{{ route('admin.pricing.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection