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
        <a href="#">Add Slider</a>
    </li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span> Slider</h2>
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
        <form class="form-horizontal" action="{{url('/save_slider')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
              <fieldset>

                <div class="control-group">
                  <label class="control-label" for="name">Title</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" id="name" name="slider_title" required="" placeholder="Enter a Slider Title">
                  </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="name">Sub Title</label>
                    <div class="controls">
                      <input type="text" class="input-xlarge" id="name" name="slider_subtitle" required="" placeholder="Enter a Slider Sub Title">
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" for="name">Description</label>
                    <div class="controls">
                      <textarea class="cleditor" id="description" name="slider_description" required="" rows="3"></textarea>
                    </div>
                  </div>



                  <div class="control-group">
                    <label class="control-label" for="name">Slider image</label>
                    <div class="controls">
                      <input type="file" class="input-xlarge" id="name" name="slider_image" required="" >
                    </div>
                  </div>



                <div class="control-group hidden-phone">
                    <label class="control-label" for="description">publication Status</label>
                    <div class="controls">
                     <input type="checkbox" name="publication_status" required="" value="1">
                    </div>
                  </div>


                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Add Slider</button>
                  <button type="reset" class="btn">Cancel</button>
                </div>
              </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection
