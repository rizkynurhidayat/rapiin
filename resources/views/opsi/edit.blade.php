@extends('layouts.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Opsi</h5>
                    <small class="text-muted float-end">Horizontal Layout</small>
                </div>
                <div class="card-body">
                    <div class="card-body">
                      <form action="{{route('opsi.update', $opsi)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Row Title --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="judul">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="judul" name="judul" 
                                    value="{{$opsi->judul}}" placeholder="Input Opsi Judul" />
                                @error('judul') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        {{-- Row Image  --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="image">Opsi Image</label>
                            <div class="col-sm-10">
                                @if($opsi->image && Storage::disk('public')->exists($opsi->image))
                      
                              <div class="col-md-6 col-lg-4 mb-3">
                                 <div class="card h-100">
                                     <img class="card-img-top" id="img-preview" src="{{ asset('storage/' . $opsi->image) }}" alt="Card image cap" />
                                     <div class="card-body">
                                      {{-- <h5 class="card-title">Card title</h5> }}
                                      {{-- <p class="card-text">
                                        Some quick example text to build on the card title and make up the bulk of the card's content.
                                      </p> --}}
                                     {{-- <a href="javascript:void(0)" class="btn btn-outline-danger">Delete</a> --}}
                                  </div>
                                  </div>
                                   @else
                                   <img id="img-preview" style="display:none; max-width:200px; margin-bottom:10px;">
                             @endif
                        <input class="form-control" type="file" id="image" name="image"  onChange="previewImage()"/>
                      </div>
                      {{-- Row Title --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="title">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" 
                                    value="{{$opsi->title}}" placeholder="Input Title" />
                                @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        {{-- Row Subtitle --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="subtitle">Subtitle</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="subtitle" name="subtitle" 
                                    value="{{$opsi->subtitle}}" placeholder="Input Subtitle" />
                                @error('subtitle') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        {{-- Row Button --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="button">Button</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="button" name="button" 
                                    value="{{$opsi->button}}" placeholder="Input Button" />
                                @error('button') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="justify-content-end">
                          <div class="col-sm-10 col-form-label">
                            <button type="submit" class="btn btn-primary">Send</button>
                            <a class="btn btn-secondary" href="{{ route('opsi.index') }}">Back</a>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <script>
                    function previewImage {
                        const image = document.querySelector('#image');
                        const imgPreview = document.getElementById('#img-preview');

                        if (image.files && image.files[0]) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                imgPreview.src = e.target.result;
                                imgPreview.style.display = 'block';
                            }
                            reader.readAsDataURL(image.files[0]);
                        }
                        imgPreview.style.display = 'block';

                        const of Reader = new FileReader();
                        ofReader.readAsDataURL(image.files[0]);

                        ofReader.onload = function(oFREvent) {
                            imgPreview.src = oFREvent.target.result;
                        }

                    }
                    </script>
 @endsection