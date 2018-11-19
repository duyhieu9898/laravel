<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Laravel</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <my-component ></my-component>
        {{-- @{{message}} --}}
        <conditional-rendering ></conditional-rendering>
        <user-dashboard></user-dashboard>
        {{-- <life-cycle></life-cycle> --}}
        <re-render></re-render>
        <binding-html></binding-html>
        <input-binding></input-binding>
        <event-handling></event-handling>
        <api-calling></api-calling>
            <user></user>
        </div>
        <div id="app-2">

        </div>
        <script src="/js/app.js"></script>
    </body>
</html>
