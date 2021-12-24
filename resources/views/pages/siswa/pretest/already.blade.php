@extends('layouts.app')

@section('content')
    <!-- Content -->
    <div class="content container-fluid mb-5">
        <div class="row justify-content-sm-center text-center">
            <div class="col-sm-7 col-md-5">
                <img class="img-fluid mb-5" src="{{asset('assets/svg/illustrations/graphs.svg')}}" alt="Image Description"
                     style="max-width: 21rem;">

                <h1>Hello, Kamu sudah selesai pre test</h1>
                <p>Kamu bisa melihat nilai di bawah ini!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-lg-3 text-center">
                            <h5>Total Skor</h5>
                            <h1>{{$persentase}}</h1>
                        </div>
                        <div class="col-lg-9">
                            @if($persentase >= 0 && $persentase <= 20)
                                {{ $interpretasi[0]->description }}
                            @elseif($persentase >= 21 && $persentase <= 40)
                                {{ $interpretasi[1]->description }}
                            @elseif($persentase >= 41 && $persentase <= 60)
                                {{ $interpretasi[2]->description }}
                            @elseif($persentase >= 61 && $persentase <= 80)
                                {{ $interpretasi[3]->description }}
                            @elseif($persentase >= 81 && $persentase <= 100)
                                {{ $interpretasi[4]->description }}
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- End Content -->
@endsection
