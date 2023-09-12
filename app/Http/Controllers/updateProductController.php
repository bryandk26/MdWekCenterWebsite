<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class updateProductController extends Controller
{

    protected function update(Request $request)
    {
       

        $image = $request -> file('image');

        if($image != null){
        $image_name = time(). $image -> getClientOriginalExtension();
        Storage::putFileAs('public\Images',$image,$image_name);
        $image_path = 'Images/'.$image_name;
        }
        else{
            $image_path = $request['imageProduct'];
        }

        Product::where('products.id','=', $request['idProduct'])->update([
            'product_category' => $request['category'],
            'product_title' => $request['title'],
            'product_description' => $request['description'],
            'product_price' => $request['price'],
            'product_stock' => $request['stock'],
            'product_image' => $image_path,
        ]);

        return redirect('home');
        // $viewProduct = Product::all();
        // return view('home', compact('viewProduct'));
    }

    public function updateProduct($id)
    {
        $updateProduct = Product::where('products.id','=',$id)->get();
        return view('updateproduct', compact('updateProduct'));
    }
}
