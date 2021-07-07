@extends('master')
@extends('sidebar')

@section('content')
@section('sidebar')

@endsection
<br><br>
<div class="container h-100">

    {{-- @if (session()->get('user'))
        <script>
            window.location.href='/';
        </script>
    @endif --}}
<style>

.ratings i {
    font-size: 16px;
    color: red
}

.strike-text {
    color: red;
    text-decoration: line-through
}

.product-image {
    width: 100%
}

.dot {
    height: 7px;
    width: 7px;
    margin-left: 6px;
    margin-right: 6px;
    margin-top: 3px;
    background-color: blue;
    border-radius: 50%;
    display: inline-block
}

.spec-1 {
    color: #938787;
    font-size: 15px
}

h5 {
    font-weight: 400
}

.para {
    font-size: 16px
}

</style>
    <div class="row justify-content-center align-items-center">
            
            <div class="container mb-5">
                <div class="d-flex justify-content-center row">
                    @foreach ($allProduct as $item)
                        
                    <div class="col-md-10">
                        <div class="row p-2 bg-white border rounded">
                            <div class="col-md-3 mt-1">
                                {{-- <img style="height: 150px !important" class="img-fluid img-responsive rounded product-image" src="{{$item->gallery}}"> --}}
                                <br><br><br><a href="/details/{{$item->product_id}}" class="btn btn-info mt-4">See the Product</a><br>
                                <span>Order Number: {{$item->order_number}}<br></span>
                                <b><span>{{$item->user_name}}<br></span></b>
                            </div>
                            <div class="col-md-6 mt-1">
                                <h5>{{$item->product_name}}</h5>
                                <div class="d-flex flex-row">
                                    <div class="ratings mr-2">Order Placed:</div><span>{{$item->created_at}}</span>
                                </div>
                                <div class="mt-1 mb-1 spec-1">
                                    <span class="btn btn-primary">Payment Status: {{$item->payment_status}}</span>
                                    <span class="dot"></span><span class="btn btn-danger">Order Status: {{$item->order_status}}</span>
                                    <span class="dot"></span><span><a href="cancelorder/{{$item->id}}">Cancel Order</a></span>
                                </div>
                                <div class="mt-1 mb-1 spec-1">
                                    <span>Address: {{$item->address}}</span>
                                    <span class="dot"></span><span>Mobile: {{$item->phone}}</span>
                                    <span class="dot"></span><span>Quantity: {{$item->qantity}}<br></span>
                                </div>
                                <p class="text-justify text-truncate para mb-0">{{substr($item->description,0,100)}}.<br><br></p>
                            </div>
                            <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                <div class="d-flex flex-row align-items-center">
                                    <h4 class="mr-1">${{$item->ammout}}</h4><span class="strike-text">$20.99</span>
                                </div>
                                <h6 class="text-success">Payment Method: {{$item->payment_method}}</h6>
                                <div class="d-flex flex-column mt-4">
                                    <button class="btn btn-primary btn-sm" type="button">Edit Order</button>
                                    @if ($item->order_status=='Canceled')
                                        <button class="btn btn-danger btn-sm mt-2" type="button">Delete Order</button></div>
                                    @else 
                                        <button disabled class="btn btn-dark btn-sm mt-2" type="button">Delete Order</button></div>
                                    @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>            
        </div>
    </div>
</div>
<style>
    .lastdiv form{
        padding: 0px 0px 145px 0px;
    }
</style>
<br><br><br><br><br><br><br><br><br><br><br><br>
@endsection