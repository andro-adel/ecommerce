<!DOCTYPE html>
<html lang="en">
    <head>
        @include('website.layout.header')
    </head>
    <body id="page-top">

        @include('website.layout.navbar')

            <div style="padding-top: 8rem!important;">
                @yield('body')
            </div>

        @include('website.layout.footer')

    </body>
</html>