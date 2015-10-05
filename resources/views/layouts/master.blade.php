<?php
/**
 * Created by PhpStorm.
 * User: Raphson
 * Date: 9/19/15
 * Time: 19:17
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width">
        <title>Prego - Project Management App</title>
        <meta name="description" content="Prego is a project management app built for learning purposes in Laravel">

        <!-- Typekit Fonts -->
        <script src="//use.typekit.net/udt8boc.js"></script>
        <script>
            try{
                Typekit.load();
            } catch(e) {

            }
        </script>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</html>

