<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Suf-Store</title>

    {{--    BOOTSTRAP CSS    --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    {{--    MY CSS    --}}
    <style>
        body {
            background-color: #cbd5e0;
        }
        img.slider_img {
            height: 30rem;
            object-fit: cover;
        }
        .carousel-caption {
            background-color: #12324470;
        }
        .trending_wrapper > .col > div {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            grid-gap: 2rem;
            padding: 0 20rem;
        }
        img.trending_img {
            width: 100%;
            height: 15rem;
        }
        img.details_img {
            height: 25rem;
            object-fit: cover;
        }
        .search_btn,
        .search_box {
            height: 2rem;
        }
        .search_btn {
            padding: .2rem .5rem;
        }
    </style>
</head>
<body>

{{View::make('header')}}
@yield('content')
{{View::make('footer')}}



{{--    JQUERY    --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

{{--    BOOTSTRAP JS    --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>
