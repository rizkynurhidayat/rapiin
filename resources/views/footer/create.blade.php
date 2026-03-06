@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add Footer Information</h5>
                    <small class="text-muted float-end">Dashboard / Footer / Create</small>
                </div>
                <div class="card-body">
                    {{-- Form Start --}}
                    <form action="{{ route('footer.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Input Sosial Media --}}
                        @foreach(['twitter', 'instagram', 'facebook', 'tiktok', 'kontak'] as $field)
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

                        <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-10">
        <textarea class="form-control mb-3" name="alamat" id="alamat" rows="3" placeholder="Input Alamat Lengkap"></textarea>
        
        <input type="hidden" name="latitude" id="latitude" value="-6.8947">
        <input type="hidden" name="longitude" id="longitude" value="109.1322">

        <div id="map" style="width: 100%; height: 400px; border-radius: 8px; border: 1px solid #ddd;"></div>
    </div>
</div>

                        {{-- Tombol Action --}}
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bx bx-send me-1"></i> Save Data
                                </button>
                                <a class="btn btn-outline-secondary" href="{{ route('footer.index') }}">Cancel</a>
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
<script>
    /**
     * 1. BOOTSTRAP LOADER (Membangun koneksi ke library Google Maps)
     *
     */
    (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
    ({
        key: "AIzaSyA6myHzS10YXdcazAFalmXvDkrYCp5cLc8", // API Key Anda
        v: "weekly" // Versi mingguan terbaru
    });

    /**
     * 2. INISIALISASI PETA (Menggambar peta ke elemen HTML)
     */
    async function initGoogleMap() {
        // Mengambil library Map dan Marker dari Google
        const { Map } = await google.maps.importLibrary("maps");
        const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

        // Ambil elemen input koordinat
        const latInput = document.getElementById('latitude');
        const lngInput = document.getElementById('longitude');
        
        // Tentukan posisi awal
        const startPosition = { 
            lat: parseFloat(latInput.value), 
            lng: parseFloat(lngInput.value) 
        };

        // Buat objek peta
        const map = new Map(document.getElementById("map"), {
            zoom: 15,
            center: startPosition,
            mapId: "DEMO_MAP_ID", // Ganti dengan Map ID Anda jika ingin fitur Vector penuh
        });

        // Tambahkan Penanda (Pin) yang bisa digeser
        const marker = new AdvancedMarkerElement({
            map: map,
            position: startPosition,
            gmpDraggable: true,
            title: "Geser ke lokasi Anda",
        });

        // Event: Saat marker selesai digeser, update angka di input hidden
        marker.addListener("dragend", () => {
            const pos = marker.position;
            latInput.value = pos.lat;
            lngInput.value = pos.lng;
        });

        // Event: Saat peta diklik, pindahkan marker ke lokasi klik tersebut
        map.addListener("click", (e) => {
            const newPos = e.latLng;
            marker.position = newPos; // Pindahkan pin
            latInput.value = newPos.lat().toFixed(8); // Update latitude
            lngInput.value = newPos.lng().toFixed(8); // Update longitude
        });
    }

    // Jalankan fungsi setelah seluruh elemen halaman dimuat
    document.addEventListener("DOMContentLoaded", initGoogleMap);
</script>
@endsection