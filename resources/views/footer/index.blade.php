@extends('layouts.app')

@section('content')

<style>
.box-link{
    width:90px;
    min-height:120px;
    border:1px solid #ddd;
    border-radius:8px;
    padding:6px;
    font-size:12px;
    background:#f9f9f9;
    word-break:break-word;
}
</style>

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light"></span> Footer Data
    </h4>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Kelola Footer </h5>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th>Facebook</th>
                        <th>Instagram</th>
                        <th>Twitter</th>
                        <th>LinkedIn</th>
                        <th>WhatsApp</th>
                        <th>TikTok</th>
                        <th>Email</th>
                        <th>Kontak</th>
                        <th>Alamat</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody class="table-border-bottom-0">

                    @forelse($footers as $footer)

                        <tr>

                            <td>
                                <div class="box-link">
                                    {{ Str::limit($footer->facebook, 50) }}
                                </div>
                            </td>

                            <td>
                                <div class="box-link">
                                    {{ Str::limit($footer->instagram, 50) }}
                                </div>
                            </td>

                            <td>
                                <div class="box-link">
                                    {{ Str::limit($footer->twitter, 50) }}
                                </div>
                            </td>

                            <td>
                                <div class="box-link">
                                    {{ Str::limit($footer->linkedin, 50) }}
                                </div>
                            </td>

                            <td>
                                <div class="box-link">
                                    {{ Str::limit($footer->whatsapp, 50) }}
                                </div>
                            </td>

                            <td>
                                <div class="box-link">
                                    {{ Str::limit($footer->tiktok, 50) }}
                                </div>
                            </td>

                            <td>
                                <div class="box-link">
                                    {{ $footer->email }}
                                </div>
                            </td>

                            <td>
                                <div class="box-link">
                                    {{ $footer->kontak }}
                                </div>
                            </td>

                            <td>
                                <div class="box-link">
                                    {{ Str::limit($footer->alamat, 60) }}
                                </div>
                            </td>

                            <td>

                                <a href="{{ route('footer.edit', $footer) }}"
                                   class="btn btn-sm btn-primary">
                                    <i class="bx bx-edit-alt"></i> Edit
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="10" class="text-center">
                                Data footer tidak ditemukan
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>
        </div>

    </div>

</div>

@endsection