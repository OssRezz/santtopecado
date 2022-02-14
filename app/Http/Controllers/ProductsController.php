<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function productsView()
    {
        $products = Product::orderBy('id', 'asc')->paginate(5);
        return view('products.product', compact('products'));
    }

    public function create(Product $product, Request $request)
    {
        $request->validate([
            'product' =>  'required',
            'price' =>  'required'
        ]);
        $estado = 1;

        $product->fkStatus = $estado;
        $product->productName = $request->product;
        $product->productPrice = $request->price;

        if ($product->save()) {
            return redirect()->back()->with('message', 'The product has been registered successfully');
        } else {
            return redirect()->back()->with('message', 'The product can"t no be registered');
        }
    }
}
