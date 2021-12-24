@extends('layouts.app')

@section('content')
    <!-- Content -->
    <div class="content container-fluid">
        <div class="card mb-3 mb-lg-5">
            <div class="card-header">
                Isi data post test
                <a href="{{route('posttest.index')}}" class="btn btn-warning">Kembali <i class="tio-chevron-left"></i></a>
            </div>
            <form class="js-step-form" action="{{route('posttest.store')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="col-lg-12">
                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="soal" class="col-sm-3 col-form-label input-label">Soal <i
                                    class="tio-help-outlined text-body ml-1" data-toggle="tooltip"
                                    data-placement="top"
                                    title="Isikan pertanyaan di sini"></i>
                            </label>
                            <div class="col-sm-12">
                                <textarea name="soal" class="ckeditor form-control @error('soal') is-invalid @enderror" id="soal">{{ old('soal') }}</textarea>
                                @error('soal')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="row form-group">
                            <label for="aspek" class="col-sm-3 col-form-label input-label">Aspek
                            </label>
                            <div class="col-sm-9">
                                <select id="role"
                                        data-msg="Pilih aspek"
                                        class="form-control @error('aspek') is-invalid @enderror"
                                        name="aspek" value="{{ old('aspek') }}" required autocomplete="aspek"
                                        autofocus>
                                    <option value="emosi">Emosi</option>
                                    <option value="fisik">Fisik</option>
                                    <option value="perilaku">Perilaku</option>
                                    <option value="psikologi">Psikologi</option>
                                </select>
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
