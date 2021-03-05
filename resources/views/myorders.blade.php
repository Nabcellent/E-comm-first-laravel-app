@extends('master')
@section("content")

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-5">
                <h4 href="#">My Orders</h4>

                @foreach ($myOrders as $item)
                    <div class="row align-items-center">
                        <div class="col-2 searched_item">
                            <a href="/details/{{$item -> id}}">
                                <img src="{{$item -> image}}" class="d-block w-100 img-fluid cart_img" alt="...">
                            </a>
                            {{$item -> title}}
                        </div>
                        <div class="col-5 searched_item">
                            <a href="/details/{{$item -> id}}">
                                <div class="">
                                    <h6>Description: {{$item -> description}}</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-5">
                            <h6>Delivery Status: {{$item -> status}}</h6>
                            <h6>Payement Status: {{$item -> payment_status}}</h6>
                            <h6>Payement method: {{$item -> payment_method}}</h6>
                            <h6>Address: {{$item -> address}}</h6>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                @endforeach

            </div>
        </div>
    </div>

@endsection
