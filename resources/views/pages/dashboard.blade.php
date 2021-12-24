@extends('layouts.app')

@push('cssCode')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"/>
    <style>
        .owl-carousel .item img{
            border-radius: 20px;
            margin: 10px;
        }

        .user {
            display: flex;
            flex-direction: row;
            padding: 20px;
            justify-content: flex-start;
            align-items: center;
        }

        .user .user-right{
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .user-bottom{
            display: flex;
            flex-direction: row;
            padding: 20px;
            justify-content: space-between;
            align-items: center;
        }

        .forum {
            background: #FAF8F0;
            border: none;
            color: #000;
        }
    </style>
@endpush

@section('content')
    <!-- Content -->
    <div class="content container-fluid">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <div class="owl-carousel owl-theme">
                    @foreach($banner as $data)
                        <div class="item">
                            <img src="{{asset('uploads/banners/'.$data->foto)}}" alt=""/>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row container d-flex justify-content-center">
            <div class="col-sm-12">
                <div class="b-b b-theme nav-active-theme mb-3">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="forum-tab" data-toggle="tab" href="#forum"
                                                role="tab" aria-controls="forum" aria-selected="true">Forum</a></li>
                        <li class="nav-item"><a class="nav-link" id="artikel-tab" data-toggle="tab" href="#artikel"
                                                role="tab" aria-controls="artikel" aria-selected="false">Artikel</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="tab-content mb-4">
            <div class="tab-pane fade show active" id="forum" role="tabpanel" aria-labelledby="forum-tab">
                <div class="row">
                    @foreach($forum as $data)
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="rounded-lg card p-0 m-0 mb-4 w-100 forum">
                                <div class="container">
                                    <div class="user">
                                        <div class="avatar avatar-circle mr-3">
                                            <img class="avatar-img" src="{{asset($data->user->foto)}}"/>
                                        </div>
                                        <div class="user-right">
                                            <h4>{{$data->user->username}}</h4>
                                            <span>{{$data->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <h4>{{$data->title}}</h4>
                                        <span>
                                            {!! strip_tags(substr($data->description, 0, 100)) !!} ...
                                        </span>
                                    </div>
                                    <div class="user-bottom">
                                        @if($data->limit == "0" && Auth::user()->role == "siswa")
                                            <a href="{{route('public.forum.detail', $data->id)}}" class="btn btn-warning btn-pill">Tanggapan hanya khusus konselor</a>
                                        @else
                                            <a href="{{route('public.forum.detail', $data->id)}}" class="btn btn-primary btn-pill">Beri Tanggapan</a>
                                        @endif
                                        @role('admin')
                                            <form action="{{ route('public.forum.delete', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit " class="btn btn-danger btn-pill"><i
                                                        class="tio-delete ml-1"></i> Hapus
                                                </button>
                                            </form>
                                        @endrole
                                        <div>
                                            <span class="tio tio-chat-outlined"></span> {{count($data->comment)}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="artikel" role="tabpanel" aria-labelledby="artikel-tab">
                <div class="row">
                    @foreach($article as $data)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <a class="rounded-lg card p-0 m-0 mb-4 w-100" href="{{route('public.article.detail', $data->slug)}}">
                                <img class="card-img profile-cover-img" src="{{asset('uploads/articles/'.$data->image)}}" />
                                <h5 class="card-title text-center p-2">{{$data->title}}</h5>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
@endsection

@push('jsCode')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>

        jQuery(document).ready(function ($) {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsive: {
                    0: {
                        items: 1
                    }
                }
            })
        })

        // INITIALIZATION OF SELECT2
        // =======================================================
        $('.js-select2-custom').each(function () {
            var select2 = $.HSCore.components.HSSelect2.init($(this));
        });

        // INITIALIZATION OF DATATABLES
        // =======================================================
        var datatable = $.HSCore.components.HSDatatables.init($('#datatable'), {
            select: {
                style: 'multi',
                selector: 'td:first-child input[type="checkbox"]',
                classMap: {
                    checkAll: '#datatableCheckAll',
                    counter: '#datatableCounter',
                    counterInfo: '#datatableCounterInfo'
                }
            },
            language: {
                zeroRecords: '<div class="text-center p-4">' +
                    '<img class="mb-3" src="{{asset('assets/svg/illustrations/sorry.svg')}}" alt="Image Description" style="width: 7rem;">' +
                    '<p class="mb-0">No data to show</p>' +
                    '</div>'
            }
        });

        $('.js-datatable-filter').on('change', function () {
            var $this = $(this),
                elVal = $this.val(),
                targetColumnIndex = $this.data('target-column-index');

            datatable.column(targetColumnIndex).search(elVal).draw();
        });

        $('#datatableSearch').on('mouseup', function (e) {
            var $input = $(this),
                oldValue = $input.val();

            if (oldValue == "") return;

            setTimeout(function () {
                var newValue = $input.val();

                if (newValue == "") {
                    // Gotcha
                    datatable.search('').draw();
                }
            }, 1);
        });
    </script>
@endpush
