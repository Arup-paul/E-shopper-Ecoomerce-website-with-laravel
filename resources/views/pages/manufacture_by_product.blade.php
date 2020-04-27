@extends('layout')



@section('content')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Features Items</h2>

    @foreach($all_product as $single_product)

    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{URL::to($single_product->product_image)}}" height="250px" alt="" />
                        <h2>{{$single_product->product_price}}BDT</h2>
                        <a href="{{URL::to('/view_product/'.$single_product->product_id)}}"><p>{{$single_product->product_name}}</p></a>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>{{$single_product->product_price}}BDT</h2>
                            <p>{{$single_product->product_name}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li>
                        <a href="#"><i class="fa fa-plus-square"></i>{{$single_product->manufacture_name}}</a>
                    </li>
                    <li><a href="{{URL::to('/view_product/'.$single_product->product_id)}}"><i class="fa fa-plus-square"></i>View Product</a></li>
                </ul>
            </div>
        </div>
    </div>

@endforeach


</div><!--features_items-->



@endsection
