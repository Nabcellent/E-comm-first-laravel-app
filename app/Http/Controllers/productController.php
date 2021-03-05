<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;

class productController extends Controller
{
    //
    function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $productData = Product::all();
        return View('product', ['products' => $productData]);
    }

    function details($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $productData = Product::find($id);
        return View('details', ['product' => $productData]);
    }

    function search(Request $req): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $productData = Product::where(
            'title', 'like', '%' . $req -> input('search'
            ) . '%') -> get();
        return view('/search', ['products' => $productData]);
    }

    function addToCart(Request $req): String {
        if($req -> session() -> has('user')) {
            $cart = new Cart;
            $cart -> user_id = $req -> session() -> get('user')['id'];
            $cart -> product_id = $req -> product_id;
            $cart -> save();

            return redirect('/');
        } else {
            return redirect('/login');
        }
    }

    static function cartItem() {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId) -> count();
    }

    function cart(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $userId = Session::get('user')['id'];
        $cartItems = DB::table('cart')
            -> join('products', 'cart.product_id', '=', 'products.id')
            -> where('cart.user_id', $userId)
            -> select('products.*', 'cart.id as cart_id')
            -> get();

        return view('/cart', ['cartItems' => $cartItems]);
    }

    function removeCart($id): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        Cart::destroy($id);
        return redirect('/cart');
    }

    function order(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $userId = Session::get('user')['id'];
        $orderTotal = DB::table('cart')
            -> join('products', 'cart.product_id', '=', 'products.id')
            -> where('cart.user_id', $userId)
            -> select('products.*', 'cart.id as cart_id')
            -> sum('products.price');

        return view('/order', ['orderTotal' => $orderTotal]);
    }

    function checkout(Request $req) {
        $userId = Session::get('user')['id'];
        $cartItems = Cart::where('user_id', $userId) -> get();

        foreach($cartItems as $item) {
            $order = new Order;
            $order -> user_id = $item['user_id'];
            $order -> product_id = $item['product_id'];
            $order -> status = 'pending';
            $order -> payment_method = $req -> payment_method;
            $order -> payment_status = 'pending';
            $order -> address = $req -> address;
            $order -> save();

            Cart::where('user_id', $userId) -> delete();
        }

        return redirect('/');
    }

    function myOrders(Request $req) {
        $userId = Session::get('user')['id'];
        $orders = DB::table('orders')
            -> join('products', 'orders.product_id', '=', 'products.id')
            -> where('orders.user_id', $userId)
            -> get();

        return view('/myorders', ['myOrders' => $orders]);
    }
}
