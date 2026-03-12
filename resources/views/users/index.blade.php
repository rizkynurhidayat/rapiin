@extends('layouts.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light"></span> Users Data
    </h4>

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Kelola Users</h5>
        </div>

        <div class="table-responsive text-nowrap">

            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody class="table-border-bottom-0">

                    @foreach ($users as $user)
                    <tr>

                        <td>
                            <strong>{{ $user->name }}</strong>
                        </td>

                        <td>
                            {{ $user->email }}
                        </td>

                        <td>
                            <span class="badge bg-label-primary">
                                Admin
                            </span>
                        </td>

                        <td>
                            <!-- Tombol Edit -->
                            <a href="{{ route('users.edit', $user) }}" 
                               class="btn btn-sm btn-primary me-1">
                                <i class="bx bx-edit-alt"></i> Edit
                            </a>

                            <!-- Tombol Delete -->
                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bx bx-trash"></i> Delete
                                </button>
                            </form>
                        </td>

                    </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection