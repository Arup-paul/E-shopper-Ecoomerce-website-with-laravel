@extends('layout')

@section('content')

<section id="cart_items col-sm-12">
    <div class="container">
     <p>Fillup This Form</p>



        <div class="shopper-informations ">
            <div class="row col-sm-12">

                <div class="col-sm-8 clearfix " >
                    <div class="bill-to">
                        <p>Shipping details</p>
                        <div class="form-one">
                        <form action="{{url('/save-shipping-details')}}" method="post">
                          {{csrf_field()}}
                                <input type="email" name="shipping_name" placeholder="Email*">
                                <input type="text" name="shipping_first_name"  placeholder="First Name *">
                                <input type="text" name="shipping_last_name" placeholder="Last Name *">
                                <input type="text " name="shipping_address_name" placeholder="Address  *">
                                <input type="text" name="shipping_mobile_name" placeholder="Mobile No">
                                <input type="text" name="shipping_city" placeholder="City">
                                <input type="submit" class="btn btn-primary" value="submit">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>

</section>


@endsection
