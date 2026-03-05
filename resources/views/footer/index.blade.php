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
      <h5>Footer Data</h5>
      <a href="{{ route('footer.create') }}" class="btn btn-primary">Add Footer</a>
    </div>

    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Twitter</th>
            <th>Instagram</th>
            <th>TikTok</th>
            <th>Nomor</th>
            <th>Alamat</th>
          </tr>
        </thead>
        <tbody>
          @foreach($footers as $footer)
            <tr>
              <td>{{ $footer->twitter }}</td>
              <td>{{ $footer->instagram }}</td>
              <td>{{ $footer->tiktok }}</td>
              <td>{{ $footer->phone }}</td>
              <td>{{ $footer->alamat }}</td>
              <td>
                @if(Storage::disk('public')->exists($footer->logo))
                  <img src="{{ asset('storage/' . $footer->logo) }}" width="80">
                @else
                  <span class="text-muted">No Logo</span>
                @endif
              </td>
              <td>
                <div class="dropdown">
                  <button class="btn p-0 dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('footer.edit', $footer) }}">
                      <i class="bx bx-edit-alt me-1"></i> Edit
                    </a>
                    <form action="{{ route('footer.destroy', $footer) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="dropdown-item">
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
@endsection