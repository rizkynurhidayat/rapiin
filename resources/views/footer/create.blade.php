@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambah Footer & Lokasi</h5>
                    <small class="text-muted float-end">Data RAPIIN POS</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('footer.store') }}" method="POST">
                        @csrf

                        {{-- Social Media & Kontak sesuai urutan --}}
                        @foreach(['facebook', 'instagram', 'twitter', 'linkedin', 'whatsapp', 'tiktok', 'email', 'kontak'] as $field)
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="{{ $field }}">{{ ucfirst($field) }}</label>
                            <div class="col-sm-10">
                                <input type="text" 
                                       class="form-control @error($field) is-invalid @enderror" 
                                       id="{{ $field }}" 
                                       name="{{ $field }}" 
                                       placeholder="Input {{ ucfirst($field) }}"
                                       value="{{ old($field) }}"/>
                                @error($field)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @endforeach

                        {{-- Alamat & Peta --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control mb-3 @error('alamat') is-invalid @enderror" 
                                          name="alamat" id="alamat" rows="3" 
                                          placeholder="Input Alamat Lengkap">{{ old('alamat', 'Palm Asri 2 Blk. G No.16, Pedagangan, Kec. Dukuhwaru, Kab. Tegal, Jawa Tengah, 52451 Indonesia') }}</textarea>
{{-- 
                                <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude', '-6.976366') }}">
                                <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude', '109.120838') }}">

                                <div id="map" style="width: 100%; height: 400px; border-radius: 8px; border: 1px solid #ddd;"></div>
                            </div> --}}
                        </div>

                        <div class="row justify-content-end mt-4">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-send me-1"></i> Simpan Data
                                </button>
                                <a class="btn btn-outline-secondary" href="{{ route('footer.index') }}">Batal</a>
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
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const latInput = document.getElementById('latitude');
    const lngInput = document.getElementById('longitude');

    let lat = parseFloat(latInput.value);
    let lng = parseFloat(lngInput.value);

    const map = L.map('map').setView([lat, lng], 17);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '&copy; OpenStreetMap contributors' }).addTo(map);

    const marker = L.marker([lat, lng], {draggable: true}).addTo(map);

    marker.on('dragend', function(e) {
        const pos = marker.getLatLng();
        latInput.value = pos.lat.toFixed(8);
        lngInput.value = pos.lng.toFixed(8);
    });

    map.on('click', function(e) {
        marker.setLatLng(e.latlng);
        latInput.value = e.latlng.lat.toFixed(8);
        lngInput.value = e.latlng.lng.toFixed(8);
    });
});
</script>
@endsection