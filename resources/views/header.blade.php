<?php

use App\Http\Controllers\ProductController;

$total = 0;

if(Session::has('user')) {
    $total = ProductController::cartItem();
}

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">Suf-Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link" href="/">Home </a></li>
                <li class="nav-item"><a class="nav-link" href="#">Orders</a></li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-flex">
                    <form action="/search" class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2 search_box" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0 search_btn" type="submit">Search</button>
                    </form>
                </li>
                <li class="nav-item"><a class="nav-link" href="/cart">Cart({{$total}})</a></li>

                @if(Session::has('user'))

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Session::get('user')['name']}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/sign-out">Sign Out</a>
                    </div>
                </li>

                @else
                    <li class="nav-item"><a class="nav-link" href="/login">Sign In</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
