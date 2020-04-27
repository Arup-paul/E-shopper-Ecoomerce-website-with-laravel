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
                  $content  = Cart::content();

                ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td>Action</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($content as $v_content)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{$v_content->options->image}}" alt="" height="80px"; width="80px";></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$v_content->name}}</a></h4>
                        </td>
                        <td class="cart_price">
                            <p>{{$v_content->price }}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                            <form action="{{url('/updtecart')}}" method="post">
                                      {{csrf_field()}}
                                <input class="cart_quantity_input" type="text" name="qty" value="{{$v_content->qty}}" autocomplete="off" size="2">
                                <input type="hidden" name="rowId" value="{{$v_content->rowId}}" >
                                <input type="submit" value="update" name="submit" class="btn btn-default add-to-cart">
                            </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{$v_content->total}}</p>
                        </td>
                        <td class="cart_delete">
                        <a class="cart_quantity_delete" href="{{URL::to('/deletetocart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container col-sm-12">

        <div class="row">

            <div class="col-sm-8">
                <div class="total_area">
                    <ul>
                    <li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
                        <li>Eco Tax <span>{{Cart::tax()}}</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>{{Cart::total()}}</span></li>
                    </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <?php
                        $customer_id = Session::get('customer_id')
                        ?>
                        <?php if($customer_id != NULL) {?>
                            <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Check Out</a>
                     <?php }else{?>
                        <a class="btn btn-default check_out" href="{{URL::to('/login-check')}}">Check Out</a>
                         <?php } ?>
                      

                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->


@endsection
