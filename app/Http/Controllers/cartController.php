<?php

namespace App\Http\Controllers;

use App\Models\headerTemp;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    public function addCart(Request $request)
    {
        TransactionHeader::create([
            'quantity' => $request['quantity'],
            'user_id' => Auth::user()->id,
            'product_id' => $request['product_id'],
        ]);

        return redirect('home');
    }

    public function viewCart(){
        $user = Auth::user();
        
        $carts=TransactionHeader::where('user_id',Auth::user()->id)->get();
        return view('viewCart',['carts'=>$carts]);

        return redirect()->back();
    }
    
    function deleteCart($id){
        $user=TransactionHeader::where('id','=',$id)->delete();
        return redirect('viewCart');
    }

    public function checkout()
    {
        $carts = TransactionHeader::where('user_id', Auth::user()->id)->get();

        if (count($carts) >= 1) {
            $transact = new headerTemp();
            $transact->user_id = Auth::id();
            $transact->save();

            foreach ($carts as $cart) {
                $detail = new TransactionHeader();
                $detail->transaction_id = $transact->id;
                $detail->product_id = $cart->productId;
                $detail->quantity = $cart->quantity;
                $detail->user_id = Auth::id();
                $detail->save();
                TransactionHeader::create($detail);
                // $cart->deleteCart();
            }

            return redirect('home',compact('carts'));
        }

        return redirect()->back();
    }

    public function transaction()
    {
        $user = Auth::user();

        $trans = headerTemp::where('user_id', $user->id)->latest()->get();
        return view('transaction', ['trans' => $trans]);

        return redirect()->back();
    }
}
