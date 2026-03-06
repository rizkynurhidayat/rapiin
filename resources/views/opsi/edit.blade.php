@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Edit Footer</h5>
          <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
          <form action="{{ route('footer.update', $footer) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Social Media --}}
            @foreach(['twitter','instagram','facebook','tiktok','kontak'] as $field)
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="{{ $field }}">{{ ucfirst($field) }}</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="{{ $field }}" name="{{ $field }}" value="{{ $footer->$field }}">
              </div>
            </div>
            @endforeach

            {{-- Map --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Pilih Lokasi di Map</label>
              <div class="col-sm-10">
                <input type="hidden" id="latitude" name="latitude" value="{{ $footer->latitude }}">
                <input type="hidden" id="longitude" name="longitude" value="{{ $footer->longitude }}">
                <div id="map" style="height:400px;width:100%;border:1px solid #ccc;"></div>
              </div>
            </div>

            {{-- Submit --}}
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
@endsection

@section('footer')
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
<script>
function initMap() {
    const lat = {{ $footer->latitude ?? -6.8947 }};
    const lng = {{ $footer->longitude ?? 109.1322 }};

    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 13,
        center: { lat: lat, lng: lng }
    });

    const marker = new google.maps.Marker({
        position: { lat: lat, lng: lng },
        map: map,
        draggable: true
    });

    marker.addListener('dragend', function(e) {
        document.getElementById('latitude').value = e.latLng.lat();
        document.getElementById('longitude').value = e.latLng.lng();
    });

    map.addListener('click', function(e) {
        marker.setPosition(e.latLng);
        document.getElementById('latitude').value = e.latLng.lat();
        document.getElementById('longitude').value = e.latLng.lng();
    });
}
</script>
@endsection