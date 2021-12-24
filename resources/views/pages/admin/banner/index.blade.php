@extends('layouts.app')

@section('content')
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Add Medicine Category -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-sm-0">
                    <h1 class="page-header-title">Banner<span class="badge badge-soft-dark ml-2">{{count($banner)}}</span>
                    </h1>
                </div>
            </div>
        </div>
        <!-- End Add Medicine Category -->

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

    <!-- Card -->
        <div class="card mb-3 mb-lg-5">
            <!-- Header -->
            <div class="card-header">
                <div class="row justify-content-between align-items-center flex-grow-1">
                    <div class="col-12 col-md">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-header-title">Banner</h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="card-body">
                <div class="row">
                    @foreach($banner as $data)
                        <div class="col-lg-6 col-md-6 col-sm-12 p-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="{{asset('uploads/banners/'.$data->foto)}}" width="100%" />
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex justify-content-between flex-column">
                                    <form action="{{route('banner.update', $data->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="file" class="form-group" name="foto" required>
                                        <button type="submit" class="btn btn-pill btn-primary btn-block mt-2">Upload Foto</button>
                                    </form>
                                    <form action="{{route('banner.destroy', $data->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-pill btn-outline-danger btn-block mt-2">Hapus Foto</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- End Table -->

        </div>
        <!-- End Card -->
    </div>
    <!-- End Content -->
@endsection
