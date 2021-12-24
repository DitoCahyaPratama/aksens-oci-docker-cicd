@extends('layouts.auth')

@section('content')
    <!-- Content -->
    <div class="container-fluid px-3">
        <div class="row">
            <!-- Cover -->
            <div
                class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center min-vh-lg-100 position-relative bg-blue px-0">
                <!-- Logo & Language -->
                <div class="position-absolute top-0 left-0 right-0 mt-3 mx-3">
                    <div class="d-none d-lg-flex justify-content-between">
                        <a href="/gr">
                            <h4 style="min-width: 7rem; max-width: 7rem;" class="text-white">Kembali</h4>
                        </a>
                    </div>
                </div>
                <!-- End Logo & Language -->

                <div style="max-width: 23rem;">
                    <div class="text-center mb-5">
                        <img class="img-fluid" src="{{asset('logo.png')}}"
                             alt="Image Description" style="width: 12rem;">
                    </div>

                    <div class="mb-5">
                        <h2 class="display-4 text-white">AKSENS</h2>
                        <h5 class="text-white">Virtual Counseling Room</h5>
                    </div>

                    <div class="pt-4 pb-4 text-white">
                        <span class="d-block font-weight-bold mb-1">Bermanfaat</span>
                        Membantu guru untuk mencegah kemunduran kesehatan mental siswa
                    </div>
                </div>
            </div>
            <!-- End Cover -->

            <div class="col-lg-6 d-flex justify-content-center align-items-center min-vh-lg-100">
                <div class="w-100 pt-10 pt-lg-7 pb-7" style="max-width: 25rem;">
                    <!-- Form -->
                    <form class="js-validate" method="POST" action="{{ route('login.guru') }}">
                        @csrf
                        <div class="text-center mb-5">
                            <h1 class="display-4">Masuk</h1>
                            <p>Belum memiliki akun ? <a href="/register">Daftar Disini</a></p>
                            <span class="divider">
                                <img src="{{asset('logo-cycle.png')}}" width="50px" />
                            </span>
                            <h5>Aksens</h5>
                        </div>

                        <div class="js-form-message form-group">
                            <label for="nik" class="input-label">{{ __('NIK') }}</label>

                            <input id="nik" type="text"
                                   class="form-control form-control-lg @error('nik') is-invalid @enderror"
                                   name="nik" value="{{ old('nik') }}" required autocomplete="nik"
                                   autofocus>

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="js-form-message form-group">
                            <label for="password" class="input-label">{{ __('Password') }}</label>

                            <div class="input-group input-group-merge">
                                <input id="password" type="password"
                                       class="js-toggle-password form-control form-control-lg @error('password') is-invalid @enderror"
                                       name="password"
                                       required autocomplete="current-password"
                                       data-hs-toggle-password-options='{
                                     "target": "#changePassTarget",
                                     "defaultClass": "tio-hidden-outlined",
                                     "showClass": "tio-visible-outlined",
                                     "classChangeTarget": "#changePassIcon"
                                   }'>
                                <div id="changePassTarget" class="input-group-append">
                                    <a class="input-group-text" href="javascript:;">
                                        <i id="changePassIcon" class="tio-visible-outlined"></i>
                                    </a>
                                </div>

                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="custom-control-label text-muted" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-lg btn-block btn-primary">
                            {{ __('Login') }}
                        </button>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- End Content -->
@endsection

@push('jsCode')
    <script>
        // INITIALIZATION OF FORM VALIDATION
        // =======================================================
        $('.js-validate').each(function() {
            $.HSCore.components.HSValidation.init($(this));
        });
    </script>
@endpush
