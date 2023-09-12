<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class productDetailController extends Controller
{
    public function detailTrans($id)
    {
        $viewProduct = Product::where('products.id','=',$id)->get();
        return view('productdetail', compact('viewProduct'));
    }
}
