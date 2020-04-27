@extends('admin_layout')

@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
    <a href="{{URL::to('/dashboard')}}">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">All Category</a></li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Category</h2>
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
                      <th>Category Name</th>
                      <th>Category Description</th>
                      <th>Status</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($all_category as $Single_category)
                <tr>
                    <td>{{$Single_category->category_id}}</td>
                    <td>{{$Single_category->category_name}}</td>
                    <td class="center">{{$Single_category->category_description}}</td>
                    <td class="center">
                        @if($Single_category->publication_status==1)
                            <span class="label label-success">Active</span>
                            @else
                            <span class="label label-warning">Unactive</span>

                        @endif

                    </td>
                    <td class="center">

                        @if($Single_category->publication_status==1)
                    <a class="btn btn-danger" href="{{URL::to('/unactive_category/'.$Single_category->category_id)}}">
                            <i class="halflings-icon white thumbs-down"></i>
                        </a>
                        @else
                        <a class="btn btn-success" href="{{URL::to('/active_category/'.$Single_category->category_id)}}">
                            <i class="halflings-icon white thumbs-up"></i>
                        </a>
                        @endif


                        <a class="btn btn-info" href="{{URL::to('/edit_category/'.$Single_category->category_id)}}">
                            <i class="halflings-icon white edit"></i>
                        </a>
                        <a class="btn btn-danger" href="{{URL::to('/delete_category/'.$Single_category->category_id)}}" id="delete">
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
