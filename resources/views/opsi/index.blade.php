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
      <h5>Opsi Data</h5>
      <a href="{{ route('opsi.create') }}" class="btn btn-primary">Add Opsi</a>
    </div>

    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Image</th>
            <th>Judul</th>
            <th>Teks Button</th>
            <th>Title</th>
            <th>Isi</th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
          @foreach($opsi as $op)
          <tr>
            <td>
                  @if(Storage::disk('public')->exists($op->image))
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card h-100">
                          <img class="card-img-top" src="{{ asset('storage/' . $op->image) }}" alt="Card image cap"/>
                          <div class="card-body">
                           <a href="javascript:void(0)" class="btn btn-outline-danger">Delete</a>
                          </div>
                        </div>
                    </div>
                    @else
                    <div class="form-text">Belum ada gambar</div>
                    @endif
            </td>
            <td>{{ $op->judul }}</td>
            <td>{{ $op->teks_button }}</td>
            <td>{{ $op->title }}</td>
            <td>{{ $op->isi }}</td>

            <td>
              <div class="dropdown">
                <button class="btn p-0 dropdown-toggle" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>

                <div class="dropdown-menu">

                  <a class="dropdown-item" href="{{ route('opsi.edit', $op) }}">
                    <i class="bx bx-edit-alt me-1"></i> Edit
                  </a>

                  <form action="{{ route('opsi.destroy', $op) }}" method="POST">
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