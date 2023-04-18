@php
    $class = isset($attributes["class"]) ? $attributes["class"] : "overflow-y-auto sm:overflow-y-hidden";
@endphp

<!doctype html>
<html lang="{{ session('lang', config("app.locale")) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coronatime</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
</head>
<body class="{{ $class }}">
    {{ $slot }}
</body>
</html>
