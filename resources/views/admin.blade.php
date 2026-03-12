@extends('layouts.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">

        <!-- Welcome Admin -->
        <div class="col-12 mb-4">
            <div class="card">

                <div class="row align-items-end">

                    <div class="col-md-8">
                        <div class="card-body">

                            <h5 class="card-title text-primary">
                                Selamat Datang di Menu Admin! 🎉
                            </h5>

                            <p class="mb-4">
                                Ini adalah website admin untuk mengelola landing page <b>RAPIIN</b>.
                                Melalui dashboard ini admin dapat mengelola konten website seperti
                                hero, pricing, dan footer.
                            </p>

                        </div>
                    </div>

                    <div class="col-md-4 text-center">
                        <div class="card-body pb-0 px-0 px-md-4">

                            <img
                                src="{{ asset('sneat/assets/img/illustrations/man-with-laptop-light.png') }}"
                                height="150"
                                alt="Welcome Admin Illustration"
                                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png"
                            />

                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

</div>

@endsection