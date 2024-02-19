<?php

namespace App\Http\Controllers;

use App\Models\Clothes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClothesController extends Controller
{
    //
    public function index(){

        $clothess = Clothes::all();

        return view('clothes.index', compact('clothess'));
    }

    public function store(Request $request){
        // dd($request->all());
        $validate = $request->validate([
            'product_name' =>'required',
            'brand' =>'required',
            'description' =>'required',
            'price' =>'required|integer',
            'cover' =>'required|max:10000|image',
        ]);


        $file = $request->file('cover');
        $imageName = time().".".$file->getClientOriginalExtension();
        Storage::putFileAs('public/', $file, $imageName);

        Clothes::create([
            'product_name'=> $request->product_name,
            'brand' => $request->brand,
            'description' => $request->description,
            'price' => $request->price,
            'cover' => $imageName,
        ]);

        return redirect()->back();
    }

    public function show(Clothes $clothes){
        $clothes = Clothes::find($clothes->id);
        return view('clothes.update', compact('clothes'));
    }

    public function update(Request $request, Clothes $clothes){
        $validate = $request->validate([
            'product_name'=>'required',
            'brand'=>'required',
            'description'=>'required',
            'price'=>'required|integer',
            'cover'=>'required|max:10000|image',
        ]);

        $file = $request->file('cover');

        if($file){
            $imageName = time().".".$file->getClientOriginalExtension();
            Storage::putFileAs('public/', $file, $imageName);
        }


        Clothes::find($clothes->id)->update([
            'product_name' => $request->product_name,
            'brand' => $request->brand,
            'description' => $request->description,
            'price' => $request->price,
            'cover' => $imageName,
        ]);


        return redirect()->back();
    }

    public function destroy(Clothes $clothes){
        Clothes::where('id', $clothes->id)->delete();
        return redirect()->back();
    }

}
