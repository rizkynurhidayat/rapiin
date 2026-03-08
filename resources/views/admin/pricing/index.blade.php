@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pricing /</span> Daftar Paket</h4>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Kelola Paket Pricing</h5>
            <small class="text-muted">Klik edit pada paket yang ingin diubah</small>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Icon</th>
                        <th>Nama Paket</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($pricings as $item)
                    <tr>
                        <td>
                            @if($item->icon)
                                <img src="{{ asset('storage/' . $item->icon) }}" width="30" class="rounded shadow-sm">
                            @else
                                <span class="badge bg-label-secondary">No Icon</span>
                            @endif
                        </td>
                        <td><strong>{{ $item->nama_paket }}</strong></td>
                        <td>{{ $item->harga_lengkap }}</td>
                        <td>
                            {{-- PERBAIKAN: Tambahkan 'admin.' di depan --}}
                            <a href="{{ route('admin.pricing.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="bx bx-edit-alt me-1"></i> Edit
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Data paket tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection