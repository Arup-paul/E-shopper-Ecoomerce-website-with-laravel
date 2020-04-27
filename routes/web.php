<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//home controller
Route::get('/','HomeController@index');



//show category wise product fronted page
Route::get('/product_by_category/{category_id}','HomeController@ShowProductByCategory');
Route::get('/product_by_manufacture/{manufacture_id}','HomeController@ShowProductByManaufacture');
Route::get('/view_product/{product_id}','HomeController@ProductDetailsById');
Route::post('/add_to_cart','AddCartController@AddCart');
Route::get('/show_cart','AddCartController@ShowCart');
Route::get('/deletetocart/{rowId}','AddCartController@Deletetocart');
Route::post('/updtecart','AddCartController@updtecart');

//checkout controller

Route::get('/login-check','CheckOutController@loginCheck');
Route::get('/checkout','CheckOutController@checkout');
Route::post('/customer_registration','CheckOutController@customerRegistration');
Route::get('/user_logout','CheckOutController@userLogout');
Route::post('/userlogin','CheckOutController@userlogin');
Route::post('/save-shipping-details','CheckOutController@saveShippingDetails');
Route::get('/payment','CheckOutController@payment');
Route::post('/order-place','CheckOutController@orderPlace');
Route::get('/handcash','CheckOutController@handcash');















//backend
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin','AdminController@index');
Route::get('/dashboard','SuperAdminController@index');
Route::post('/admin_dashboad','AdminController@dashboard');



//category related route

Route::get('/add_category','CategoryController@index');
Route::get('/all_category','CategoryController@allCategory');
Route::post('/save_category','CategoryController@saveCategory');
Route::get('/edit_category/{category_id}','CategoryController@editCategory');
Route::post('/update_category/{category_id}','CategoryController@updateCategory');
Route::get('/delete_category/{category_id}','CategoryController@deleteCategory');
Route::get('/unactive_category/{category_id}','CategoryController@unactiveCategory');
Route::get('/active_category/{category_id}','CategoryController@activeCategory');


//manufacture related route

Route::get('/add_manufacture','ManufactureController@index');
Route::get('/all_manufacture','ManufactureController@allManufacture');
Route::post('/save_manufacture','ManufactureController@saveManufacture');
Route::get('/edit_manufacture/{manufacture_id}','ManufactureController@editManufacture');
Route::post('/update_manufacture/{manufacture_id}','ManufactureController@updateManufacture');
Route::get('/delete_manufacture/{manufacture_id}','ManufactureController@deleteManufacture');
Route::get('/unactive_manufacture/{manufacture_id}','ManufactureController@unactiveManufacture');
Route::get('/active_manufacture/{manufacture_id}','ManufactureController@activeManufacture');


//Product related route

Route::get('/add_product','ProductController@index');
Route::get('/all_product','ProductController@allProduct');
Route::post('/save_product','ProductController@saveProduct');
Route::get('/edit_product/{product_id}','ProductController@editProduct');
Route::post('/update_product/{product_id}','ProductController@updateProduct');
Route::get('/delete_product/{product_id}','ProductController@deleteProduct');
Route::get('/unactive_product/{product_id}','ProductController@unactiveProduct');
Route::get('/active_product/{product_id}','ProductController@activeProduct');


//Slider Related Route

Route::get('/add_slider','SliderController@index');
Route::get('/all_slider','SliderController@allSlider');
Route::post('/save_slider','SliderController@saveSlider');
Route::get('/delete_slider/{slider_id}','SliderController@deleteSlider');
Route::get('/unactive_slider/{slider_id}','SliderController@unactiveSlider');
Route::get('/active_slider/{slider_id}','SliderController@activeSlider');



//order


Route::get('/manage_order','OrderController@manageOrder');
Route::get('/view_order/{order_id}','OrderController@viewOrder');
Route::get('/delete_order/{order_id}','OrderController@deleteOrder');
