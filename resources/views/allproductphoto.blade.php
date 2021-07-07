@extends('master')

@section('content')
<br><br>
<div class="container h-100">
    <h3 class="text-center">All Photos</h3>
    <hr>
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-sm-4 col-10 col-md-8 col-lg-6 lastdiv">
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($allphoto as $item)
                <div class="col-sm-2 boxis mb-4">             
                    <a  href="/deletephoto/{{$item->id}}"><i class="fas fa-trash tras"></i><img class="dphotos" style="height: 90px; width:90px;" src="/storage/{{$item->photos}}" alt="Photo"></a>
                </div>  
            @endforeach
        </div>
    </div>
</div>
<style>
    body{
        overflow-x:hidden; 
    }
    
    .lastdiv form{
        padding: 15px 0px 100px 0px;
    }
    .dphotos:hover{
        border: 1px solid red;
    }
    a:hover .tras{
        opacity: 1;
        color: red;
    }
    .tras{
        position: absolute;
        z-index: 999999;
        padding: 10px;
        opacity: 0;
    }


</style>
<br><br>
@endsection