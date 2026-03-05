@extends('layouts.app')

@section('content')

 <!-- Hoverable Table rows -->
            <div class="container-xxl flex-grow-1 container-p-y">
              @if (session('success'))
              <div class="alert alert-success alert-dismissible" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
              </div>
              @endif
            
              <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                 <h5 class="card-header">Opsi Data</h5>
                 <a class="btn btn-primary m-3" href="{{ route('opsi.create') }}">Add Opsi</a>
                </div>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Judul</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Button</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($opsis as $opsi)

                        <tr>
                          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $opsi->judul }}</strong></td>
                          <td>{{ $opsi->image }}</td>
                          <td>{{ $opsi->title }}</td>
                          <td>{{ $opsi->subtitle }}</td>
                          <td>{{ $opsi->button }}</td>
                          
                          <td>
                             @if(Storage::disk('public')->exists($opsi->image))
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card h-100">
                                <img class="card-img-top" src="{{ asset('storage/' . $opsi->image) }}" alt="Card image cap"/>
                                <div class="card-body">
                                <!-- <h5 class="card-title">Card title</h5>
                                <p class="card-text">
                                    Some quick example text to build on the card title and make up the bulk of the card's content.
                                </p> -->
                                <a href="javascript:void(0)" class="btn btn-outline-danger">Delete</a>
                             </div>
                        </div>
                    </div>
                    @else
                    <div class="form-text">Belum ada gambar</div>
                    @endif
                            {{-- <span class="badge bg-label-primary me-1">{{ $porto->image }}</span></td> --}}
                          <td>
                            <div class="dropdown">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('opsi.edit', $opsi)}} "
                                  ><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                  
                                  <form action="{{ route('opsi.destroy', $opsi) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item"  href="">
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
              <!--/ Hoverable Table rows -->
@endsection