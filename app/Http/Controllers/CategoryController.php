<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //add
        $this->AdminAuthCheck();
        return view('admin.add_category');
    }

    public function AdminAuthCheck(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return;
        }else{
            return Redirect::to('/admin')->send( );
        }
   }

    public function allCategory(){
        $this->AdminAuthCheck();

        $all_category = DB::table('category')->get();
             $manage_category =  view('admin.all_category')
             ->with('all_category',$all_category);

           return view('admin_layout')
                    ->with('admin.all_category',$manage_category);
    }

    public function saveCategory(Request $request){
         $data  = array();
         $data['category_id'] = $request->category_id;
         $data['category_name'] = $request->category_name;
         $data['category_description'] = $request->category_description;
         $data['publication_status'] = $request->publication_status;

         DB::table('category')->insert($data);
         Session::put('msg','Category Added Succesfully');
         return Redirect::to('/add_category');
    }


    public function unactiveCategory($category_id){

        DB::table('category')
                  ->where('category_id',$category_id)
                  ->update(['publication_status' => 0]);
                  Session::put('msg','Category Unactive Succesfully');
                  return Redirect::to('/all_category');
    }
    public function activeCategory($category_id){

                  DB::table('category')
                  ->where('category_id',$category_id)
                  ->update(['publication_status' => 1 ]);
                  Session::put('msg','Category Active Succesfully');
                  return Redirect::to('/all_category');
    }

    public function editCategory($category_id){
        $this->AdminAuthCheck();

        $category_info = DB::table('category')
             ->where('category_id',$category_id)
             ->first();
            $category_info =view('admin.edit_category')
                            ->with('category_info',$category_info);

             return view('admin_layout')
                        ->with('admin.edit_category',$category_info);
    }

    public function updateCategory(Request $request,$category_id){
             $data = array();
             $data['category_name'] = $request->category_name;
             $data['category_description'] = $request->category_description;

             DB::table('category')
                  ->where('category_id',$category_id)
                  ->update($data);

                  Session::get('msg','Category Update Succesfully');
                  return Redirect::to('/all_category');

            }

     public function deleteCategory($category_id){
          DB::table('category')
             ->where('category_id',$category_id)
             ->delete();
             Session::get('msg','Category Deeted Succesfully!');
             return Redirect::to('/all_category');
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
