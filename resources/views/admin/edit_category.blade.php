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
        <a href="#">Edit Category</a>
    </li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Category</h2>
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
        <form class="form-horizontal" action="{{url('/update_category/'.$category_info->category_id)}}" method="post" >
                {{csrf_field()}}
              <fieldset>

                <div class="control-group">
                  <label class="control-label" for="name">Category Name</label>
                  <div class="controls">
                  <input type="text" class="input-xlarge" id="name" name="category_name" required="" value="{{$category_info->category_name}}">
                  </div>
                </div>

                <div class="control-group hidden-phone">
                  <label class="control-label" for="description">Category Description</label>
                  <div class="controls">
                    <textarea class="cleditor" id="description" name="category_description" required="" rows="3">
                        {{$category_info->category_description}}
                    </textarea>
                  </div>
                </div>




                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Update Category</button>
                  <button type="reset" class="btn">Cancel</button>
                </div>
              </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection
