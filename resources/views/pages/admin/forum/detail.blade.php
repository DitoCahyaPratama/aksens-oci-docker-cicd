@extends('layouts.app')

@push('cssCode')
    <style>
        .user {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;
        }

        .user .user-left{
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>
@endpush

@section('content')
    <!-- Content -->
    <div class="content container-fluid">
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
        <div class="card mb-3 mb-lg-5">
            <div class="card-header">
                Detail forum
            </div>
            <div class="card-body">
                <hr class="col-lg-12">
                    <!-- Form Group -->
                    <div class="row form-group">
                        <div class="col-sm-12">
                            <h2>{{$forum->title}}</h2>
                            <p>{!! $forum->description !!}</p>
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <hr/>

                    @if($forum->limit == "0" && Auth::user()->role == "siswa")
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-warning" role="alert">
                                        Peringatan !! Hanya konselor yang dapat memberikan komentar
                                    </div>
                                </div>
                                <div class="col-sm-11 col-md-11 col-lg-11">

                                    <input type="text" class="form-control rounded-pill" placeholder="ketik disini" disabled/>
                                </div>
                                <div class="col-sm-1 col-md-1 col-lg-1">
                                    <button type="submit" class="btn btn-primary rounded-circle disabled">
                                        <i class="tio-send"></i>
                                    </button>
                                </div>
                            </div>
                    @else
                        <form action="{{route('public.forum.comment', $forum->id)}}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="comment" class="form-control rounded-pill mr-4" placeholder="ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary rounded-circle" type="submit">
                                        <i class="tio-send"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif

                    <hr/>

                    <div class="pt-2">
                        @foreach($comment as $data)
                            <div class="row form-group">
                                <div class="col-sm-12">
                                    <div class="user">
                                        <div class="avatar avatar-circle mr-3">
                                            <img class="avatar-img" src="{{asset($data->user->foto)}}"/>
                                        </div>
                                        <div class="user-left">
                                            <h4>
                                                {{$data->user->username}}
                                                @if($data->user->role == "siswa")
                                                   - Kelas {{$data->user->kelas}}
                                                @endif
                                            </h4>
                                            <span>{{$data->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                    <div class="pt-2">
                                        <p>{{$data->komentar}}</p>
                                    </div>
                                    <hr/>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- End Body -->
            </div>
        </div>
    </div>
    <!-- End Content -->
@endsection
