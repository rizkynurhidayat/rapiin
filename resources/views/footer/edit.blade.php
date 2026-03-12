@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">{{ isset($footer) ? 'Edit Footer' : 'Tambah Footer' }}</h5>
        </div>

        <div class="card-body">
            <form action="{{ isset($footer) ? route('footer.update', $footer) : route('footer.store') }}" method="POST">
                @csrf
                @if(isset($footer)) @method('PUT') @endif

                @php
                    $fields = [
                        'facebook' => 'Facebook',
                        'instagram' => 'Instagram',
                        'twitter' => 'Twitter',
                        'linkedin' => 'LinkedIn',
                        'whatsapp' => 'WhatsApp',
                        'tiktok' => 'TikTok',
                        'email' => 'Email',
                        'kontak' => 'Kontak',
                    ];
                @endphp

                {{-- SOCIAL MEDIA --}}
                <div class="card mb-4 border">
                    <div class="card-header">
                        <h6 class="mb-0">Social Media & Kontak</h6>
                    </div>

                    <div class="card-body">
                        @foreach($fields as $name => $label)
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="{{ $name }}">{{ $label }}</label>

                            <div class="col-sm-10">
                                <input type="text"
                                    class="form-control @error($name) is-invalid @enderror"
                                    id="{{ $name }}"
                                    name="{{ $name }}"
                                    placeholder="Input {{ $label }}"
                                    value="{{ old($name, $footer->$name ?? '') }}">

                                @error($name)
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- ALAMAT --}}
                <div class="card mb-4 border">
                    <div class="card-header">
                        <h6 class="mb-0">Alamat Perusahaan</h6>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>

                            <div class="col-sm-10">
                                <textarea
                                    class="form-control @error('alamat') is-invalid @enderror"
                                    name="alamat"
                                    id="alamat"
                                    rows="3"
                                    placeholder="Input Alamat Lengkap">{{ old('alamat', $footer->alamat ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- BUTTON --}}
                <div class="row justify-content-end mt-4">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">
                            <i class="bx bx-send me-1"></i> Send
                        </button>

                        <a class="btn btn-outline-secondary" href="{{ route('footer.index') }}">
                            Back
                        </a>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection