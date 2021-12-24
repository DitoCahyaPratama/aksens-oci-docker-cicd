@extends('layouts.app')

@section('content')
    <!-- Content -->
    <div class="content container-fluid">
        <div class="card mb-3 mb-lg-5">
            <div class="card-header">
                Detail forum
                <a href="{{route('forum.index')}}" class="btn btn-warning">Kembali <i class="tio-chevron-left"></i></a>
            </div>
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
                            {{$forum->title}}
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="description" class="col-sm-3 col-form-label input-label">Deskripsi <i
                                class="tio-help-outlined text-body ml-1" data-toggle="tooltip"
                                data-placement="top"
                                title="deskripsi dari forum ini"></i>
                        </label>
                        <div class="col-sm-9">
                            {!! $forum->description !!}
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
                        <label for="title" class="col-sm-3 col-form-label input-label">Limit <i
                                class="tio-help-outlined text-body ml-1" data-toggle="tooltip"
                                data-placement="top"
                                title="Akan diketahui oleh public"></i>
                        </label>
                        <div class="col-sm-9">
                            @if($forum->limit == 1)
                                Semua
                            @else
                                Konselor
                            @endif
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
