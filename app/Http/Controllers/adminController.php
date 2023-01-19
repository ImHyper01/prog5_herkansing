<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class adminController extends Controller
{
    public function index(){
        $products = product::all();
        return view('beheerder\admin', compact('products'));
    }

    public function status(Request $request)
    {
        $request->validate([
            'status'=>'boolean'
        ]);

        $product = product::find(request('id'));
        $product->status = request('status');
        $product->save();

        return redirect()->route('admin');
    }
}
