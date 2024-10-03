@extends('application.layouts.master')

@section('content')
<main class="main">

    <div class="container" style="margin-top: 200px;margin-bottom: 200px;">
        <div class="row">
            <div class="col-lg-10 col-12 text-center mx-auto">
                <i class="bi bi-bell-fill" style="font-size: 5rem"></i>
                <h2 class="mb-5">WEBSITE MASIH DALAM PROSES</h2>
            </div>
            <div class="col-lg-10 col-md-10 col-10 mb-4 mb-lg-0" style="padding-top: 15px">
                <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75"
                    aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" style="width: 50%">
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-2 col-2 mb-4 mb-lg-0">
                <div class="spinner-border text-secondary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection