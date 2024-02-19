<?php

namespace App\Http\Controllers;

use App\Models\Clothes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index(Request $request){
        $clothess = Clothes::paginate(5);

        if($request->search){
            $clothess = Clothesk::where('product_name', 'LIKE', '%'. $request->search . '%')
            ->paginate(5);
        }

        return view('home', compact('clothess'));
    }


    public function cart(){
        return view('cart');
    }
    
    public function addtoCart(Request $request, Clothes $clothes){
        $clothes = Clothes::find($clothes->id);
        $user = User::all();

        $cart = session()->get('cart');

        $cart[$clothes->id]=[
            "product_name" => $clothes->title,
            "quantity" => $request->quantity,
            "brand" => $clothesk->brand,
            "price" => $clothes->price
        ];

        session()->put('cart',$cart);

        return redirect()->back()->with('success','Item added to cart successfully!',compact('user'));
    }

    public function deleteCart(){
        session()->forget('cart');
        
        return redirect()->back();
    }
}
