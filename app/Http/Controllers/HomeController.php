<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
session_start();

class HomeController extends Controller
{
    //
    public function index(){

        $all_product = DB::table('products')
        ->join('category','products.category_id','=','category.category_id')
        ->join('manufacture','products.manufacture_id','=','manufacture.manufacture_id')
        ->select('products.*','category.category_name','manufacture.manufacture_name')
        ->where('products.publication_status',1)
        ->limit(9)
        ->get();

$manage_product =  view('pages.home_content')
->with('all_product',$all_product);

return view('layout')
      ->with('home_content',$manage_product);
        //return view('pages.home_content');
    }



  public function ShowProductByCategory($category_id){
    $product_by_category = DB::table('products')
    ->join('category','products.category_id','=','category.category_id')
    ->select('products.*','category.category_name')
      ->where('category.category_id',$category_id)
      ->where('products.publication_status',1)
    ->limit(9)
    ->get();
    $manage_product_by_category =  view('pages.category_by_product')
    ->with('all_product',$product_by_category);

    return view('layout')
          ->with('home_content',$manage_product_by_category);
            //return view('pages.home_content');
        }


  public function ShowProductByManaufacture($manufacture_id){
    $all_product = DB::table('products')
    ->join('category','products.category_id','=','category.category_id')
    ->join('manufacture','products.manufacture_id','=','manufacture.manufacture_id')
    ->select('products.*','category.category_name','manufacture.manufacture_name')
    ->where('manufacture.manufacture_id',$manufacture_id)
    ->where('products.publication_status',1)
    ->limit(9)
    ->get();

$manage_product =  view('pages.manufacture_by_product')
->with('all_product',$all_product);

return view('layout')
  ->with('home_content',$manage_product);
        }

        public function ProductDetailsById($product_id){
            $all_product = DB::table('products')
            ->join('category','products.category_id','=','category.category_id')
            ->join('manufacture','products.manufacture_id','=','manufacture.manufacture_id')
            ->select('products.*','category.category_name','manufacture.manufacture_name')
            ->where('products.product_id',$product_id)
            ->where('products.publication_status',1)
            ->first();

        $manage_product =  view('pages.product_details')
        ->with('product_details',$all_product);

        return view('layout')
          ->with('home_content',$manage_product);
                }






















}
