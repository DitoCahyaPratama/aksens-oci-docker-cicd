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

            <div class="col-lg-6 d-flex justify-content-center align-items-center min-vh-lg-100 scroll">
                <div class="w-100 pt-10 pt-lg-7 pb-7" style="max-width: 25rem;">
                    <!-- Form -->
                    <form class="js-validate" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="text-center mb-5">
                            <h1 class="display-4">Daftar</h1>
                            <p>Sudah memiliki akun ? <a href="/login">Login Disini</a></p>
                            <span class="divider"></span> <br/>
                            <p>Pilih Profil</p>
                            <input type="hidden" name="role" value="guru"/>
                            <div class="d-flex justify-content-around align-items-center">
                                <label class="image-radio">
                                    <img src="{{asset('foto_profil1.png')}}" width="80px">
                                    <input type="radio" name="foto" value="foto_profil1.png" checked/>
                                </label>
                                <label class="image-radio">
                                    <img src="{{asset('foto_profil2.png')}}" width="80px">
                                    <input type="radio" name="foto" value="foto_profil2.png"/>
                                </label>
                                <label class="image-radio">
                                    <img src="{{asset('foto_profil3.png')}}" width="80px">
                                    <input type="radio" name="foto" value="foto_profil3.png"/>
                                </label>
                            </div>
                            @error('foto')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="js-form-message form-group">
                            <label for="username" class="input-label">{{ __('Username') }}</label>

                            <input id="username" type="text"
                                   data-msg="Masukkan username untuk login"
                                   class="form-control form-control-lg @error('username') is-invalid @enderror"
                                   name="username" value="{{ old('username') }}" required autocomplete="username"
                                   autofocus>

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="js-form-message form-group">
                            <label for="name" class="input-label">{{ __('Nama') }}</label>

                            <input id="name" type="text"
                                   data-msg="Masukkan nama anda"
                                   class="form-control form-control-lg @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" required autocomplete="name"
                                   autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="js-form-message form-group">
                            <label for="nik" class="input-label">{{ __('NIK') }}</label>

                            <input id="nik" type="text"
                                   data-msg="Masukkan NIK anda"
                                   class="form-control form-control-lg @error('nik') is-invalid @enderror"
                                   name="nik" value="{{ old('nik') }}" required autocomplete="nik"
                                   autofocus>

                            @error('nik')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="js-form-message form-group">
                            <label for="email" class="input-label">{{ __('Email') }}</label>

                            <input id="email" type="email"
                                   data-msg="Isikan E-mail dengan benar"
                                   class="form-control form-control-lg @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email"
                                   autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="js-form-message form-group">
                            <label for="tempat_lahir" class="input-label">{{ __('Tempat Lahir') }}</label>

                            <input id="tempat_lahir" type="text"
                                   data-msg="Masukkan tempat lahir anda"
                                   class="form-control form-control-lg @error('tempat_lahir') is-invalid @enderror"
                                   name="tempat_lahir" value="{{ old('tempat_lahir') }}" required
                                   autocomplete="tempat_lahir"
                                   autofocus>

                            @error('tempat_lahir')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="js-form-message form-group">
                            <label for="tanggal_lahir" class="input-label">{{ __('Tanggal Lahir') }}</label>

                            <input id="tanggal_lahir" type="date"
                                   data-msg="Masukkan tanggal lahir anda"
                                   class="form-control form-control-lg @error('tanggal_lahir') is-invalid @enderror"
                                   name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                                   autocomplete="tanggal_lahir"
                                   autofocus>

                            @error('tanggal_lahir')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="col-form-label input-label">Jenis Kelamin</label>

                            <div class="">
                                <div class="input-group input-group-sm-down-break">
                                    <!-- Custom Radio -->
                                    <div class="form-control">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input"
                                                   name="jenis_kelamin" id="jenis_kelamin1" value="laki-laki">
                                            <label class="custom-control-label"
                                                   for="jenis_kelamin1">Laki-laki</label>
                                        </div>
                                    </div>
                                    <!-- End Custom Radio -->

                                    <!-- Custom Radio -->
                                    <div class="form-control">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input"
                                                   name="jenis_kelamin" id="jenis_kelamin2" value="perempuan">
                                            <label class="custom-control-label"
                                                   for="jenis_kelamin2">Perempuan</label>
                                        </div>
                                    </div>
                                    <!-- End Custom Radio -->
                                </div>
                            </div>

                            @error('jenis_kelamin')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="no_hp" class="col-form-label input-label">Nomor Telepon <span
                                    class="input-label-secondary">(Yang bisa dihubungi)</span> </label>

                            <div class="">
                                <div class="input-group input-group-sm-down-break align-items-center">
                                    <input type="text" class="js-masked-input form-control" name="no_hp"
                                           id="no_hp" placeholder="+(xx)xxx-xxxx-xxxx"
                                           aria-label="+(xx)xxx-xxxx-xxxx"
                                           data-hs-mask-options='{
                                       "template": "+62000-0000-0000"
                                     }' value="+62">

                                </div>
                            </div>
                            @error('no_hp')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="js-form-message form-group">
                            <label for="alamat" class="input-label">{{ __('Alamat') }}</label>

                            <textarea id="alamat"
                                      data-msg="Masukkan alamat untuk daftar"
                                      class="form-control form-control-lg @error('alamat') is-invalid @enderror"
                                      name="alamat" required autocomplete="alamat"
                                      autofocus>{{ old('alamat') }}</textarea>

                            @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="js-form-message form-group">
                            <label for="password" class="input-label">
                                <span class="d-flex justify-content-between align-items-center">{{ __('Password') }}</span>
                            </label>

                            <div class="input-group input-group-merge">
                                <input id="signupSrPassword" type="password"
                                       placeholder="8+ karakter dibutuhkan"
                                       aria-label="8+ karakter dibutuhkan"
                                       class="js-toggle-password form-control form-control-lg @error('password') is-invalid @enderror"
                                       name="password"
                                       required autocomplete="current-password"
                                       data-msg="Password harus lebih dari 8 karakter"
                                       data-hs-toggle-password-options='{
                                         "target": [".js-toggle-password-target-1"],
                                         "defaultClass": "tio-hidden-outlined",
                                         "showClass": "tio-visible-outlined",
                                         "classChangeTarget": ".js-toggle-passowrd-show-icon-1"
                                       }'>
                                <div class="js-toggle-password-target-1 input-group-append">
                                    <a class="input-group-text" href="javascript:;">
                                        <i class="js-toggle-passowrd-show-icon-1 tio-visible-outlined"></i>
                                    </a>
                                </div>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="js-form-message form-group">
                            <label class="input-label" for="signupSrConfirmPassword">Confirm password</label>

                            <div class="input-group input-group-merge">
                                <input type="password" class="js-toggle-password form-control form-control-lg"
                                       name="password_confirmation" id="signupSrConfirmPassword"
                                       placeholder="8+ karakter dibutuhkan" aria-label="8+ karakter dibutuhkan" required
                                       data-msg="Password tidak sama dengan password konfirmasi"
                                       data-hs-toggle-password-options='{
                             "target": [".js-toggle-password-target-2"],
                             "defaultClass": "tio-hidden-outlined",
                             "showClass": "tio-visible-outlined",
                             "classChangeTarget": ".js-toggle-passowrd-show-icon-2"
                           }'>
                                <div class="js-toggle-password-target-2 input-group-append">
                                    <a class="input-group-text" href="javascript:;">
                                        <i class="js-toggle-passowrd-show-icon-2 tio-visible-outlined"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-lg btn-block btn-primary">
                            {{ __('Daftar') }}
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
        $('.js-validate').each(function () {
            $.HSCore.components.HSValidation.init($(this), {
                rules: {
                    confirmPassword: {
                        equalTo: '#signupSrPassword'
                    }
                }
            });
        });

        // INITIALIZATION OF MASKED INPUT
        // =======================================================
        $('.js-masked-input').each(function () {
            var mask = $.HSCore.components.HSMask.init($(this));
        });

        $(document).ready(function () {
            // add/remove checked class
            $(".image-radio").each(function () {
                if ($(this).find('input[type="radio"]').first().attr("checked")) {
                    $(this).addClass('image-radio-checked');
                } else {
                    $(this).removeClass('image-radio-checked');
                }
            });

            // sync the input state
            $(".image-radio").on("click", function (e) {
                $(".image-radio").removeClass('image-radio-checked');
                $(this).addClass('image-radio-checked');
                var $radio = $(this).find('input[type="radio"]');
                $radio.prop("checked", !$radio.prop("checked"));

                e.preventDefault();
            });
        });
    </script>
@endpush
