@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Halaman /</span> Edit Hero Section</h4>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Form Hero Section (ID: {{ $hero->id }})</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Judul (Awal - Highlight - Akhir)</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" name="judul_awal" class="form-control" value="{{ old('judul_awal', $hero->judul_awal) }}">
                                    <input type="text" name="highlight_text" class="form-control" value="{{ old('highlight_text', $hero->highlight_text) }}" style="color: #007bff; font-weight: bold;">
                                    <input type="text" name="judul_akhir" class="form-control" value="{{ old('judul_akhir', $hero->judul_akhir) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Teks Tombol</label>
                            <div class="col-sm-10">
                                <input type="text" name="button" class="form-control" value="{{ old('button', $hero->button) }}">
                                {{-- <small class="text-muted">*Ini akan muncul sebagai teks di dalam tombol utama.</small> --}}
                            </div>
                        </div>

                        <input type="hidden" name="deskripsi" value="-">

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-10">
                                @if($hero->image)
                                    <img id="img-preview" src="{{ str_contains($hero->image, 'hero/') ? asset('storage/' . $hero->image) : asset($hero->image) }}" class="rounded mb-2" style="max-height: 150px;">
                                @endif
                                <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('#img-preview');
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection