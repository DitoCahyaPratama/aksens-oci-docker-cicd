@extends('layouts.app')

@section('content')
    <!-- Content -->
    <div class="content container-fluid">
        <div class="row justify-content-sm-center text-center">
            <div class="col-sm-7 col-md-5">
                <img class="img-fluid mb-5" src="{{asset('assets/svg/illustrations/graphs.svg')}}" alt="Image Description"
                     style="max-width: 21rem;">

                <h1>Hello, Senang bertemu dengan kamu</h1>
                <p>Butuh waktu kurang lebih 30 menit untuk melakukan post test ini!</p>

                <a class="btn btn-primary" href="{{route('siswa.posttest.start')}}">Mulai Post Test</a>
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- End Content -->
@endsection
