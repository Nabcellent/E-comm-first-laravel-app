@extends('master')
@section("content")

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-5">
                <table class="table">
                    <thead>
                    <tr>
                        <th colspan="2" class="text-center"><h4>Order Summary</h4></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">Amount</th>
                        <td>KSH - {{$orderTotal}}/-</td>
                    </tr>
                    <tr>
                        <th scope="row">Tax</th>
                        <td>KSH - 0</td>
                    </tr>
                    <tr>
                        <th scope="row">Delivery</th>
                        <td>KSH - 10/-</td>
                    </tr>
                    <tr>
                        <th scope="row">Total Amount</th>
                        <td>KSH - {{$orderTotal + 10}}/-</td>
                    </tr>
                    </tbody>
                </table>
                <div>
                    <form action="/checkout" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea name="address" class="form-control" placeholder="Enter your address"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="payment">Payment Method</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="online" name="payment_method" class="custom-control-input" value="online">
                                <label class="custom-control-label" for="online">Online Payment</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="mpesa" name="payment_method" class="custom-control-input" value="m-pesa">
                                <label class="custom-control-label" for="mpesa">M-pesa</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="delivery" name="payment_method" class="custom-control-input" value="on delivery">
                                <label class="custom-control-label" for="delivery">Payment On delivery</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
