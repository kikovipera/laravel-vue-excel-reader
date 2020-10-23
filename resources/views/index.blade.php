<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" href="<%= BASE_URL %>favicon.ico">
    <link href="{{ mix('css/app.css') }}?v=1" rel="stylesheet">

    <title>Vue Laravel Demo</title>
</head>
<body id="body">
<noscript>
    <strong>We're sorry but vue-playground doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
</noscript>
<div id="app"></div>
<!-- built files will be auto injected -->
@if(env('APP_ENV') !== 'local')
    <script src="{{ asset('js/main.js') }}?v=1"></script>
@else
    <script src="{{ mix('js/main.js') }}"></script>
@endif
</body>
</html>
