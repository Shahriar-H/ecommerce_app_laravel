@extends('master')
@section('content')
    @if (Session()->get('status'))
        <div class="alert alert-danger alert-dismissible show" role="alert">
            <strong>Warning: </strong> {{Session()->get('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="container  custom-product" style="padding-left: 0 !important">
        <div id="myCarousel" class="carousel slide"  data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                @php
                    $i=0;
                @endphp
                @foreach ($slides as $item)
                @php
                    $i++
                @endphp
                    <div class="item {{$i==1?'active':''}}">
                        <img class="slider-img" src="/storage/{{$item->slide}}" alt="Los Angeles">
                        {{-- <div class="carousel-caption">
                            <h3>{{$item->name}}</h3>
                            <p>{{$item->description}}</p>
                        </div> --}}
                    </div>
                @endforeach
            </div>
          
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>
        {{-- <div class="" style="width: 30%">
            
        </div> --}}
    </div>
     <br><br>
     <div class="container product_wrapper">
        <div class="row">
            {{-- <div class="col-6"> --}}
                @foreach ($product as $itemlist)
                    <div class="card col-sm-3 mb-4">
                        <div class="image_card_box">
                            <p class="cat_name"><a href="">{{$itemlist->category}}</a></p>
                            @if ($itemlist['status']!='')
                                <p class="top_trend">{{$itemlist->status}}</p>
                            @endif

                            @foreach ($allphoto as $photo)
                                @if ($itemlist->id==$photo->product_id)
                                    <img class="card-img-top" src="/storage/{{$photo->photos}}" alt="Card image cap">
                                    @php
                                        break;
                                    @endphp
                                @endif
                            @endforeach
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight: bold"><a href="/details/{{$itemlist->id}}">{{$itemlist->name}}</a></h5>
                            <p class="card-text text-danger">{{$itemlist->price}}$ <sup class="text-info">{{$itemlist->discount}} % OFF</sup></p>
                            <p class="card-text" style="font-size: 12px !important;">{{substr($itemlist->description,0,60)}}...</p>
                            <div class="byoption d-inline-flex">
                                <a href="/details/{{$itemlist->id}}" class="btn btn-primary btn-sm">Buy Now</a>
                                <a href="/cart/{{$itemlist->id}}" class="ml-4"><i class="far fa-heart fa-2x"></i></a>
                            </div>
                        </div>
                    </div>    
                @endforeach
            {{-- </div> --}}
        </div>
     </div>
@endsection
<style>
    .slider-img{
        height: 300px !important;
    }
    .carousel-caption{
        background-image: linear-gradient(to right, rgba(1, 46, 31, 0),rgba(1, 46, 31, 0.575),rgba(1, 46, 31, 0));
    }
    .image_card_box{
        overflow: hidden;
        height: 200px;
        width: 254px;
        position: relative;
    }
    .top_trend {
        position: absolute;
        height: 70px;
        width: 70px;
        background-color: red !important;
        z-index: 999999999;
        right: -31 !important;
        color: white;
        transform: rotate(40deg);
        top: -39px;
        padding-top: 48px;
        padding-left: 26px;
        font-weight: bold;

    }
    .card-img-top{
        height: 200px;
        width: 254px;
        transition: .4s ease-in-out;
    }
    .card-img-top:hover{
        transform: scale(1.5);
        transition: .4s ease-in-out;
    } 
    .image_card_box .cat_name{
        position: absolute;
        background-color: #337ab7;
        padding: 2px 10px 2px 10px;
        top: 10px;
        left: 10px;
        z-index: 999999999;
        
    }
    .cat_name a{
        color: white;
        text-decoration: none;
    }
    a:hover{
        color: rgb(159, 196, 252) !important;
        text-decoration: none !important;
    }
    #myCarousel{
            width: 70%;
        }

    @media only screen and (min-width:576px) and (max-width:991px){
        .col-sm-3 {
            -ms-flex: 0 0 50% !important;
            flex: 0 0 50% !important;
            max-width: 50% !important;
        }
        .image_card_box{
            width: 240px;
            text-align: center;
            display: flex;
            justify-content: center;
        }
        .top_trend{
            display: none;
        }
        #myCarousel{
            width: 102% !important;
        }

    }
    @media only screen and (min-width:200px) and (max-width:575px){
        .image_card_box{
            display: flex !important;
            justify-content: center !important;
            width: 100% !important;
        }
        .card{
            text-align: center !important;

        }

    }
</style>