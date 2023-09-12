<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class insertProductController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'category' => ['required', 'string'],
            'title' => ['required', 'string', 'min:5', 'max:25'],
            'description' => ['required', 'string', 'min:10', 'max:100'],
            'price' => ['required', 'min:1000', 'max:10000000'],
            'stock' => ['required', 'min:1'],
            'image' => ['required'],
        ]);
    }

    public function insertProd()
    {
        return view('insertproduct');
    }

    protected function create(Request $request)
    {
        $image = $request -> file('image');
        $image_name = time(). $image -> getClientOriginalExtension();
        Storage::putFileAs('public\Images',$image,$image_name);
        $image_path = 'Images/'.$image_name;

        Product::create([
            'product_category' => $request['category'],
            'product_title' => $request['title'],
            'product_description' => $request['description'],
            'product_price' => $request['price'],
            'product_stock' => $request['stock'],
            'product_image' => $image_path,
            
        ]);
        $viewProduct = Product::all();
        return redirect('home');
    }


}
