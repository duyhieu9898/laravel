<!doctype html>
<html lang="vn">

<head>
    <title>Laravel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <meta content="initial-scale=4, maximum-scale=4.0, minimum-scale=4, user-scalable=yes" name="viewport">
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
   <hr />
    <div id="app-2">
        <span v-bind:title="message">
                Rê chuột lên đây một vài giây để xem thuộc tính `title` được bind!
        </span>

    </div>
    <!-- require vuejs -->
    <script src="/js/app.js">

    </script>
</body>

</html>
