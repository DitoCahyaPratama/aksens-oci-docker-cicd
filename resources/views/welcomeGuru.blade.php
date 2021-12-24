@extends('layouts.welcome')

@section('content')
    <!-- Content -->
    <div class="p-8 bg-white">
        <div class="text-center mb-8">
            <img class="img-fluid" src="{{asset('logo.png')}}"
                 alt="Image Description" style="width: 12rem;">
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center px-0 flex-column text-center">
        <div style="max-width: 20rem;" >
            <div class="mt-8">
                <h2 class="display-4 text-white">AKSENS</h2>
                <h4 class="text-white">Virtual Counseling Room</h4>
            </div>

            <div class="pt-4 pb-4 text-white">
                <span class="d-block font-weight-bold mb-1">Bermanfaat</span>
                Membantu guru untuk mencegah kemunduran kesehatan mental siswa
            </div>

            <div class="row">
                <div class="col-lg-6 mb-3">
                    <a href="/guru/login" type="submit" class="btn btn-md btn-block btn-yellow btn-pill">
                        {{ __('Masuk') }}
                    </a>
                </div>
                <div class="col-lg-6 mb-3">
                    <a href="/register" type="submit" class="btn btn-md btn-block btn-yellow btn-pill">
                        {{ __('Daftar') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

