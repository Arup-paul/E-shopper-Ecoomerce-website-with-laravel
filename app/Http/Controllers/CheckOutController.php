<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use Cart;
use Session;
session_start();

class CheckOutController extends Controller
{
    //

    public function loginCheck(){
        return view('pages.login');
    }
    public function userLogout(){
        Session::flush();
        return Redirect::to('/');
    }

    public function customerRegistration(Request $request){
          $data = array();
          $data['customer_name'] = $request->customer_name;
          $data['customer_email'] = $request->customer_email;
          $data['customer_password'] =md5($request->customer_password);
          $data['customer_mobile'] = $request->customer_mobile;


    $customer_id = DB::table('customers')
                    ->insertGetId($data);

                 Session::put('customer_id',$customer_id);
                 Session::put('customer_name',$request->customer_name);
                 return Redirect('/checkout');


    }
    public function userlogin(Request $request)
    {

        $customer_email=$request->customer_email;
        $customer_password=md5($request->customer_password);
        $result = DB::table('customers')
                  ->where('customer_email',$customer_email)
                  ->where('customer_password',$customer_password)
                  ->first();

                //   echo "<pre>";
                //   print_r($result);
                //   echo "</pre>";

                  if($result){
                     Session::put('customer_name',$result->customer_name);
                     Session::put('customer_id',$result->customer_id);
                     return Redirect::to('/checkout');
                  }else{
                      Session::put('msg',"Email Or password Invalid!");
                      return Redirect::to('/login-check');
                  }


    }

    public function saveShippingDetails(Request $request){
            $data = array();
            $data['shipping_name'] = $request->shipping_name;
            $data['shipping_first_name'] = $request->shipping_first_name ;
            $data['shipping_last_name'] = $request->shipping_last_name ;
            $data['shipping_address_name'] = $request->shipping_address_name;
            $data['shipping_mobile_name'] = $request->shipping_mobile_name;
            $data['shipping_city'] = $request->shipping_city;

           $shipping_id = DB::table('shipping')
                ->insertGetId($data);
                Session::put('shipping_id',$shipping_id);
                return Redirect::to('/payment');




    }
    public function payment(){
        $all_published_category = DB::table('category')
        ->where('publication_status',1)
        ->get();
          $manage_published_category = view('pages.payment')
           ->with('all_published_category',$all_published_category);
           return view('layout')
           ->with('pages.payment',$manage_published_category);
    }

    public function checkout(){
        return view('pages.checkout');
    }

    public function orderPlace(Request $request){
         $payment_method = $request->payment_method;

         $pdata = array();
         $pdata['payment_method'] = $payment_method;
         $pdata['payment_status'] ='pending';

         $payment_id = DB::table('payment')
             ->insertGetId($pdata);

         $odata = array();
         $odata['customer_id'] = Session::get('customer_id');
         $odata['shipping_id'] = Session::get('shipping_id');
         $odata['payment_id'] = $payment_id;
         $odata['order_total'] = Cart::total();
         $odata['order_status'] = 'pending';

         $order_id =  DB::table('order')
                   ->insertGetId($odata);

         $contents = Cart::content();
         $oddata = array();

         foreach($contents as $v_content)
         {
            $oddata['order_id'] = $order_id;
            $oddata['product_id'] = $v_content->id;
            $oddata['product_name'] = $v_content->name;
            $oddata['product_price'] = $v_content->price;
            $oddata['product_sales_quantity'] = $v_content->qty;

            DB::table('order_details')
                     ->insert($oddata);
         }
         if($payment_method =='handcash'){
            Cart::destroy();
            Return Redirect::to('/handcash');

         }elseif($payment_method =='card'){
            echo "Succesfully done card";
         }elseif($payment_method =='paypal'){
            echo "Succesfully done paypal";
         }else{
             echo "no selected";
         }



        }


        public function handcash(){
            return view('pages.handcash');
        }




    }

