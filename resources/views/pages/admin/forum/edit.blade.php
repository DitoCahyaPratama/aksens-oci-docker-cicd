@extends('layouts.app')

@section('content')
    <!-- Content -->
    <div class="content container-fluid">
        <div class="card mb-3 mb-lg-5">
            <div class="card-header">
                Isi data forum
                <a href="{{route('forum.index')}}" class="btn btn-warning">Kembali <i class="tio-chevron-left"></i></a>
            </div>
            <form class="js-step-form" action="{{route('forum.update', $forum->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="col-lg-12">
                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="title" class="col-sm-3 col-form-label input-label">Judul <i
                                    class="tio-help-outlined text-body ml-1" data-toggle="tooltip"
                                    data-placement="top"
                                    title="Akan diketahui oleh public"></i>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old( 'title', $forum->title) }}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="description" class="col-sm-3 col-form-label input-label">Deskripsi <i
                                    class="tio-help-outlined text-body ml-1" data-toggle="tooltip"
                                    data-placement="top"
                                    title="Isikan deskripsi dari artikel ini"></i>
                            </label>
                            <div class="col-sm-12">
                                <textarea name="description" class="ckeditor form-control @error('description') is-invalid @enderror" id="description">{{ old( 'description', $forum->description) }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="limit" class="col-sm-3 col-form-label input-label">Limit <i
                                    class="tio-help-outlined text-body ml-1" data-toggle="tooltip"
                                    data-placement="top"
                                    title="Akan diketahui oleh public"></i>
                            </label>
                            <div class="col-sm-9">
                                <div class="">
                                    <div class="input-group input-group-sm-down-break">
                                        <!-- Custom Radio -->
                                        <div class="form-control">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input"
                                                       name="limit" id="limit1" value="1" @if($forum->limit == 1) checked @endif>
                                                <label class="custom-control-label"
                                                       for="limit1">Semua</label>
                                            </div>
                                        </div>
                                        <!-- End Custom Radio -->

                                        <!-- Custom Radio -->
                                        <div class="form-control">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input"
                                                       name="limit" id="limit" value="0" @if($forum->limit == 0) checked @endif>
                                                <label class="custom-control-label"
                                                       for="limit">Konselor</label>
                                            </div>
                                        </div>
                                        <!-- End Custom Radio -->
                                    </div>
                                </div>
                                {{--                                <input type="number" class="form-control @error('limit') is-invalid @enderror" name="limit" id="limit" value="{{ old('limit') }}">--}}
                                @error('limit')
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
    <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endpush
