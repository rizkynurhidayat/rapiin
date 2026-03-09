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
                    {{-- Form Start --}}
                    <form action="{{ route('footer.store') }}" method="POST">
                        @csrf

                        {{-- Input Sosial Media & Kontak --}}
                        @foreach(['twitter', 'instagram', 'facebook', 'tiktok', 'email', 'kontak'] as $field)
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

                        {{-- Bagian Alamat dengan Integrasi Peta --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
                            <div class="col-sm-10">
                                {{-- Textarea Alamat dengan default Palm Asri 2 --}}
                                <textarea class="form-control mb-3 @error('alamat') is-invalid @enderror" 
                                          name="alamat" id="alamat" rows="3" 
                                          placeholder="Input Alamat Lengkap">{{ old('alamat', 'Palm Asri 2 Blk. G No.16, Pedagangan, Kec. Dukuhwaru, Kab. Tegal, Jawa Tengah, 52451 Indonesia') }}</textarea>
                                
                                {{-- Input Hidden untuk Latitude & Longitude Tegal --}}
                                <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude', '-6.976366') }}">
                                <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude', '109.120838') }}">
                                
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <label class="form-label text-primary mb-0">
                                        <i class="bx bx-map"></i> Geser Pin untuk Menentukan Lokasi Presisi
                                    </label>
                                    {{-- Tombol Lihat di Google Maps --}}
                                    <a href="https://www.google.com/maps?q=-6.976366,109.120838" 
                                       target="_blank" 
                                       class="btn btn-sm btn-outline-danger">
                                        <i class="bx bx-map-pin"></i> Lihat di Google Maps
                                    </a>
                                </div>

                                <div id="map" style="width: 100%; height: 400px; border-radius: 8px; border: 1px solid #ddd;"></div>
                            </div>
                        </div>

                        {{-- Tombol Simpan --}}
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
{{-- Load Leaflet JS & CSS (Lebih ringan dan gratis) --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const latInput = document.getElementById('latitude');
        const lngInput = document.getElementById('longitude');
        
        // Koordinat awal (Palm Asri 2, Tegal)
        let lat = parseFloat(latInput.value);
        let lng = parseFloat(lngInput.value);

        // Inisialisasi Peta
        const map = L.map('map').setView([lat, lng], 17);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Tambahkan Marker yang bisa digeser
        const marker = L.marker([lat, lng], {draggable: true}).addTo(map);

        // Update input saat marker digeser
        marker.on('dragend', function(e) {
            const position = marker.getLatLng();
            latInput.value = position.lat.toFixed(8);
            lngInput.value = position.lng.toFixed(8);
        });

        // Update pin saat peta diklik
        map.on('click', function(e) {
            marker.setLatLng(e.latlng);
            latInput.value = e.latlng.lat.toFixed(8);
            lngInput.value = e.latlng.lng.toFixed(8);
        });
    });
</script>
@endsection