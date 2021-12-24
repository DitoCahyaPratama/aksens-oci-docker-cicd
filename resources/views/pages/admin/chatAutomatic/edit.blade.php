@extends('layouts.app')

@section('content')
    <!-- Content -->
    <div class="content container-fluid">
        <div class="card mb-3 mb-lg-5">
            <div class="card-header">
                Isi data chat otomatis
                <a href="{{route('chatautomatic.index')}}" class="btn btn-warning">Kembali <i class="tio-chevron-left"></i></a>
            </div>
            <form class="js-step-form" action="{{route('chatautomatic.update', $chatautomatic->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="col-lg-12">
                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="chat" class="col-sm-3 col-form-label input-label">Chat <i
                                    class="tio-help-outlined text-body ml-1" data-toggle="tooltip"
                                    data-placement="top"
                                    title="Isikan pertanyaan di sini"></i>
                            </label>
                            <div class="col-sm-12">
                                <textarea name="chat" class="ckeditor form-control @error('chat') is-invalid @enderror" id="chat">{{ old('chat', $chatautomatic->chat) }}</textarea>
                                @error('chat')
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
