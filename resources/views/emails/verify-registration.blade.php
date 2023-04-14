<!DOCTYPE html>
<html lang="{{ session('lang', config("app.locale")) }}">
<head>
    <meta charset="utf-8">
    <title>Verify Registration</title>
</head>
<body>
<h1>Verify your registration</h1>
<p>Click on the following link to verify your registration:</p>
<p><a href="{{ $url }}">Verify</a></p>
</body>
</html>
