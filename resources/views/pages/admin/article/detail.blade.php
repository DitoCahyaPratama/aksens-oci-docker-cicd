@extends('layouts.app')

@section('content')
    <!-- Content -->
    <div class="content container-fluid">
        <div class="card mb-3 mb-lg-5">
            <div class="card-header">
                <p>{{$article->title}}</p>
            </div>
            <div class="card-body">
                <div class="col-lg-12">
                    <div class="row form-group">
                        <div class="col-sm-12 text-center">
                            <img class="img-fluid" src="{{asset('uploads/articles/'.$article->image)}}"/>
                        </div>
                    </div>

                    <!-- Form Group -->
                    <div class="row form-group">
                        <div class="col-sm-12">
                            {!! $article->description !!}
                            @error('description')
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
        </div>
    </div>
    <!-- End Content -->
@endsection
