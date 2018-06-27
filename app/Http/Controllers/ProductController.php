<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index_advanced()
    {
        $result['products'] = Product::orderBy('name', 'asc')->paginate(25);
        return view('products.index_advanced', $result);
    }

    public function change_price(Request $request)
    {
        $product = Product::find($request->id);
        if($product){
            $product->price = $request->price;
            $product->save();
        }
        return response()->json(['ok'], 200);
    }
}
