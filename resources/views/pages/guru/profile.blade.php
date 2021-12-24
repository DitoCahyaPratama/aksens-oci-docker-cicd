@extends('layouts.app')

@section('content')
    <!-- Content -->
    <div class="content container-fluid">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!, </strong>{{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="tio-clear tio-lg"></i>
                </button>
            </div>
        @endif

        @if ($message = Session::get('danger'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!, </strong>{{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="tio-clear tio-lg"></i>
                </button>
            </div>
        @endif
        <div class="card mb-3 mb-lg-5">
            <div class="card-header">
                Profile saya
                <div class="col-sm-auto">
                    <a href="{{route('guru.profile.edit')}}" class="btn btn-primary">
                        Edit Profile
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="d-flex justify-content-center align-items-center">
                            <label class="image-radio">
                                <img src="{{asset($teacher->foto)}}" width="80px">
                            </label>
                        </div>
                    </div>
                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="username" class="col-sm-3 col-form-label input-label">Username
                        </label>
                        <div class="col-sm-9">
                            <input type="text" id="username" class="form-control" value="{{ $teacher->username }}" readonly>
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="name" class="col-sm-3 col-form-label input-label">Nama
                        </label>
                        <div class="col-sm-9">
                            <input type="text" id="username" class="form-control" value="{{ $teacher->name }}" readonly>
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="nis" class="col-sm-3 col-form-label input-label">NIK
                        </label>
                        <div class="col-sm-9">
                            <input type="text" id="nis" class="form-control" value="{{ $teacher->nik }}" readonly>
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="kelas" class="col-sm-3 col-form-label input-label">Kelas
                        </label>
                        <div class="col-sm-9">
                            <input type="text" id="kelas" class="form-control" value="{{ $teacher->kelas }}" readonly>
                        </div>
                    </div>
                    <!-- End Form Group -->


                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="email" class="col-sm-3 col-form-label input-label">Email
                        </label>
                        <div class="col-sm-9">
                            <input type="text" id="email" class="form-control" value="{{ $teacher->email }}" readonly>
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="tempat_lahir" class="col-sm-3 col-form-label input-label">Tempat Lahir
                        </label>
                        <div class="col-sm-9">
                            <input type="text" id="tempat_lahir" class="form-control" value="{{ $teacher->tempat_lahir }}" readonly>
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="tanggal_lahir" class="col-sm-3 col-form-label input-label">Tanggal Lahir
                        </label>
                        <div class="col-sm-9">
                            <input type="date" id="tanggal_lahir" class="form-control" value="{{ $teacher->tanggal_lahir }}" readonly>
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="jenis_kelamin" class="col-sm-3 col-form-label input-label">Jenis Kelamin
                        </label>
                        <div class="col-sm-9">
                            <input type="text" id="jenis_kelamin" class="form-control" value="{{ $teacher->jenis_kelamin }}" readonly>
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="no_hp" class="col-sm-3 col-form-label input-label">Nomor Telepon
                        </label>
                        <div class="col-sm-9">
                            <input type="text" id="no_hp" class="form-control" value="{{ $teacher->no_hp }}" readonly>
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
                                          class="form-control form-control-lg"
                                          required autocomplete="alamat"
                                          readonly>{{ $teacher->alamat }}</textarea>
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="operational_time_start" class="col-sm-3 col-form-label input-label">Jam operasional mulai
                        </label>
                        <div class="col-sm-9">
                            <input type="text" id="operational_time_start" class="form-control" value="{{ $teacher->operational_time_start }}" readonly>
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="operational_time_end" class="col-sm-3 col-form-label input-label">Jam operasional akhir
                        </label>
                        <div class="col-sm-9">
                            <input type="text" id="operational_time_end" class="form-control" value="{{ $teacher->operational_time_end }}" readonly>
                        </div>
                    </div>
                    <!-- End Form Group -->

                </div>
                <!-- End Body -->
            </div>
        </div>
    </div>
    <!-- End Content -->
@endsection
