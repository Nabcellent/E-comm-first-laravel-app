@extends('master')
@section("content")

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="{{$product['image']}}" alt="" class="details_img">
            </div>
            <div class="col-sm-6">
                <a href="/">Continue Shopping</a>
                <h2>{{$product['title']}}</h2>
                <h3>Price: {{$product['price']}}</h3>
                <h4>Category: {{$product['category']}}</h4>
                <h4>Description: {{$product['description']}}</h4><br><br>
                <form action="/add-cart" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product['id']}}">
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
                <button class="btn btn-success mt-2">Buy Now</button>
            </div>
        </div>
    </div>

@endsection
