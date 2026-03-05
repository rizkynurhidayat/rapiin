@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Edit Footer</h5>
          <small class="text-muted float-end">Horizontal Layout</small>
        </div>
        <div class="card-body">
          <form action="{{ route('footer.update', $footer) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Twitter --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="twitter">Twitter</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="twitter" name="twitter" value="{{ $footer->twitter }}" placeholder="Input Twitter"/>
              </div>
            </div>

            {{-- Instagram --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="instagram">Instagram</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $footer->instagram }}" placeholder="Input Instagram"/>
              </div>
            </div>

            {{-- Facebook --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="facebook">Facebook</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $footer->facebook }}" placeholder="Input Facebook"/>
              </div>
            </div>

            {{-- TikTok --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="tiktok">TikTok</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="tiktok" name="tiktok" value="{{ $footer->tiktok }}" placeholder="Input TikTok"/>
              </div>
            </div>

            {{-- Kontak --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="kontak">Kontak</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="kontak" name="kontak" value="{{ $footer->kontak }}" placeholder="Input Kontak"/>
              </div>
            </div>

            {{-- Alamat --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="alamat" name="alamat" placeholder="Input Alamat">{{ $footer->alamat }}</textarea>
              </div>
            </div>

            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Update</button>
                <a class="btn btn-secondary" href="{{ route('footer.index') }}">Back</a>
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
  const image = document.querySelector('#logo');
  const imgPreview = document.querySelector('#img-preview');
  const card = document.querySelector('.img-preview');

  if(image.files && image.files[0]) {
    const reader = new FileReader();
    reader.onload = function(e) {
      imgPreview.src = e.target.result;
      card.style.display = 'block';
    }
    reader.readAsDataURL(image.files[0]);
  }
}
</script>
@endsection