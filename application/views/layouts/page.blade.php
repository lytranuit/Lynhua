<!doctype html>
<html>
    <head lang="en">
        @include("include.head")
    </head><!--/head-->

    <body class='template_{{$template or ""}}'>
        @yield("content")
    </body>
</html>