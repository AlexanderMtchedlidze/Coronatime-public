@props(["url"])

<!DOCTYPE html>
<html lang="en" style="height: 100vh">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;900&display=swap" rel="stylesheet">
</head>
<body style="font-family: Inter, sans-serif; height: 100vh; display: grid; place-items: center">
<main>
    <div style="margin: 0 auto; max-width: 32.5rem">
        <img src="https://imagizer.imageshack.com/img923/4633/9FHz8l.png" alt="Landing page screenshot"
             style="max-width: 100%">
    </div>
    <div style="text-align: center">
        <h1 style="font-size: 1.5rem; font-weight: bold">{{ $heading }}</h1>
        <p style="font-size: 1.1rem; margin-top: 2.4rem">{{ $subHeading }}</p>
    </div>
    <div style="text-align: center; margin-top: 1rem;">
        <a href="{{ $url }}"
           style="padding: 1rem 7rem; font-size: 1rem; text-decoration: none; background-color: #0FBA68; color: #FFF; border-radius: 0.5rem; font-weight: bold">{{ $slot }}</a>
    </div>
</main>
</body>
</html>
