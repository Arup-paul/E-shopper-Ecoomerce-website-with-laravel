@extends('layout')
@section('content')



<section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php
                     $contents=Cart::content();

				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($contents as $v_contents) {?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to($v_contents->options->image)}}" height="80px" width="80px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_contents->name}}</a></h4>

							</td>
							<td class="cart_price">
								<p>{{$v_contents->price}}</p>
							</td>
							<td class="cart_quantity">
							<div class="cart_quantity_button">
								<form action="{{url('/update-cart')}}" method="post">
									{{ csrf_field()}}
									<input class="cart_quantity_input" type="text" name="qty" value="{{$v_contents->qty}}" autocomplete="off" size="2">
									<input  type="hidden" name="rowId" value="{{$v_contents->rowId}}"  >
									<input type="submit" name="submit" value="update" class="btn btn-sm btn-default">
								</form>
							</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$v_contents->total}}</p>
							</td>
							<td class="cart_delete">

								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_contents->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                       <?php }?>

					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
<section id="do_action">
	<div class="container">


		<div class="paymentCont col-sm-8">
					<div class="headingWrap">
							<h3 class="headingTop text-center">Select Your Payment Method</h3>
                    </div>
                {{-- <form action="{{url('order-place')}}" method="post">
                        {{csrf_field()}}
					<div class="paymentWrap">
						<div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
				            <label class="btn paymentMethod active">
				            	<div class="method visa" style="background:url('fronted/images/card/visa.png'); width: 100%;background-repeat: no-repeat;background-size: cover; background-position:center center;"></div>
				                <input type="radio" value="handcash" name="payment-gateway" checked>
				            </label>
				            <label class="btn paymentMethod">
				            	<div class="method master-card" style="background:url('fronted/images/card/master-card.png'); width: 100%;background-repeat: no-repeat;background-size: cover;background-position:center center;"></div>
				                <input type="radio" value="paypal" name="payment-gateway">
				            </label>
				            <label class="btn paymentMethod">
			            		<div class="method amex" style="background:url('fronted/images/card/handcash.png'); width: 100%;background-repeat: no-repeat;background-size: cover; background-position:center center;"></div>
				                <input type="radio" value="bikash" name="payment-gateway">
                            </label>
                            <label class="btn paymentMethod">
			            		<div class="method amex" style="background:url('fronted/images/card/handcash.png'); width: 100%;background-repeat: no-repeat;background-size: cover; background-position:center center;"></div>
				                <input type="radio" value="payza" name="payment-gateway">
                            </label>
						</div>
                            <div class="footerNavWrap clearfix">
                                <input type="submit" class="btn btn-success"  value="submit">
                            </div>




				</form> --}}

			<form action="{{url('/order-place')}}" method="post">
			   {{csrf_field()}}
			   <input type="radio" name="payment_method" value="handcash">Handcash <br>
			   <input type="radio" name="payment_method" value="card">Debit card <br>
			   <input type="radio" name="payment_method" value="paypal">Paypal <br>
			   <input type="submit" value="Submit">
			</form>


            </div>
        </div>



</section><!--/#do_action-->

@endsection
