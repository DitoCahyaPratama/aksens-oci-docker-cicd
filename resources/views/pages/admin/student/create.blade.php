@extends('layouts.app')

@section('content')
    <!-- Content -->
    <div class="content container-fluid">
        <div class="card mb-3 mb-lg-5">
            <div class="card-header">
                Isi data Siswa
                <a href="{{route('student.index')}}" class="btn btn-warning">Kembali <i
                        class="tio-chevron-left"></i></a>
            </div>
            <form class="js-step-form" action="{{route('student.store')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <div class="d-flex justify-content-center align-items-center">
                                <label class="image-radio">
                                    <img src="{{asset('foto_profil1.png')}}" width="80px">
                                    <input class="radio-foto" type="radio" name="foto" value="foto_profil1.png" checked/>
                                </label>
                                <label class="image-radio">
                                    <img src="{{asset('foto_profil2.png')}}" width="80px">
                                    <input class="radio-foto" type="radio" name="foto" value="foto_profil2.png"/>
                                </label>
                                <label class="image-radio">
                                    <img src="{{asset('foto_profil3.png')}}" width="80px">
                                    <input class="radio-foto" type="radio" name="foto" value="foto_profil3.png"/>
                                </label>
                            </div>
                            @error('foto')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="username" class="col-sm-3 col-form-label input-label">Username
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                       name="username" id="username" value="{{ old('username') }}">
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="name" class="col-sm-3 col-form-label input-label">Nama
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                       id="name" value="{{ old('name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="nis" class="col-sm-3 col-form-label input-label">NIS
                            </label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control @error('nis') is-invalid @enderror" name="nis"
                                       id="nis" value="{{ old('nis') }}">
                                @error('nis')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="kelas" class="col-sm-3 col-form-label input-label">Kelas
                            </label>
                            <div class="col-sm-9">
                                <select id="kelas"
                                        data-msg="Pilih kelas"
                                        class="form-control @error('kelas') is-invalid @enderror"
                                        name="kelas" value="{{ old('kelas') }}" required autocomplete="kelas"
                                        autofocus>
                                    <option value="">Pilih Kelas</option>
                                    <option value="10">Kelas 10</option>
                                    <option value="11">Kelas 11</option>
                                    <option value="12">Kelas 12</option>
                                </select>
                                @error('kelas')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Form Group -->


                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="email" class="col-sm-3 col-form-label input-label">Email
                            </label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" id="email" value="{{ old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="tempat_lahir" class="col-sm-3 col-form-label input-label">Tempat Lahir
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                       name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}">
                                @error('tempat_lahir')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="tanggal_lahir" class="col-sm-3 col-form-label input-label">Tanggal Lahir
                            </label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                       name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                @error('tanggal_lahir')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="jenis_kelamin" class="col-sm-3 col-form-label input-label">Jenis Kelamin
                            </label>
                            <div class="col-sm-9">
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
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="no_hp" class="col-sm-3 col-form-label input-label">Nomor Telepon
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="js-masked-input form-control" name="no_hp"
                                       id="no_hp" placeholder="+(xx)xxx-xxxx-xxxx"
                                       aria-label="+(xx)xxx-xxxx-xxxx"
                                       data-hs-mask-options='{
                                       "template": "+62000-0000-0000"
                                     }' value="{{old('no_hp', '+62')}}">
                                @error('no_hp')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="alamat" class="col-sm-3 col-form-label input-label">Alamat
                            </label>
                            <div class="col-sm-9">
                                <textarea id="alamat"
                                          data-msg="Masukkan alamat untuk daftar"
                                          class="form-control form-control-lg @error('alamat') is-invalid @enderror"
                                          name="alamat" required autocomplete="alamat">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="password" class="col-sm-3 col-form-label input-label">Password
                            </label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                       name="password" id="password" value="{{ old('password') }}">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Form Group -->

                    </div>
                    <!-- End Body -->
                </div>
                <div class="card-footer d-flex justify-content-end align-items-center">
                    <button type="submit" class="btn btn-primary">Selesai <i class="tio-chevron-right"></i></button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Content -->
@endsection

@push('jsCode')
    <script>
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
