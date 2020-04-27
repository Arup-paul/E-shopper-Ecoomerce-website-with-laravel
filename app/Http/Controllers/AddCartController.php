<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use Cart;
use Session;
session_start();


class AddCartController extends Controller
{
    //

    public function AddCart(Request $request){
        $qty = $request->qty;
        $product_id = $request->product_id;
         $product_info = DB::table('products')
                        ->where('product_id',$product_id)
                        ->first();

           $data['qty'] = $qty;
           $data['id'] = $product_info->product_id;
           $data['name'] = $product_info->product_name;
           $data['price'] = $product_info->product_price;
           $data['options']['image'] = $product_info->product_image;

           Cart::add($data);
           return Redirect::to('/show_cart');


    }



public function ShowCart(){
     $all_published_category = DB::table('category')
                                ->where('publication_status',1)
                                ->get();
       $manage_published_category = view('pages.add_to_cart')
                                   ->with('all_published_category',$all_published_category);
                                   return view('layout')
                                   ->with('pages.add_to_cart',$manage_published_category);

}

public function Deletetocart($rowId){
    Cart::update($rowId,0);
    return Redirect::to('/show_cart');
}

public function updtecart(Request $request){
     $qty = $request->qty;
     $rowId = $request->rowId;

     Cart::update($rowId,$qty); 
    return Redirect::to('/show_cart');


}


}
