<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function salesView($id)
    {
        $products = DB::table('products')->select("*", DB::raw("CONCAT(products.productName,'   $',products.productPrice) AS precioProducto"))->get();
        return view('sales.sale', compact('id', 'products'));
    }

    public function store(Request $request)
    {
        $arrayProducts = Product::all();
        $listaArreglo = null;
        $arraySales = json_decode($request->arrayCarrito, true);

        foreach ($arraySales as $row => $innerArray) {
            foreach ($innerArray as $innerRow => $value) {
                $products = $value['producto'];
                $productName = $value['productoNombre'];
                $quantity = $value['cantidad'];

                $splitProductPrice = str_replace("$", ',', $productName);
                $productPrice = preg_split("/\,/", $splitProductPrice);
                $precio = $productPrice[1] * $quantity;

                $listaArreglo[] = ['id' => $products, 'producto' => $productName, 'cantidad' => $quantity, 'totalPrice' => number_format($precio)];
            }
        }

        return print_r($listaArreglo);
    }
}
