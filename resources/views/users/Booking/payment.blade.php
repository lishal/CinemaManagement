@extends('layout.main')

@section('container')
    <div class="cms-main-container">
        <style>
            .row {
                display: -ms-flexbox; /* IE10 */
                display: flex;
                -ms-flex-wrap: wrap; /* IE10 */
                flex-wrap: wrap;
                margin: 0 -16px;
                }

                .col-25 {
                -ms-flex: 25%; /* IE10 */
                flex: 25%;
                }

                .col-50 {
                -ms-flex: 50%; /* IE10 */
                flex: 50%;
                }

                .col-75 {
                -ms-flex: 75%; /* IE10 */
                flex: 75%;
                }

                .col-25,
                .col-50,
                .col-75 {
                padding: 0 16px;
                }

                .container {
                background-color: #f2f2f2;
                padding: 5px 20px 15px 20px;
                border: 1px solid lightgrey;
                border-radius: 3px;
                }

                input[type=text] {
                width: 100%;
                margin-bottom: 20px;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 3px;
                }

                label {
                margin-bottom: 10px;
                display: block;
                }

                .icon-container {
                margin-bottom: 20px;
                padding: 7px 0;
                font-size: 24px;
                }

                .btnn {
                background-color: #4CAF50;
                color: white;
                padding: 12px;
                margin: 10px 0;
                border: none;
                width: 100%;
                border-radius: 3px;
                cursor: pointer;
                font-size: 17px;
                }

                .btnn:hover {
                background-color: #45a049;
                }

                a {
                color: #2196F3;
                }

                hr {
                border: 1px solid lightgrey;
                }

                span.price {
                float: right;
                color: grey;
                }

                /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
                @media (max-width: 800px) {
                .row {
                    flex-direction: column-reverse;
                }
                .col-25 {
                    margin-bottom: 20px;
                }
                }
            </style>
        <div class="row">
            <div class="col-75">
              <div class="container">
                <form action="{{ url('/details') }}/{{$ticket->id}}" method="POST">
                @csrf
                  <div class="row">
                    <div class="col-50">
                      <h3>Billing Address</h3>
                      <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                      <input type="text" id="fname" name="firstname" placeholder="Your Name">
                      @error('firstname')
                        <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                      <label for="email"><i class="fa fa-envelope"></i> Email</label>
                      <input type="text" id="email" name="email" placeholder="Your Email">
                      @error('email')
                        <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                      <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                      <input type="text" id="adr" name="address" placeholder="Your Address">
                      @error('address')
                        <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                      <label for="city"><i class="fa fa-institution"></i> City</label>
                      <input type="text" id="city" name="city" placeholder="Your City Name">
                      @error('city')
                        <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
          
                      <div class="row">
                        <div class="col-50">
                          <label for="state">State</label>
                          <input type="text" id="state" name="state" placeholder="Your Sate Name">
                          @error('state')
                        <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                        </div>
                        <div class="col-50">
                          <label for="zip">Zip</label>
                          <input type="text" id="zip" name="zip" placeholder="Your Zip Code">
                          @error('zip')
                        <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                        </div>
                      </div>
                    </div>
          
                    <div class="col-50">
                      <h3>Payment</h3>
                      <label for="fname">Accepted Cards</label>
                      <div class="icon-container">
                        <i class="fa fa-cc-visa" style="color:navy;"></i>
                        <i class="fa fa-cc-amex" style="color:blue;"></i>
                        <i class="fa fa-cc-mastercard" style="color:red;"></i>
                        <i class="fa fa-cc-discover" style="color:orange;"></i>
                      </div>
                      <label for="cname">Name on Card</label>
                      <input type="text" id="cname" name="cardname" placeholder="Name on Card">
                      @error('cardname')
                        <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                      <label for="ccnum">Credit card number</label>
                      <input type="text" id="ccnum" name="cardnumber" placeholder="Card Number">
                      @error('cardnumber')
                        <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                      <label for="expmonth">Exp Month</label>
                      <input type="text" id="expmonth" name="expmonth" placeholder="Expiry Month">
                      @error('expmonth')
                        <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                      <div class="row">
                        <div class="col-50">
                          <label for="expyear">Exp Year</label>
                          <input type="text" id="expyear" name="expyear" placeholder="Expiry Year">
                          @error('expyear')
                        <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                        </div>
                        <div class="col-50">
                          <label for="cvv">CVV</label>
                          <input type="text" id="cvv" name="cvv" placeholder="CVW Number">
                          @error('cvv')
                        <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                        </div>
                      </div>
                    </div>
                    
                  </div>
                 
                  <input type="submit" value="Continue to checkout" class="btnn">
                </form>
              </div>
            </div>
    </div>
@endsection
@section('footer')
    @include('layout.footer')
@endsection