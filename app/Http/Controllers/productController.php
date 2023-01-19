<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Middleware\Authenticate;

class productController extends Controller
{
//producten laten zien
    public function index(){
        $products = product::all();
        return view('products\products', compact('products'));
    }

//product creeren
    public function create(){
        return view('beheerder\create');
    }

    public function postCreate(Request $request)
    {

        $request->validate([
           'name' => 'required|min:1|max:50',
           'price' => 'required|numeric|min:0|max:5000'
        ]);

        $create = new product();
        $create->name = request('name');
        $create->price = request('price');
        $create->save();
        return redirect()->route('products');
    }

//product deleten
    public function deleteProduct($id){
        $product = product::find($id);
        $product->delete();
        return redirect()->route('products');
    }

//product editen
    public function editProduct($id) {
        return view('beheerder\edit', compact('id'));
    }

    public function postProduct(Request $request, $id){
        $request->validate([

            'name' => 'required|min:1|max:50',
            'price' => 'required|numeric|min:0|max:5000'
        ]);

        $product = product::find($id);
        $product->name = request('name');
        $product->price = request('price');
        $product->save();
        return redirect()->route('products');
    }

//filters
    public function search(Request $request){
        $search_text = $request->query('search');
        $products = product::where('name', 'like', '%' . $search_text. '%')
            ->orWhere('price', 'like', '%' . $search_text . '%')->get();

        return view('products\products', compact('products'));
    }

    public function filter(Request $request){
        $filter_menu = $request->query('filter');
        $products = product::where('price', 'like', '%' . $filter_menu. '%')->get();

        return view('products\products', compact('products'));
    }







    public function buy(){
        return view('products\buy');
    }
}
