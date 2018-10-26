<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Laravel</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <meta content="initial-scale=4, maximum-scale=4.0, minimum-scale=4, user-scalable=yes" name="viewport">
    </head>
    <body>
        <div id="app">
            <example-component>
            {{-- cannot write here --}}
            </example-component>

            <my-component></my-component>
        </div>
        <div id="app-2">
            <span v-bind:title="message">
                Rê chuột lên đây một vài giây để xem thuộc tính `title` được bind!
            </span>
        </div>
        {{ route('auth.facebook') }}
        <script src="/js/app.js"></script>
    </body>
</html>
