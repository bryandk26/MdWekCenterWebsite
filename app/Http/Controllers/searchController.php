<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class searchController extends Controller
{
    public function searchPage(Request $request)
    {
        $products = Product::all();
        
        $searching = $request->get('searching');
        $category=$request->get('category');
        
        $products = Product::where("product_title", "LIKE", "%$searching%")->where("product_category", "=", $category)->paginate(6);

        // if($searching != null && $category != null){
        // $products = Product::where("product_title", "LIKE", "%$searching%")->where("product_category", "=", $category)->paginate(6);

        // }

        // dd($viewProduct);
        return view('searchproduct', compact('products'));

    }
}
