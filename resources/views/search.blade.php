@extends('master')
@section('content')
     <br><br>
     <div class="container product_wrapper">
        <h4 style="font-weight: bold">Search Result For: {{$searchword}}</h4>
        <div class="row">
            {{-- <div class="col-6"> --}}
                @php
                    $i=0;
                @endphp
                @foreach ($searcheddata as $itemlist)
                    @php
                       $i++; 
                    @endphp
                    <div class="card col-sm-3 mb-4">
                        <div class="image_card_box">
                            <p class="cat_name"><a href="">{{$itemlist->category}}</a></p>
                            @if ($itemlist['status']!='')
                                <p class="top_trend">{{$itemlist->status}}</p>
                            @endif
                            <img class="card-img-top" src="{{$itemlist->gallery}}" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight: bold"><a href="/details/{{$itemlist->id}}">{{$itemlist->name}}</a></h5>
                            <p class="card-text text-danger">{{$itemlist->price}}$ <sup class="text-info">{{$itemlist->discount}} % OFF</sup></p>
                            <p class="card-text" style="font-size: 12px !important;">{{substr($itemlist->description,0,60)}}...</p>
                            <div class="byoption d-inline-flex">
                                <a href="#" class="btn btn-primary btn-sm">Add to Cart</a>
                                <a href="#" class="ml-4"><i class="far fa-heart fa-2x"></i></a>
                            </div>
                        </div>
                    </div>    
                @endforeach

            {{-- </div> --}}
        </div>
     </div>
    @if ($i==0)
     <h3 style="padding-top: 32vh;padding-bottom: 32vh; text-align:center;">Nothing Found</h3>
    @endif
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
        z-index: 99999999999999999999999999;
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
        z-index: 999999999999999999999;
        
    }
    .cat_name a{
        color: white;
        text-decoration: none;
    }
    a:hover{
        color: rgb(159, 196, 252) !important;
        text-decoration: none !important;
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