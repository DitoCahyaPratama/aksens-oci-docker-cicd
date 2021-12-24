@extends('layouts.app')

@push('cssCode')
    <style>
        .steps .step-item {
            -ms-flex-positive: 1;
            flex-grow: 1;
            -ms-flex: 1;
            flex: 1;
            justify-content: flex-end;
            margin-bottom: 0;
        }

        .steps .step-icon {
            margin-bottom: 1rem
        }

        .steps .step-icon::after {
            top: 1.3125rem;
            left: 3.5625rem;
            width: calc(100% - 3.5625rem);
            height: 1.0625rem;
            border-top: none;
            border-left: none
        }

        .steps .step-icon.step-icon-xs::after, .steps.step-icon-xs .step-icon::after {
            top: .76562rem;
            left: 2.46875rem;
            width: calc(100% - 2.46875rem)
        }

        .steps .step-icon.step-icon-sm::after, .steps.step-icon-sm .step-icon::after {
            top: 1.09375rem;
            left: 3.125rem;
            width: calc(100% - 3.125rem)
        }

        .steps .step-icon.step-icon-lg::after, .steps.step-icon-lg .step-icon::after {
            top: 1.68437rem;
            left: 4.30625rem;
            width: calc(100% - 4.30625rem)
        }
    </style>
@endpush

@section('content')
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Step Form -->
        <form class="js-step-form py-md-5 form-prevent-multiple-submits"
              data-hs-step-form-options='{
                    "progressSelector": "#addUserStepFormProgress",
                    "stepsSelector": "#addUserStepFormContent",
                    "endSelector": "#addUserFinishBtn",
                    "isValidate": false
                  }' action="{{route('siswa.pretest.submit')}}" method="post">
            @csrf
            <div class="row justify-content-lg-center">
                <div class="col-lg-8 col-sm-12">
                    <!-- Content Step Form -->
                    <div id="addUserStepFormContent">
                        @foreach($soal->shuffle() as $key => $data)
                            <div id="soal{{$key+1}}" class="card card-lg @if($key+1 == 1) active @endif">
                                <!-- Body -->
                                <div class="card-body">
                                    <div class="d-flex justify-content-start">
                                        <span>{{$key+1}}.</span> {!! $data->soal !!}
                                    </div>
                                    <div class="form-control">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input"
                                                   name="soal{{$key+1}}" id="soal{{$key+1}}ss" value="5" required>
                                            <label class="custom-control-label"
                                                   for="soal{{$key+1}}ss">Sangat Sering (SS)</label>
                                        </div>
                                    </div>
                                    <div class="form-control">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input"
                                                   name="soal{{$key+1}}" id="soal{{$key+1}}s" value="4" required>
                                            <label class="custom-control-label"
                                                   for="soal{{$key+1}}s">Sering (S)</label>
                                        </div>
                                    </div>
                                    <div class="form-control">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input"
                                                   name="soal{{$key+1}}" id="soal{{$key+1}}k" value="3" required>
                                            <label class="custom-control-label"
                                                   for="soal{{$key+1}}k">Kadang-kadang (K)</label>
                                        </div>
                                    </div>
                                    <div class="form-control">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input"
                                                   name="soal{{$key+1}}" id="soal{{$key+1}}j" value="2" required>
                                            <label class="custom-control-label"
                                                   for="soal{{$key+1}}j">Jarang (J)</label>
                                        </div>
                                    </div>
                                    <div class="form-control">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input"
                                                   name="soal{{$key+1}}" id="soal{{$key+1}}sj" value="1" required>
                                            <label class="custom-control-label"
                                                   for="soal{{$key+1}}sj">Sangat Jarang (SJ)</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Body -->

                                <!-- Footer -->
                                <div class="card-footer d-flex align-items-center">
                                    @if($key > 0)
                                        <button type="button" class="btn btn-ghost-secondary"
                                                data-hs-step-form-prev-options='{
                                                         "targetSelector": "#soal{{$key}}"
                                                    }'>
                                            <i class="tio-chevron-left"></i> Previous step
                                        </button>
                                    @endif

                                    @if(($key + 1) == count($soal))
                                        <div class="ml-auto">
                                            <button type="submit" class="btn btn-primary selesai">Selesai
                                            </button>
                                        </div>
                                    @else
                                        <div class="ml-auto">
                                            <button type="button" class="btn btn-primary"
                                                    data-hs-step-form-next-options='{
                                                      "targetSelector": "#soal{{$key + 2}}"
                                                    }'>
                                                Next <i class="tio-chevron-right"></i>
                                            </button>
                                        </div>
                                    @endif

                                </div>
                                <!-- End Footer -->
                            </div>
                        @endforeach
                    </div>
                    <!-- End Content Step Form -->
                </div>
                <div class="col-lg-4 col-sm-12">
                    <!-- Step -->
                    <div class="card">
                        <div class="card-body">
                            <ul id="addUserStepFormProgress"
                                class="js-step-progress step steps step-item-center">
                                @foreach($soal as $key => $data)
                                    <li class="step-item">
                                        <a class="step-content-wrapper" href="javascript:;"
                                           data-hs-step-form-next-options='{
                          "targetSelector": "#soal{{$key+1}}"
                        }'>
                                            <span class="step-icon step-icon-soft-dark">{{$key+1}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- End Step -->
                </div>
            </div>
            <!-- End Row -->
        </form>
        <!-- End Step Form -->
    </div>
    <!-- End Content -->
@endsection

@push('jsCode')
    <script>
        // INITIALIZATION OF STEP FORM
        // =======================================================
        $('.js-step-form').each(function () {
            var stepForm = new HSStepForm($(this), {
                finish: function () {
                }
            }).init();
        });

        $('.form-prevent-multiple-submits').on('submit', function(){
            $('.selesai').attr('disabled', true);
        })
    </script>
@endpush
