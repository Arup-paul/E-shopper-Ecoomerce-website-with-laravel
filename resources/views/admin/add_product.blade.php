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
        <a href="#">Add Product</a>
    </li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
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
        <form class="form-horizontal" action="{{url('/save_product')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
              <fieldset>

                <div class="control-group">
                  <label class="control-label" for="name">Product Name</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" id="name" name="product_name" required="" placeholder="Enter a product Name">
                  </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="name">product Category </label>
                    <div class="controls">

                      <select name="category_id" id="selecteError3">
                          <option>--Select Category--</option>
                      <?php
                        $all_publish_category = DB::table('category')
                        ->where('publication_status',1)
                        ->get();
                        foreach($all_publish_category as $single_category){
                        ?>
                          <option value="{{$single_category->category_id}}">{{$single_category->category_name}}</option>
                        <?php } ?>

                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="name">Manufacture Name  </label>
                    <div class="controls">
                      <select name="manufacture_id" id="selecteError3">
                          <option>--Select Manufacture Name --</option>
                        <?php
                        $all_publish_manufacture = DB::table('manufacture')
                        ->where('publication_status',1)
                        ->get();
                        foreach($all_publish_manufacture as $single_manufacture){
                        ?>
                          <option value="{{$single_manufacture->manufacture_id}}">{{$single_manufacture->manufacture_name}}</option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                <div class="control-group hidden-phone">
                  <label class="control-label" for="description">Product Short Description</label>
                  <div class="controls">
                    <textarea class="cleditor" id="description" name="product_short_description" required="" rows="3"></textarea>
                  </div>
                </div>

                <div class="control-group hidden-phone">
                    <label class="control-label" for="description">Product Long Description</label>
                    <div class="controls">
                      <textarea class="cleditor" id="description" name="product_long_description" required="" rows="3"></textarea>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" for="name">Product Price</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge" id="name" name="product_price" required="" placeholder="Enter a product price">
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" for="name">Product image</label>
                    <div class="controls">
                      <input type="file" class="input-xlarge" id="name" name="product_image" required="" placeholder="Enter a product Image">
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" for="name">Product Size</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge" id="name" name="product_size" required="" placeholder="Enter a product Size">
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" for="name">Product Color</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge" id="name" name="product_color" required="" placeholder="Enter a product Color">
                    </div>
                  </div>

                <div class="control-group hidden-phone">
                    <label class="control-label" for="description">publication Status</label>
                    <div class="controls">
                     <input type="checkbox" name="publication_status" required="" value="1">
                    </div>
                  </div>


                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Add Product</button>
                  <button type="reset" class="btn">Cancel</button>
                </div>
              </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection
