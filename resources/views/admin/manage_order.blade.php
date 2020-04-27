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
                      <th>Customer Name</th>
                      <th>Order Total</th>
                      <th>Order Status</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($manage_order as $v_order)
                <tr>
                    <td>{{$v_order->order_id}}</td>
                    <td>{{$v_order->customer_name}}</td>
                    <td>{{$v_order->order_total}}</td>
                    <td>{{$v_order->order_status}}</td>

                    <td class="center">

                        @if($v_order->order_status=='pending')
                    <a class="btn btn-danger" href="{{URL::to('/unactive/'.$v_order->order_id)}}">
                            <i class="halflings-icon white thumbs-down"></i>
                        </a>
                        @else
                        <a class="btn btn-success" href="{{URL::to('/active/'.$v_order->order_id)}}">
                            <i class="halflings-icon white thumbs-up"></i>
                        </a>
                        @endif


                        <a class="btn btn-info" href="{{URL::to('/view_order/'.$v_order->order_id)}}">
                            <i class="halflings-icon white edit"></i>
                        </a>
                        <a class="btn btn-danger" href="{{URL::to('/delete_order/'.$v_order->order_id)}}" id="delete">
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
