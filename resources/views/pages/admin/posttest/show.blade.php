@extends('layouts.app')

@section('content')
    <!-- Content -->
    <div class="content container-fluid">
        <div class="card mb-3 mb-lg-5">
            <div class="card-header">
                Detail post test
                <a href="{{route('posttest.index')}}" class="btn btn-warning">Kembali <i class="tio-chevron-left"></i></a>
            </div>
            <div class="card-body">
                <div class="col-lg-12">

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="soal" class="col-sm-3 col-form-label input-label">Soal
                        </label>
                        <div class="col-sm-12">
                            {!! $posttest->soal !!}
                        </div>
                    </div>
                    <!-- End Form Group -->


                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="aspek" class="col-sm-3 col-form-label input-label">Aspek
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{$posttest->aspek}}" readonly>
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
