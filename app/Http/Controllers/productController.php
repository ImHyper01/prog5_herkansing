<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index(){
        $products = product::all();
        return view('products\products', compact('products'));
    }

    public function postProduct(Request $request, $id){
        $product = product::find($id);
        $product->name = request('name');
        $product->price = request('price');
        $product->save();
        return redirect()->route('productController');
    }
}
