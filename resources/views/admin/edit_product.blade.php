@extends('admin_layout')

@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
    <a href="{{URL::to('/dashboard')}}">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li>
        <i class="icon-list"></i>
        <a href="#">Edit Product</a>
    </li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Product</h2>
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
        <form class="form-horizontal" action="{{url('/update_product/'.$product_info->product_id)}}" method="post" enctype="multipart/form-data" >
                {{csrf_field()}}
              <fieldset>



                <div class="control-group">
                    <label class="control-label" for="name">Product Name</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge" id="name" name="product_name" required="" value="{{$product_info->product_name}}">
                    </div>
                  </div>




                  <div class="control-group hidden-phone">
                      <label class="control-label" for="description">Product Long Description</label>
                      <div class="controls">
                        <textarea class="cleditor" id="description" name="product_long_description" required="" rows="3">
                            {{$product_info->product_long_description}}
                        </textarea>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="name">Product Price</label>
                      <div class="controls">
                        <input type="text" class="input-xlarge" id="name" name="product_price" required="" value="{{$product_info->product_price}}"">
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="name">Product image</label>
                      <div class="controls">
                      <img src="{{asset($product_info->product_image)}}" height="200px" width="200px" alt="image">
                        <input type="file" class="input-xlarge" id="name" name="product_image"  >
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="name">Product Size</label>
                      <div class="controls">
                        <input type="text" class="input-xlarge" id="name" name="product_size" required="" value="{{$product_info->product_size}}">
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="name">Product Color</label>
                      <div class="controls">
                        <input type="text" class="input-xlarge" id="name" name="product_color" required="" value="{{$product_info->product_color}}">
                      </div>
                    </div>


                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Update Product</button>
                  <button type="reset" class="btn">Cancel</button>
                </div>
              </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection
