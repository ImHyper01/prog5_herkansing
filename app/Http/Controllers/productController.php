<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Middleware\Authenticate;

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


    public function create(){
        return view('beheerder\create');
    }

    public function postCreate(Request $request)
    {
        $create = new product();
        $create->name = request('name');
        $create->price = request('price');
        $create->save();
        return redirect()->route('products');
    }

}
