@extends('layouts.app')

@section('content')

 <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Add Opsi</h5>
                      <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                      <form action="{{route('opsi.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <div class="col-md-6 col-lg-4 mb-3 img-preview">
                                <div class="card h-100">
                                <img class="card-img-top" src="" alt="Card image cap" />
                                <div class="card-body">
                                </div>
                             </div>
                        </div>
                            <input class="form-control" type="file" id="image" name="image" onChange="previewImage()"/>
                        </div>
                       </div>
                       <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="judul">Judul</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Input Opsi Title"/>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="teks_button">Teks Button</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="teks_button" name="teks_button" placeholder="Input Teks Button"/>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="title">Title</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Input Title"/>
                          </div>
                        </div>
                      <div class="row mb-3">
                         <label class="col-sm-2 col-form-label" for="isi">Isi</label>
                          <div class="col-sm-10">
                         <textarea class="form-control" id="isi" name="isi" placeholder="Input isi"></textarea>
                      </div>
                     </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Send</button>
                            <a class="btn btn-secondary" href="{{ route('opsi.index') }}">Back</a>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <script>
              const image = document.querySelector('#image');
              const imgPreview = document.querySelector('#img-preview');
              const card = document.querySelector('.img-preview');

              card.style.display = 'none';

              function previewImage() {

                if(image.files && image.files[0]) {
                  const reader = new FileReader();
                  reader.onload = function(e) {
                    imgPreview.src = e.target.result;
                    imgPreview.style.display = 'block';
                    card.style.display = 'block';
                  }
                  reader.readAsDataURL(image.files[0]);
                }
                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                  imgPreview.src = oFREvent.target.result;
                }
              }
            </script>

@endsection