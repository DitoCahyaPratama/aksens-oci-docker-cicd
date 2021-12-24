@extends('layouts.app')

@section('content')
    <!-- Content -->
    <div class="content container-fluid">
        <div class="card mb-3 mb-lg-5">
            <div class="card-header">
                Detail siswa
                <a href="{{route('student.index')}}" class="btn btn-warning">Kembali <i class="tio-chevron-left"></i></a>
            </div>
            <div class="card-body">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="d-flex justify-content-center align-items-center">
                            <label class="image-radio">
                                <img src="{{asset($student->foto)}}" width="80px">
                            </label>
                        </div>
                    </div>
                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="username" class="col-sm-3 col-form-label input-label">Username
                        </label>
                        <div class="col-sm-9">
                            <input type="text" id="username" class="form-control" value="{{ $student->username }}" readonly>
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="name" class="col-sm-3 col-form-label input-label">Nama
                        </label>
                        <div class="col-sm-9">
                            <input type="text" id="username" class="form-control" value="{{ $student->name }}" readonly>
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="nis" class="col-sm-3 col-form-label input-label">NIS
                        </label>
                        <div class="col-sm-9">
                            <input type="text" id="nis" class="form-control" value="{{ $student->nis }}" readonly>
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="kelas" class="col-sm-3 col-form-label input-label">Kelas
                        </label>
                        <div class="col-sm-9">
                            <input type="text" id="kelas" class="form-control" value="{{ $student->kelas }}" readonly>
                        </div>
                    </div>
                    <!-- End Form Group -->


                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="email" class="col-sm-3 col-form-label input-label">Email
                        </label>
                        <div class="col-sm-9">
                            <input type="text" id="email" class="form-control" value="{{ $student->email }}" readonly>
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="tempat_lahir" class="col-sm-3 col-form-label input-label">Tempat Lahir
                        </label>
                        <div class="col-sm-9">
                            <input type="text" id="tempat_lahir" class="form-control" value="{{ $student->tempat_lahir }}" readonly>
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="tanggal_lahir" class="col-sm-3 col-form-label input-label">Tanggal Lahir
                        </label>
                        <div class="col-sm-9">
                            <input type="date" id="tanggal_lahir" class="form-control" value="{{ $student->tanggal_lahir }}" readonly>
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="jenis_kelamin" class="col-sm-3 col-form-label input-label">Jenis Kelamin
                        </label>
                        <div class="col-sm-9">
                            <input type="text" id="jenis_kelamin" class="form-control" value="{{ $student->jenis_kelamin }}" readonly>
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="no_hp" class="col-sm-3 col-form-label input-label">Nomor Telepon
                        </label>
                        <div class="col-sm-9">
                            <input type="text" id="no_hp" class="form-control" value="{{ $student->no_hp }}" readonly>
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
                                          autofocus readonly>{{ $student->alamat }}</textarea>
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
