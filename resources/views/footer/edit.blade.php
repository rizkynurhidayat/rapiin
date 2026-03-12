@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
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

                @foreach($fields as $name => $label)
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="{{ $name }}">{{ $label }}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error($name) is-invalid @enderror" 
                               id="{{ $name }}" name="{{ $name }}" 
                               placeholder="Input {{ $label }}" 
                               value="{{ old($name, $footer->$name ?? '') }}">
                        @error($name)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @endforeach

                {{-- Alamat & Peta --}}
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
                    <div class="col-sm-10">
                        <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                  name="alamat" id="alamat" rows="3" placeholder="Input Alamat Lengkap">{{ old('alamat', $footer->alamat ?? '') }}</textarea>

                        {{-- Pastikan lat/lng numerik --}}
                        @php
                            $lat = is_numeric(old('latitude', $footer->latitude ?? null)) ? old('latitude', $footer->latitude) : -6.976366;
                            $lng = is_numeric(old('longitude', $footer->longitude ?? null)) ? old('longitude', $footer->longitude) : 109.120838;
                        @endphp
                           <input type="hidden" name="latitude" id="latitude" value="{{ $lat }}">
                           <input type="hidden" name="longitude" id="longitude" value="{{ $lng }}">

                           <div id="map" style="width: 100%; height: 400px; border-radius: 8px;"></div>
                           <small class="text-muted mt-2 d-block">
                            Klik peta atau geser marker untuk menentukan lokasi presisi.
                        </small>
                    </div>
                </div>

                <div class="row justify-content-end mt-4">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">
                            <i class="bx bx-send me-1"></i> Simpan
                        </button>
                        <a class="btn btn-outline-secondary" href="{{ route('footer.index') }}">Batal</a>
                    </div>
                </div>
            </form>
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

    // pastikan nilai numerik
    let lat = parseFloat(latInput.value) || -6.976366;
    let lng = parseFloat(lngInput.value) || 109.120838;

    // buat map
    const map = L.map('map').setView([lat, lng], 17);

    // layer OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // marker draggable
    const marker = L.marker([lat, lng], {draggable: true}).addTo(map);

    // update input saat marker digeser
    marker.on('dragend', () => {
        const pos = marker.getLatLng();
        latInput.value = pos.lat.toFixed(8);
        lngInput.value = pos.lng.toFixed(8);
    });

    // klik peta untuk pindahkan marker
    map.on('click', (e) => {
        marker.setLatLng(e.latlng);
        latInput.value = e.latlng.lat.toFixed(8);
        lngInput.value = e.latlng.lng.toFixed(8);
    });
});
</script>
@endsection