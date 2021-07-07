@extends('master')

@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body {
  font-family: Arial;
  overflow-x:hidden; 

}

* {
  box-sizing: border-box;
}

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

.btn {
  background-color: #4CAF50;
  color: white;
  cursor: pointer;

}

.btn:hover {
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
.icon-container label{
  display: inline-flex !important;
  font-size: 16px;
  margin-left: 8px;

}
.conis{
  display: none;
}
.onoff{
  display: block !important;
  animation: paymentanim .4s ease-in-out;
}
@keyframes paymentanim{
  0%{
    /* width: 0%; */
    height: 100px;
  }
  100%{
    /* width: 100%; */
    height: 255px;
  }
}
.acti{
  display: block;
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
</head>
<body>

<h2 class="text-center">Checkout Form</h2>
<p class="text-center">Leave your exact information which can help us to reach to you nicely. Hope our Services will make a good value for you.</p>
<div class="row">
  <div class="col-75">
    <div class="container">
      @php
          $name='';
          $email='';
          $phone='';
          $address='';

      @endphp
      @if (session()->get('user'))
          @php
              $name = session()->get('user')['name'];
              $email = session()->get('user')['email'];
              $phone = session()->get('user')['mobile'];
              $address = session()->get('user')['address'];
          @endphp
      @endif


      @php
          $linkis;
      @endphp
      @if (session()->get('price'))
        @php
            $linkis = '/confirm';
        @endphp
      @else
        @php
        $linkis = '/confirmcart';
        @endphp
      @endif
      <form action="@php echo $linkis; @endphp" method="post">
      @csrf
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname">{{--<i class="fa fa-user"></i>--}} Full Name</label>
            <input required type="text" id="fname" name="firstname" value="{{$name}}" placeholder="Your Name">
            
            <label  for="email">{{--<i class="fa fa-envelope"></i>--}} Email</label>
            <input required type="text" id="email" name="email" value="{{$email}}" placeholder="john@example.com">

            <label>{{--<i class="fa fa-envelope"></i>--}} Phone Number</label>
            <input required type="text" id="phone" name="phone" value="{{$phone}}" placeholder="017xxxxxxxx">
            <label for="adr">{{--<i class="fa fa-address-card-o"></i>--}} Address</label>
            <input required type="text" id="adr" name="address" value="{{$address}}" placeholder="542 W. 15th Street">
            <label for="city">{{--<i class="fa fa-institution"></i>--}} City</label>
            <input required type="text" id="city" name="city" placeholder="New York">
{{-- 
            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input required type="text" id="state" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input required type="text" id="zip" name="zip" placeholder="10001">
              </div> --}}
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <input id="online" style="font-size: 10px;" checked onclick="checkit()" type="radio" name="Paymethod" value="Online" id="">
              <label>Online Payment</label><br>
                <div class="row conis border acti" id="paied1">
                  {{-- <div class="col-50">
                    <label>Online</label>
                    <input type="text" id="expyear" name="expyear" placeholder="2018">
                  </div>
                  <div class="col-50">
                    <label>CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="352">
                  </div> --}}
                  <a href="/card">Card payment</a>
                </div>

              <input id="cod" onclick="checkit1()" style="font-size: 10px;" type="radio" name="Paymethod" value="COD" id="">
              <label>Payment on Delivery</label><br>
                <div class="row conis border d-none" id="paied2">
                  <div class="col-50">
                    <label>COD</label>
                    <input type="text" id="expyear" name="expyear" placeholder="2018">
                  </div>
                  <div class="col-50">
                    <label>CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="352">
                  </div>
                </div>
              
              
              {{-- <input style="font-size: 10px;" type="radio" name="Paymethod" value="Cheack" id=""><label>Back Payment</label><br> --}}
              <input id="vmo" style="font-size: 10px;" onclick="checkit2()" type="radio" name="Paymethod" value="Mobile" id=""><label>Mobile Payment</label><br>

                <div class="row conis border" id="paied3">
                  <div class="col-50">
                    <label>COD</label>
                    <input type="text" id="expyear" name="expyear" placeholder="2018">
                  </div>
                  <div class="col-50">
                    <label>CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="352">
                  </div>
                </div>

              {{-- <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i> --}}
            </div>
            <label><input type="checkbox" checked="checked" disabled name="sameadr"> Shipping address same as billing</label>
            <input type="submit" name="submit" value="Continue to checkout" class="btn">
          </div>
          
        </div>

        <br>
        <div class="col-25">
          <div class="container">
            <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b></b></span></h4>
            @php
                $doller=0;
                $l=0;
            @endphp
            {{-- @foreach ($productis as $buyProduct) --}}
                
                @if (session()->get('price'))
                  @foreach ($ProList as $itemList)
                  @php
                      $doller = $itemList->price + $doller;
                      $l++;
                      $totalAmmount;
                  @endphp
                   <p>{{$l}}. {{$itemList->name}}<span class="price">{{$itemList->price}}$</span></p> 
                  @endforeach             
                @else
                @if ($manyProduct)
                  <p>{{$singleData->name}}<span class="price">{{$singleData->price}}x{{$manyProduct}} $</span></p> 
                @else
                  <script>
                    window.location.href='/';
                  </script>
                @endif
                {{-- {{$singleData->name}}   --}}
                @endif 
                
                {{-- <span class="price">
                @if (session()->get('price'))
                    {{session()->get('price')}}                
                @else
                    {{$singleData->price}} 
                    x{{$manyProduct}} 
                @endif
               $</span></p> --}}
              {{-- $doller = $buyProduct->price + $doller; --}}
            {{-- @endforeach --}}
            <hr>
            <p>Shipping <span class="price" style="color: rgb(153, 152, 152)" style="color:black">10$</span></p>        
            <hr>
            <p>Total <span class="price" style="color:black">
              <b>
                @if (session()->get('price'))
                  {{$doller+10}}
                @else
                  {{($singleData->price*$manyProduct)+10}} 
                  @php
                      $totalAmmount = ($singleData->price*$manyProduct)+10;
                  @endphp
                @endif
              $</b></span>
            </p>
          </div>
        </div>
        @if (session()->has('manyProduct'))
          <input type="hidden" name="productname" value="{{$singleData->name}}" id="">
          <input type="hidden" name="productId" value="{{$singleData->id}}" id="">
          <input type="hidden" name="quantity" value="{{$manyProduct}}" id="">
          <input type="hidden" name="ammount" value="{{$totalAmmount}}" id="">
        
        @endif

      </div>


      <br><br>
      </form>
    </div>
  </div>
  <br><br>
  <script>
    var v = document.getElementById('online');
    var vcod = document.getElementById('cod');
    var vmo = document.getElementById('vmo');


    function checkit(){
      //console.log(v);
      if(v.checked){
        document.getElementById('paied1').classList.add("onoff")
        document.getElementById('paied2').classList.remove("onoff");
        document.getElementById('paied3').classList.remove("onoff");
        //console.log(v);
      }
    }
    function checkit1(){
      if(vcod.checked){
        document.getElementById('paied1').classList.remove("onoff");
        // document.getElementById('paied2').classList.add("onoff");
        document.getElementById('paied3').classList.remove("onoff");
        document.getElementById('paied1').classList.remove("acti")
        //console.log(vcod);
      }
    }
    function checkit2(){
      if(vmo.checked){
        document.getElementById('paied1').classList.remove("onoff");
        document.getElementById('paied2').classList.remove("onoff");
        document.getElementById('paied3').classList.add("onoff");
        document.getElementById('paied1').classList.remove("acti")
        //console.log(vcod);
      }
    }
  </script>
 

@endsection