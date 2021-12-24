<!DOCTYPE html>
<html lang="en" class="h-100">

<!-- Mirrored from htmlstream.com/front-dashboard/authentication-signin-cover.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Jul 2021 00:18:26 GMT -->
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Admin') }}</title>

{{--    <!-- Favicon -->--}}
{{--    <link rel="shortcut icon" href="favicon.ico">--}}

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&amp;display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/icon-set/style.css')}}">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{asset('assets/css/theme.minc619.css?v=1.0')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <style>
        .btn-yellow{
            background: #FEE600;
            color: #0b1328;
            font-weight: bold;
        }
        .bg-blue{
            background: #18A4E0;
        }
    </style>

    @stack('cssCode')
</head>

<body class="d-flex min-h-100 bg-blue">

<!-- ========== MAIN CONTENT ========== -->
<main class="main pt-0">
    @yield('content')
</main>
<!-- ========== END MAIN CONTENT ========== -->


<!-- JS Implementing Plugins -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>

<!-- JS Front -->
<script src="{{asset('assets/js/theme.min.js')}}"></script>

<!-- JS Plugins Init. -->
<script>
    $(document).on('ready', function () {
        // INITIALIZATION OF SHOW PASSWORD
        // =======================================================
        $('.js-toggle-password').each(function () {
            new HSTogglePassword(this).init()
        });

        // INITIALIZATION OF SELECT2
        // =======================================================
        $('.js-select2-custom').each(function () {
            var select2 = $.HSCore.components.HSSelect2.init($(this));
        });
    });
</script>

@stack('jsCode')

<!-- IE Support -->
<script>
    if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="{{asset('assets/vendor/babel-polyfill/polyfill.min.js')}}"><\/script>');
</script>
</body>

</html>
