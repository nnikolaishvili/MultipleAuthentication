<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LeadRebel</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<header>
    <nav class="header-logo-options">
        <ul>
            <li>
                <img id="logo" onclick="window.location.href='/'" src="{{ asset('img/logo/logo2x.png') }}" alt="logo image">
            </li>
            <li><a href="#">Solution</a></li>
            <li><a href="#">Price</a></li>
            <li><a href="#">Case Studios</a></li>
            <li><a href="#">Blog</a></li>
        </ul>
    </nav>
    <nav class="header-buttons">
        <ul>
            <button class="nav-button login" onclick="window.location.href='login'">Log In</button>
        </ul>
        <ul>
            <button class="nav-button signup" onclick="window.location.href='register'">Sign Up Free</button>
        </ul>
    </nav>
</header>
@yield('content', view('main-page-content'))
</body>
</html>
