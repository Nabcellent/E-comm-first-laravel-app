<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
}
