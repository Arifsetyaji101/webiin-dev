<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Title -->
        <title>Dashboard - Webiin</title>
        @include('admin.includes.styles')
        @stack('after-styles')
    </head>
    <body>
        {{-- <div class='loader'>
            <div class='spinner-grow text-primary' role='status'>
                <span class='sr-only'>Loading...</span>
            </div>
        </div> --}}
        <div class="connect-container align-content-stretch d-flex flex-wrap">
            @include('admin.includes.sidebar')
            <div class="page-container">
                @include('admin.includes.topbar')
                <div class="page-content">
                    @yield('content')
                </div>
                @include('admin.includes.footer')
            </div>
        </div>

        @include('admin.includes.scripts')
        @stack('after-scripts')
    </body>

</html>
