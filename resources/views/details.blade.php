@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card w-100">
                <div class="photo_detail w-100">
                    {{-- <div class="larg_photo">
                        @php
                            $i=0;
                        @endphp
                        @foreach ($productImage as $photo)
                        @php
                            $i++;
                        @endphp
                            <img class="card-img-top" src="/storage/{{$photo->photos}}" alt="Card image cap">
                            @php
                                if($i==1){
                                    break;
                                }
                            @endphp
                        @endforeach
                    </div> --}}
                    <div id="myCarousel" class="carousel slide mr-4" style="width:60%;height:348px" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" style="height:348px">
                            @php
                                $ip=0;
                            @endphp
                            @foreach ($productImage as $photo)
                            @php
                                $ip++;
                            @endphp
                                <div class="item @php if($ip==1){echo 'active';} @endphp">
                                    <img class="slider-img card-img-top" style="width:100%;height:348px" src="/storage/{{$photo->photos}}" alt="Los Angeles">
                                </div>
                            @endforeach
                        </div>
                      
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                          {{-- <span class="glyphicon glyphicon-chevron-left"></span> --}}
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                          {{-- <span class="glyphicon glyphicon-chevron-right"></span> --}}
                          <span class="sr-only">Next</span>
                        </a>
                    </div>
        

                    <div class="card-body ovfh">
                        <h3 class="card-title" style="font-weight: bold">{{$productdata->name}}</h3>
                        <p class="card-text text-danger"  style="font-weight: bold">{{$productdata->price}}$ <sup class="text-dark">{{$productdata->discount}}% OFF</sup></p>
                        <br><br>
                        <h5>Quantity: 
                            <form action="/buynow/{{$productdata->id}}" method="POST">
                                @csrf
                                <input type="number" required style="width: 50px; margin-top:10px;" name="quantity" value="1" id="">
                                <input type="hidden" style="width: 50px; margin-top:10px;" name="idis" value="{{$productdata->id}}" id="">
                                <input type="submit" class="btn btn-primary btn-sm ml-3" name="submit" value="Buy Now" value="1" id="">
                                <a href="/cart/{{$productdata->id}}" class="ml-2"><i class="far fa-heart fa-2x"></i></a>
                            </form>
                        </h5>
                        <h4>Product Description:</h4>
                        <p class="card-text">{{$productdata->description}}</p>
                        <br><br>
                    </div>
                    
                </div>

                <div class="galery d-flex">
                    @foreach ($productImage as $photo)
                    <img class="m-2" style="width: 50px; height:50px;" src="/storage/{{$photo->photos}}" alt="Card image cap">
                    @endforeach
                </div>
    
                <ul class="list-group list-group-flush">
                  <li class="list-group-item" style="font-weight: bold"></>Color:{{$productdata->color}}</li>
                  <li class="list-group-item" style="font-weight: bold"></>Size: {{$productdata->size}}"</li>
                  <li class="list-group-item" style="font-weight: bold"></>In Stock: {{$productdata->stock}}</li>
                </ul>
                <a href="/" class="card-link ml-3">Go Back</a>

            </div>
        </div>
    </div>
    <br><br>
@endsection

<style>
    ul{
        flex-direction: row !important;
    }
    .larg_photo{
        overflow: hidden;
    }
    .card-img-top{
        transition: .4s;
        height: 400px;
        width: 550px;
    }
    .card-img-top:hover{
        transform: scale(2.5);
        transition: .4s;
    }
    .photo_detail{
            display: inline-flex ;
    }
    .larg_photo{
        width: 50%;
    }
    .card-body{
        width: 50%;
        height: 347px;
        overflow: hidden;
        overflow-y: scroll;
        box-shadow: 0px 25px 20px -25px rgba(128, 128, 128, 0.507);
    }


    @media only screen and (min-width:200px) and (max-width:911px){
        .photo_detail{
            display: inline-block !important;
        }
        .larg_photo{
            width: 100%;
        }
        .card-body{
            width: 100%;
        }


    }
</style>