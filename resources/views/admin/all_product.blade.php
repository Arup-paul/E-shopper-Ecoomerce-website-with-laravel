@extends('admin_layout')

@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
    <a href="{{URL::to('/dashboard')}}">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">All Product</a></li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Product</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <h2 class=" alert-success" style=" font-size: 18px;text-align: center; ">
                <?php

                $msg = Session::get('msg');
                if (isset($msg)) {
                    echo $msg;
                    Session::put('msg',' ');
                }


             ?>
            </h2>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th>SL No</th>
                      <th>Product Name</th>
                      <th>Product Image</th>
                      <th>Product Price</th>
                      <th>Product Category</th>
                      <th>Brand Name</th>
                      <th>Status</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($all_product as $product_item)
                <tr>
                    <td>{{$product_item->product_id}}</td>
                    <td>{{$product_item->product_name}}</td>
                    <td><img src="{{$product_item->product_image}}" alt="image" height="200px" width="200px"></td>
                    <td>{{$product_item->product_price}}</td>
                    <td>{{$product_item->category_name}}</td>
                    <td>{{$product_item->manufacture_name}}</td>
                    <td class="center">
                        @if($product_item->publication_status==1)
                            <span class="label label-success">Active</span>
                            @else
                            <span class="label label-warning">Unactive</span>

                        @endif

                    </td>
                    <td class="center">

                        @if($product_item->publication_status==1)
                    <a class="btn btn-danger" href="{{URL::to('/unactive_product/'.$product_item->product_id)}}">
                            <i class="halflings-icon white thumbs-down"></i>
                        </a>
                        @else
                        <a class="btn btn-success" href="{{URL::to('/active_product/'.$product_item->product_id)}}">
                            <i class="halflings-icon white thumbs-up"></i>
                        </a>
                        @endif


                        <a class="btn btn-info" href="{{URL::to('/edit_product/'.$product_item->product_id)}}">
                            <i class="halflings-icon white edit"></i>
                        </a>
                        <a class="btn btn-danger" href="{{URL::to('/delete_product/'.$product_item->product_id)}}" id="delete">
                            <i class="halflings-icon white trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>
    </div><!--/span-->

</div><!--/row-->

@endsection
