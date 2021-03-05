<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
