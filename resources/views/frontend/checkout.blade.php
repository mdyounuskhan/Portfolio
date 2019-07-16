@extends('layouts.header_footer')

@section('content')
    <!-- Page Info -->
	<div class="page-info-section page-info">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="">Home</a> /
				<a href="">Sales</a> /
				<a href="">Bags</a> /
				<a href="">Cart</a> /
				<span>Checkout</span>
			</div>
			<img src="img/page-info-art.png" alt="" class="page-info-art">
		</div>
	</div>
	<!-- Page Info end -->


    @auth
    <!-- Page -->
	<div class="page-area cart-page spad">
		<div class="container">
        <form class="checkout-form" action="{{url('order/success')}}" method="POST">
            @csrf
				<div class="row">
					<div class="col-lg-6">
                        <h4 class="checkout-title">Billing Address</h4>
                        @if (session('message'))
                                    <div class="alert alert-danger" style="text-align:center">
                                        {{session('message')}}
                                    </div>
                                @endif
						<div class="row">
							<div class="col-md-6">
								<input type="text" placeholder="First Name *" name="first_name">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Last Name *" name="last_name">
							</div>
							<div class="col-md-12">
								<select name="country" >
									<option>Country *</option>
									<option>BANGLADESH</option>
								</select>
								<input type="text" placeholder="Address *" name="address">
								<input type="text" placeholder="Zipcode *" name="zipcode">
								<input type="text" placeholder="City/Town *" name="city">
								<input type="text" placeholder="Phone no *" name="phone">
								<input type="email" placeholder="Email Address *" name="email">
								<div class="checkbox-items">
									<div class="ci-item">
										<input type="checkbox" id="tandc">
										<label for="tandc">Terms and conditions</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="order-card">
							<div class="order-details">
								<div class="od-warp">
									<h4 class="checkout-title">Your order</h4>
									<table class="order-table">
										<thead>
											<tr>
												<th>Product</th>
												<th>Total</th>
											</tr>
										</thead>
										<tbody>
											<tr class="cart-subtotal">
												<td>Shipping</td>
												<td>Free</td>
											</tr>
											<tr class="cart-subtotal">
												<td>Cupon Discount</td>
                                            <td>${{$cupon_dis}}</td>
											</tr>
										</tbody>
										<tfoot>
											<tr class="order-total">
												<th>Total</th>
                                            <th>${{$total}}</th>
											</tr>
										</tfoot>
									</table>
								</div>
								<div class="payment-method">
									<div class="pm-item">
										<input type="radio" name="pm" id="two">
										<label for="two">Cash on delievery</label>
									</div>
								</div>
							</div>
							<button class="site-btn btn-full">Place Order</button>
						</div>
					</div>
				</div>
			</form>
		</div>
    </div>
    <!-- Page -->
    @else
<!--login form-->
<div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
    <div class="page-area cart-page spad">
        <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <h4 class="checkout-title">Login to your account</h4>
                    <br>
                    <form action="{{url('/user_login')}}" method="post" class="checkout-form">
                        @csrf
                        <input type="email" placeholder="Email" name="email"/>
                        <input type="password" placeholder="Password" name="password"/>
                        <span>
                            <input type="checkbox" class="checkbox">
                            Keep me signed in
                        </span>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div>
            </div>

            <div class="col-sm-2">
                <h4 class="checkout-title" style="text-align:center">OR</h4>
            </div>
        <!--sign up form-->
            <div class="col-sm-4">
                <div class="signup-form">
                    <h4 class="checkout-title">New User Signup!</h4>
                    <br>
                    <form action="{{url('/register_user')}}" method="post" class="checkout-form">
                        @csrf
                        <input type="text" placeholder="Name" name="name" value="{{old('name')}}"/>
                        <span class="text-danger">{{$errors->first('name')}}</span>

                        <input type="email" placeholder="Email Address" name="email" value="{{old('email')}}"/>
                        <span class="text-danger">{{$errors->first('email')}}</span>

                        <input type="password" placeholder="Password" name="password" value="{{old('password')}}"/>
                        <span class="text-danger">{{$errors->first('password')}}</span>

                        <input type="password" placeholder="Confirm Password" name="password_confirmation" value="{{old('password_confirmation')}}"/>
                        <span class="text-danger">{{$errors->first('password_confirmation')}}</span>

                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-bottom: 20px;"></div>
    @endauth
@endsection
