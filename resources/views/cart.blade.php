@extends('master')
@section("content")

    <div class="container-fluid">
        <div class="row trending_wrapper">
            <div class="col-sm-2">
                <a href="#">Filter Products</a>
            </div>
            <div class="col-sm-10">

                    @foreach ($cartItems as $item)
                        <div class="row align-items-center">
                            <div class="col-1 searched_item">
                                <a href="/details/{{$item -> id}}">
                                    <img src="{{$item -> image}}" class="d-block w-100 img-fluid cart_img" alt="...">
                                </a>
                            </div>
                            <div class="col-3 searched_item">
                                <a href="/details/{{$item -> id}}">
                                    <div class="">
                                        <h5>{{$item -> title}}</h5>
                                        <h6>{{$item -> description}}</h6>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3 searched_item">
                                <a href="#" class="btn btn-outline-danger">Remove</a>
                            </div>
                        </div>
                    <div class="col-6 dropdown-divider"></div>
                @endforeach

            </div>
        </div>
    </div>

@endsection
