<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Cart;
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
}
