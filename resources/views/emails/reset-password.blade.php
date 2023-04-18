<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;900&display=swap" rel="stylesheet">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        font-size: 10px;
    }
</style>
<body style="font-family: Inter, sans-serif; height: 100vh; position: relative">
<main style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
    <div style="text-align: center">
        <img src="{{ asset("email/landing.png") }}" alt="Landing page screenshot"
             style="max-width: 52rem">
    </div>
    <div style="text-align: center; margin-top: 4.8rem">
        <h1 style="font-weight: bold; font-size: 2.5rem;">Reset password</h1>
        <p style="font-size: 1.8rem; margin-top: 2.4rem">click this button to verify your email</p>
    </div>
    <div style="text-align: center; margin-top: 4.8rem">
        <a href="{{ route('password.reset', ["token" => $token]) }}"
           style="padding: 1.5rem 11.5rem; font-size: 1.6rem; text-decoration: none; background-color: #0FBA68; color: #FFF; border-radius: .8rem; font-weight: bold">RESET
            PASSWORD</a>
    </div>
</main>

</body>
</html>
