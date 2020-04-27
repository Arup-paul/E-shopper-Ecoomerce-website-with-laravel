<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class SliderController extends Controller
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

    public function index(){
        $this->AdminAuthCheck();
        return view('admin.add_slider');
    }

    public function saveSlider(Request $request){
        $data = array();
        $data['slider_title']=$request->slider_title;
        $data['slider_subtitle']=$request->slider_subtitle;
        $data['slider_description']=$request->slider_description;
        $data['publication_status']=$request->publication_status;

        $image = $request->file('slider_image');
        if($image){
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $uploaded_path='slider/';
            $image_url = $uploaded_path.$image_full_name;
            $success=$image->move($uploaded_path,$image_full_name);
            if($success){
                $data['slider_image']=$image_url;

                DB::table('sliders')->insert($data);
                Session::put('msg','Slider added Succesfully !');
                return Redirect::to('/add_slider');
            }
        }
        $data['slider_image']='';
        DB::table('sliders')->insert($data);
        Session::put('msg','slider added Succesfully without image !');
        return Redirect::to('/add-slider');

  }




  public function allSlider(){
    $this->AdminAuthCheck();
    $all_slider = DB::table('sliders')
                  ->get();

         $manage_slider =  view('admin.all_slider')
          ->with('all_slider',$all_slider);

       return view('admin_layout')
                ->with('admin.all_slider',$manage_slider);
}

public function activeSlider($slider_id){

    DB::table('sliders')
       ->where('slider_id',$slider_id)
       ->update(['publication_status' => 1]);
       Session::put('msg','Slider active Succesfully');
       return Redirect::to('/all_slider');
}

public function unactiveSlider($slider_id){

    DB::table('sliders')
       ->where('slider_id',$slider_id)
       ->update(['publication_status' => 0]);
       Session::put('msg','Slider unactive Succesfully');
       return Redirect::to('/all_slider');
}
public function deleteSlider($slider_id){
    DB::table('sliders')
       ->where('slider_id',$slider_id)
       ->delete();
       Session::get('msg','Slider Deleted Succesfully!');
       return Redirect::to('/all_slider');
}



}
