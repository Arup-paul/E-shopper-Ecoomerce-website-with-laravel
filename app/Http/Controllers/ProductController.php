<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class ProductController extends Controller
{
    //
    public function index(){
        $this->AdminAuthCheck();
        return view('admin.add_product');
    }

    public function saveProduct(Request $request){
          $data = array();
          $data['product_name']=$request->product_name;
          $data['category_id']=$request->category_id;
          $data['manufacture_id']=$request->manufacture_id;
          $data['product_short_description']=$request->product_short_description;
          $data['product_long_description']=$request->product_long_description;
          $data['product_price']=$request->product_price;
          $data['product_size']=$request->product_size;
          $data['product_color']=$request->product_color;
          $data['publication_status']=$request->publication_status;

          $image = $request->file('product_image');
          if($image){
              $image_name = str_random(20);
              $ext = strtolower($image->getClientOriginalExtension());
              $image_full_name = $image_name.'.'.$ext;
              $uploaded_path='image/';
              $image_url = $uploaded_path.$image_full_name;
              $success=$image->move($uploaded_path,$image_full_name);
              if($success){
                  $data['product_image']=$image_url;

                  DB::table('products')->insert($data);
                  Session::put('msg','Product added Succesfully !');
                  return Redirect::to('/add_product');
              }
          }
          $data['product_image']='';
          DB::table('products')->insert($data);
          Session::put('msg','Product added Succesfully without image !');
          return Redirect::to('/add_product');

    }

    public function updateProduct(Request $request,$product_id){
        $data  = array();
        $data['product_name']   = $request->product_name;
        $data['product_long_description']   = $request->product_long_description;
        $data['product_price']   = $request->product_price;
        $data['product_size']   = $request->product_size;
        $data['product_color']   = $request->product_color;



        if($_FILES['product_image']['name']==''){
             $data['product_image']   = $request->product_image;
             DB::table('products')
                 ->where('product_id',$product_id)
                 ->update($data);
                Session::put('msg','Product Update Succesfully......');
                return Redirect::to('/all_product');
        }else{

            $file = $request->file('product_image');
            $image_name = str_random(20);
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $uploaded_path='image/';
            $image_url = $uploaded_path.$image_full_name;
            $success=$file->move($uploaded_path,$image_full_name);

            if($success){
                $data['product_image']    = $image_url;
                DB::table('products')
                 ->where('product_id',$product_id)
                 ->update($data);
                Session::put('save_post','Product Update Succesfully......');
                //unlink($request->post_image);
                return Redirect::to('/all_product');
            }else{
                $error = $file->getErrorMessage();
            }
            }



    }

    public function allProduct(){
        $this->AdminAuthCheck();
        $all_product = DB::table('products')
                      ->join('category','products.category_id','=','category.category_id')
                      ->join('manufacture','products.manufacture_id','=','manufacture.manufacture_id')
                      ->select('products.*','category.category_name','manufacture.manufacture_name')
                      ->get();

             $manage_product =  view('admin.all_product')
             ->with('all_product',$all_product);

           return view('admin_layout')
                    ->with('admin.all_product',$manage_product);
    }
    public function activeProduct($product_id){

               DB::table('products')
                  ->where('product_id',$product_id)
                  ->update(['publication_status' => 1]);
                  Session::put('msg','product active Succesfully');
                  return Redirect::to('/all_product');
    }
    public function unactiveProduct($product_id){

        DB::table('products')
                  ->where('product_id',$product_id)
                  ->update(['publication_status' => 0]);
                  Session::put('msg','product Unactive Succesfully');
                  return Redirect::to('/all_product');
    }


public function deleteProduct($product_id){
    DB::table('products')
       ->where('product_id',$product_id)
       ->delete();
       Session::get('msg','Product Deleted Succesfully!');
       return Redirect::to('/all_product');
}
public function editProduct($product_id){
    $this->AdminAuthCheck();
    $product_info = DB::table('products')
         ->where('product_id',$product_id)
         ->first();
        $product_info =view('admin.edit_product')
                        ->with('product_info',$product_info);

         return view('admin_layout')
                    ->with('admin.edit_product',$product_info);
}





public function AdminAuthCheck(){
    $admin_id = Session::get('admin_id');
    if($admin_id){
        return;
    }else{
        return Redirect::to('/admin')->send( );
    }
}













}
