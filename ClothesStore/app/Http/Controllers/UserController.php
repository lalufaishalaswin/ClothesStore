<?php

namespace App\Http\Controllers;

use App\Models\Clothes;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function showUser(){
        $users = User::all();

        return view('user.index',compact('users'));
    }

    public function deleteUser(User $user){
        User::find($user->id)->delete();

        return redirect()->back();
    }

    public function userUpdate(Request $request, User $user){
        $validate = $request->validate([
            'fullname'=> 'required',
            'email'=>'required|email|unique:users',
            'role'=> 'required|in:Buyer,Seller'
        ]);

       User::find($user->id)->update([
        'fullname' => $request->fullname,
        'email' => $request->email,
        'role' => $request->role,
       ]);
        return redirect()->back();
    }
        
    public function userDetail(User $user){
        $user = User::find($user->id);
        
        return view('user.show',compact('user'));
    }

    public function index(){
        $user = User::find(Auth::user()->id);


        return view('profile.index', compact('user'));
    }

    public function update(User $user, Request $request){

        $validate = $request->validate([
            'fullname' => 'required'
        ]);

        User::find($user->id)->update([
            'fullname' => $request->fullname
        ]);

        return redirect()->back();
    }

    public function changePassword(){
        $user = User::find(Auth::user()->id);

        return view('profile.changePassword', compact('user'));
    }

    public function updatePassword(Request $request){
        $request->validate([
            'password' => 'required',
            'new_pass' => 'required|min:8|different:current_pass',
            'new_confirm_pass'=>'same:new_pass|required',
        ]);

        if(Hash::check($request->password, auth()->user()->password)){
            User::find(auth()->user()->id)->update(['password'=>Hash::make($request->new_pass)]);
        }

        return redirect()->back();
    }

    public function transactionHistory(){
        $transactions = Transaction::where('user_id', Auth::user()->id)->get();

        return view('transactionHistory',compact('transactions'));
    }

    public function transactionDetail(Transaction $transaction){
        $transaction_details = TransactionDetail::with('clothes')->where('transaction_id', $transaction->id)->get();
     
        return view('transactionDetail',compact('transaction_details'));
    }

    public function cart(){
        return view('cart');
    }
    
    public function addtoCart(Request $request, Clothes $clothes){
        $validate = $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);

        $cart = session()->get('cart');

        $cart[$clothes->id]=[
            "product_name"=>$clothes->product_name,
            "quantity"=>$request->quantity,
            "brand"=>$clothes->brand,
            "price"=>$clothes->price
        ];

        session()->put('cart',$cart);

        return redirect()->back();
    }

    public function deleteCart(){
        session()->forget('cart');
        return redirect()->back();
    }

    public function checkout(){
        $date = new DateTime();
        $dateString = $date->format('Y-m-d-H-i-s');

        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'transactiondate' => $dateString
        ]);

        foreach (session('cart') as $id => $details){
            TransactionDetail::create([
                'clothes_id' => $id,
                'transaction_id' => $transaction->id,
                'quantity' => $details['quantity']
            ]);
        };
        session()->forget('cart');
        return redirect()->back();
    }
}
