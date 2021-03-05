@extends('master')
@section("content")

    <div class="container-fluid">
        <div class="row trending_wrapper">
            <div class="col-sm-2">
                <h4 href="#">Filter Products</h4>
            </div>
            <div class="col-sm-4">

                @foreach ($cartItems as $item)
                <div class="row align-items-center">
                    <div class="col-2 searched_item">
                        <a href="/details/{{$item -> id}}">
                            <img src="{{$item -> image}}" class="d-block w-100 img-fluid cart_img" alt="...">
                        </a>
                    </div>
                    <div class="col-6 searched_item">
                        <a href="/details/{{$item -> id}}">
                            <div class="">
                                <h5>{{$item -> title}}</h5>
                                <h6>{{$item -> description}}</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-4 searched_item">
                        <a href="/remove-cart/{{$item -> cart_id}}" class="btn btn-outline-danger">Remove</a>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                @endforeach

            </div>
            <div class="col-sm-2">
                <a href="/order" class="btn btn-success">Check out</a>
            </div>
        </div>
    </div>

@endsection
