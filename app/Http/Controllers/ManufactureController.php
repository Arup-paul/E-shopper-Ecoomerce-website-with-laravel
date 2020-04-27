<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class ManufactureController extends Controller
{
    //
    public function index()
    {
        //add
        $this->AdminAuthCheck();
        return view('admin.add_manufacture');
    }

    public function AdminAuthCheck(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return;
        }else{
            return Redirect::to('/admin')->send( );
        }
   }
    public function saveManufacture(Request $request){
        $data  = array();
        $data['manufacture_id'] = $request->manufacture_id;
        $data['manufacture_name'] = $request->manufacture_name;
        $data['manufacture_description'] = $request->manufacture_description;
        $data['publication_status'] = $request->publication_status;

        DB::table('manufacture')->insert($data);
        Session::put('msg','Brand Added Succesfully');
        return Redirect::to('/add_manufacture');
   }

   public function allManufacture(){
    $this->AdminAuthCheck();
    $all_manufacture = DB::table('manufacture')->get();
         $manage_manufacture =  view('admin.all_manufacture')
         ->with('all_manufacture',$all_manufacture);

       return view('admin_layout')
                ->with('admin.all_manufacture',$manage_manufacture);
}
public function unactiveManufacture($manufacture_id){

    DB::table('manufacture')
              ->where('manufacture_id',$manufacture_id)
              ->update(['publication_status' => 0]);
              Session::put('msg','Brand Unactive Succesfully');
              return Redirect::to('/all_manufacture');
}
public function activeManufacture($manufacture_id){

              DB::table('manufacture')
              ->where('manufacture_id',$manufacture_id)
              ->update(['publication_status' => 1 ]);
              Session::put('msg','Brand Active Succesfully');
              return Redirect::to('/all_manufacture');
}

public function editManufacture($manufacture_id){
    $this->AdminAuthCheck();
    $manufacture_info = DB::table('manufacture')
         ->where('manufacture_id',$manufacture_id)
         ->first();
        $manufacture_info =view('admin.edit_manufacture')
                        ->with('manufacture_info',$manufacture_info);

         return view('admin_layout')
                    ->with('admin.edit_manufacture',$manufacture_info);
}

public function updateManufacture(Request $request,$manufacture_id){
    $data = array();
    $data['manufacture_name'] = $request->manufacture_name;
    $data['manufacture_description'] = $request->manufacture_description;

    DB::table('manufacture')
         ->where('manufacture_id',$manufacture_id)
         ->update($data);

         Session::get('msg','Manufacture Update Succesfully');
         return Redirect::to('/all_manufacture');

   }

public function deleteManufacture($manufacture_id){
    DB::table('manufacture')
       ->where('manufacture_id',$manufacture_id)
       ->delete();
       Session::get('msg','Manufacture Deeted Succesfully!');
       return Redirect::to('/all_manufacture');
}



}
