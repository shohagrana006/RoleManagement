<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('backend.includes.styles')
</head>
<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">

        @include('backend.includes.sidebar_menu')
        <!-- main content area start -->
        <div class="main-content">

           @include('backend.includes.top_header')

           @include('backend.includes.menu')

            <div class="main-content-inner">
                @yield('dashboard_content')
            </div>
        </div>
        <!-- main content area end -->

        @include('backend.includes.footer')
    </div>
    <!-- page container area end -->
    @include('backend.includes.offset')

    @include('backend.includes.scripts')
</body>
</html>
