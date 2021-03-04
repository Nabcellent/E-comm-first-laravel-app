@extends('master')
@section("content")

    <div class="container-fluid">
        <div class="row trending_wrapper">
            <div class="col-sm-4">
                <a href="#">Filter Products</a>
            </div>
            <div class="col-sm-4">
                <h3>Search Result</h3>
                <div>

                    @foreach ($products as $item)
                        <div class="searched_item">
                            <a href="/details/{{$item['id']}}">
                                <img src="{{$item['image']}}" class="d-block w-100 img-fluid trending_img" alt="...">
                                <div class="">
                                    <h5>{{$item['title']}}</h5>
                                    <h6>{{$item['description']}}</h6>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection
