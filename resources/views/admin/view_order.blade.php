@extends('admin_layout')

@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
    <a href="{{URL::to('/dashboard')}}">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Order Details</a></li>
</ul>


        <div class="row-fluid sortable">
            <div class="box span6">
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon user"></i><span class="break"></span>Customer Details</h2>
                    <div class="box-icon">
                        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                    </div>
                </div>
                <div class="box-content">

                    <table class="table table-striped table-bordered ">
                      <thead>
                          <tr>
                              <th>User Name</th>
                              <th>Mobile</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($order_details as $v_order)
                        @endforeach
                        <tr>
                        <td>{{$v_order->customer_name}}</td>
                        <td>{{$v_order->customer_mobile}}</td>


                        </tr>

                      </tbody>
                  </table>
                </div>
            </div><!--/span-->
            <div class="box span6">
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon user"></i><span class="break"></span>Shipping Details</h2>
                    <div class="box-icon">
                        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                    </div>
                </div>
                <div class="box-content">

                    <table class="table table-striped table-bordered ">
                      <thead>
                          <tr>
                              <th>Username</th>
                              <th>Address</th>
                              <th>Mobile</th>
                              <th>Email</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($order_details as $v_order)
                        @endforeach
                        <tr>
                            <td>{{$v_order->shipping_first_name}} {{$v_order->shipping_last_name}}</td>
                            <td>{{$v_order->shipping_address_name}}</td>
                            <td>{{$v_order->shipping_mobile_name}}</td>
                            <td>{{$v_order->shipping_name}}</td>

                        </tr>


                      </tbody>
                  </table>
                </div>
            </div>
        </div>
        <div class="row-fluid sortable">
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon user"></i><span class="break"></span>Order Details</h2>
                    <div class="box-icon">
                        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                    </div>
                </div>
                <div class="box-content">

                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Product Name</th>
                              <th>Product Price</th>
                              <th>Product Sales Quantity</th>
                              <th>Product Sub Total</th>
                          </tr>
                      </thead>
                      <tbody>
                              @foreach($order_details as $v_order)
                        <tr>
                            <td>{{$v_order->order_id}}</td>
                            <td>{{$v_order->product_name}}</td>
                            <td>{{$v_order->product_price}}</td>
                            <td>{{$v_order->product_sales_quantity}}</td>
                            <td>{{$v_order->product_sales_quantity*$v_order->product_price}}</td>


                        </tr>
                        @endforeach

                      </tbody>
                      <tfoot>
                          <tr>
                              <td colspan="4">Total With Vat:</td>
                              <td><strong>={{$v_order->order_total}} TK</strong></td>
                          </tr>
                      </tfoot>
                  </table>
                </div>
            </div>
        </div>

        </div>



@endsection
