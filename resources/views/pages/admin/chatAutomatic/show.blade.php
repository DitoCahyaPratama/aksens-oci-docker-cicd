@extends('layouts.app')

@section('content')
    <!-- Content -->
    <div class="content container-fluid">
        <div class="card mb-3 mb-lg-5">
            <div class="card-header">
                Detail chat otomatis
                <a href="{{route('chatautomatic.index')}}" class="btn btn-warning">Kembali <i class="tio-chevron-left"></i></a>
            </div>
            <div class="card-body">
                <div class="col-lg-12">

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="soal" class="col-sm-3 col-form-label input-label">Chat
                        </label>
                        <div class="col-sm-12">
                            {!! $chatautomatic->chat !!}
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
