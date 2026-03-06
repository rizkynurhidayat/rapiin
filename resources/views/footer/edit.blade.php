@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Footer</h5>
                    <small class="text-muted float-end">Update Footer Information</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('footer.update', $footer) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Input Sosial Media Otomatis --}}
                        @php
                            $fields = [
                                'twitter' => 'Twitter',
                                'instagram' => 'Instagram',
                                'facebook' => 'Facebook',
                                'tiktok' => 'TikTok',
                                'kontak' => 'Kontak'
                            ];
                        @endphp

                        @foreach($fields as $name => $label)
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="{{ $name }}">{{ $label }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $footer->$name) }}" placeholder="Input {{ $label }}">
                            </div>
                        </div>
                        @endforeach

                        {{-- Alamat & Peta --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control mb-3" name="alamat" id="alamat" rows="3" placeholder="Input Alamat Lengkap">{{ old('alamat', $footer->alamat) }}</textarea>
                                
                                {{-- Hidden Inputs - Sangat Penting: Beri nilai default jika database kosong --}}
                                <input type="hidden" name="latitude" id="latitude" value="{{ $footer->latitude ?? -6.20000000 }}">
                                <input type="hidden" name="longitude" id="longitude" value="{{ $footer->longitude ?? 106.81666600 }}">

                                {{-- Container Peta dengan Border agar terlihat areanya --}}
                                <div id="map-picker" style="height: 400px; width: 100%; border-radius: 8px; border: 1px solid #696cff; background-color: #f5f5f9; z-index: 1;"></div>
                                <small class="text-muted mt-2 d-block">
                                    <i class="bx bx-info-circle"></i> Klik pada peta atau geser marker untuk menentukan lokasi baru.
                                </small>
                            </div>
                        </div>

                        <div class="row justify-content-end mt-4">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary me-2">
                                    <i class="bx bx-save"></i> Simpan Perubahan
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
{{-- Library Leaflet wajib ada di sini --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const latInput = document.getElementById('latitude');
        const lngInput = document.getElementById('longitude');
        
        // Ambil nilai koordinat, jika NaN/Kosong gunakan koordinat Jakarta sebagai cadangan
        let lat = parseFloat(latInput.value);
        let lng = parseFloat(lngInput.value);
        
        if (isNaN(lat) || isNaN(lng)) {
            lat = -6.2000;
            lng = 106.8166;
        }

        // 1. Inisialisasi Peta
        const map = L.map('map-picker').setView([lat, lng], 16);

        // 2. Layer Google Maps (Roadmap)
        L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
            attribution: '© Google Maps'
        }).addTo(map);

        // 3. Tambahkan Marker yang bisa digeser
        let marker = L.marker([lat, lng], {
            draggable: true
        }).addTo(map);

        // Fungsi sinkronisasi koordinat ke input hidden
        function updateInputs(newLat, newLng) {
            latInput.value = newLat.toFixed(8);
            lngInput.value = newLng.toFixed(8);
        }

        // Event: Saat marker dilepas setelah digeser
        marker.on('dragend', function() {
            const position = marker.getLatLng();
            updateInputs(position.lat, position.lng);
        });

        // Event: Saat peta diklik, marker berpindah tempat
        map.on('click', function(e) {
            const clickLat = e.latlng.lat;
            const clickLng = e.latlng.lng;
            marker.setLatLng([clickLat, clickLng]);
            updateInputs(clickLat, clickLng);
        });

        // PENTING: Fix peta abu-abu dengan paksa refresh ukuran
        setTimeout(() => {
            map.invalidateSize();
        }, 600);
    });
</script>
@endsection