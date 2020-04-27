<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use Cart;
use Session;
session_start();

class OrderController extends Controller
{
    //

    public function AdminAuthCheck(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return;
        }else{
            return Redirect::to('/admin')->send( );
        }
   }

    public function manageOrder(){
        $this->AdminAuthCheck();
        $all_order_info = DB::table('order')
                      ->join('customers','order.customer_id','=','customers.customer_id')
                      ->select('order.*','customers.customer_name')
                      ->get();

             $manage_order =  view('admin.manage_order')
             ->with('manage_order',$all_order_info);

           return view('admin_layout')
                    ->with('admin.manage_order',$manage_order);
    }




    public function viewOrder($order_id){
        $this->AdminAuthCheck();
        $orderbyid = DB::table('order')
                      ->join('customers','order.customer_id','=','customers.customer_id')
                      ->join('order_details','order.order_id','=','order_details.order_id')
                      ->join('shipping','order.shipping_id','=','shipping.shipping_id')
                      ->select('order.*','order_details.*','customers.*','shipping.*')
                      ->get();

                    //   echo "<pre>";
                    //   print_r($orderbyid);
                    //   echo "</pre>";

             $order_details =  view('admin.view_order')
             ->with('order_details',$orderbyid);

           return view('admin_layout')
                    ->with('admin.view_order',$order_details);
    }

    public function deleteOrder($order_id){
        DB::table('order')
           ->where('order_id',$order_id)
           ->delete();
           Session::get('msg','Order Deleted Succesfully!');
           return Redirect::to('/manage_order');
   }






















}
