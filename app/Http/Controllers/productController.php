<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class productController extends Controller
{
    //
    function index() {
        $productData = Product::all();
        return View('product', ['products' => $productData]);
    }

    function details($id) {
        $productData = Product::find($id);
        return View('details', ['product' => $productData]);
    }

    function search(Request $req) {
        //$productData = Product::find($id);
        return $req -> input();
    }
}
