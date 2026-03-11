@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Footer Data</h5>
            <a href="{{ route('footer.create') }}" class="btn btn-primary">Add Footer</a>
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
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
                <tbody>
                    @foreach($footers as $footer)
                        <tr>
                            <td>{{ $footer->facebook ?? '-' }}</td>
                            <td>{{ $footer->instagram ?? '-' }}</td>
                            <td>{{ $footer->twitter ?? '-' }}</td>
                            <td>{{ $footer->linkedin ?? '-' }}</td>
                            <td>{{ $footer->whatsapp ?? '-' }}</td>
                            <td>{{ $footer->tiktok ?? '-' }}</td>
                            <td>{{ $footer->email ?? '-' }}</td>
                            <td>{{ $footer->kontak ?? '-' }}</td>
                            <td>
                                <div style="max-width: 200px; white-space: normal;">
                                    {{ $footer->alamat ?? '-' }}
                                </div>
                                
                                <!-- Google Maps per row -->
                                <div id="map-{{ $footer->id }}" style="width: 100%; height: 200px; margin-top: 5px;"></div>

                                <a href="https://www.google.com/maps?q={{ $footer->latitude }},{{ $footer->longitude }}" 
                                   target="_blank" class="btn btn-sm btn-outline-danger mt-2">
                                    <i class="bx bx-map-pin"></i> Lihat Google Maps
                                </a>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('footer.edit', $footer) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('footer.destroy', $footer) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Library Google Maps -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    @foreach($footers as $footer)
        var map{{ $footer->id }} = new google.maps.Map(document.getElementById("map-{{ $footer->id }}"), {
            center: { 
                lat: {{ $footer->latitude ?? -6.203035 }}, 
                lng: {{ $footer->longitude ?? 106.846739 }} 
            },
            zoom: 15
        });

        var marker{{ $footer->id }} = new google.maps.Marker({
            position: { 
                lat: {{ $footer->latitude ?? -6.203035 }}, 
                lng: {{ $footer->longitude ?? 106.846739 }} 
            },
            map: map{{ $footer->id }},
            title: "{{ $footer->alamat }}"
        });
    @endforeach
});
</script>
@endsection