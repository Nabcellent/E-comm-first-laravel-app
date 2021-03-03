@extends('master')
@section("content")

    <div class="container">
        <div class="row vh-100 d-flex justify-content-center align-items-center">
            <div class="col-sm-4">
                <form action="/login" method="POST">
                    <div class="form-group">
                        @csrf
                        <label>Email address</label>
                        <input type="email" class="form-control" name="email" aria-label>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" aria-label>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </form>
            </div>
        </div>
    </div>

@endsection
