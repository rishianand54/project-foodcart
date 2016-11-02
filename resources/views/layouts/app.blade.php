<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/all.css">

    </head>
    <body>
        <header id="app-header">@include('partials.app-header')</header>

        <main id="app-body" class="conatiner-fluid">
            <div class="row">
                <aside id="side-navigation" class="col-sm-2">@include('partials.side-nav')</aside>
                <div id="main-content" class="col-sm-10 col-xs-12">@yield('content')</div>
            </div>
        </main>

        <!-- Scripts -->
        <script src="/js/all.js"></script>
        <script>
            $('#flash-overlay-modal').modal();
            $('div.alert').not('.alert-important').delay(3000).fadeOut(350);

            if ($(window).width() < 768) {
                var b = document.getElementById('aisle-heading');
                b.innerHTML = 'Aisles <i class="fa fa-angle-double-down" aria-hidden="true"></i>';
                var ul = document.getElementById('aisles');
                ul.style.display = 'none';
                function toggleNavigation () {
                    if (ul.style.display == 'initial') {
                        ul.style.display = 'none';
                        b.innerHTML = 'Aisles <i class="fa fa-angle-double-down" aria-hidden="true"></i>';
                    }
                    else {
                        ul.style.display = 'initial';
                        b.innerHTML = 'Aisles <i class="fa fa-angle-double-up" aria-hidden="true"></i>';
                    }
                }
            }
            if ($(window).width() > 768) {
                var b = document.getElementById('aisle-heading');
                b.style.display = 'none';
            }
        </script>

    </body>
</html>
