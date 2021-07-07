@extends('master')
@extends('sidebar')

@section('content')
@section('sidebar')

@endsection
<br><br>
<div class="container h-100">
    <h3 class="text-center">Add a new Slide</h3>
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-sm-4 col-10 col-md-8 col-lg-6 lastdiv">
            <form action="/slidesave" method="post" enctype="multipart/form-data">
                @if (Session()->get('NoId'))
    
                <div class="alert alert-danger alert-dismissible show" role="alert">
                    <strong>Worning: </strong> {{Session()->get('NoId')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                @endif
                <?php
                //  echo '<pre>';var_dump(session()->all()); 
                 ?>
                @csrf
    
                <div class="form-group">
                    <label for="exampleInputEmail1">Upload Images</label>
                    <input required type="file" class="form-control p-5 h-50" id="exampleInputEmail1" name="gallery[]" multiple>
                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-success" href="/allproductlist">Done</a>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($slide as $item)
                <div class="col-sm-2 boxis mb-4">                 
                    <a  href="/deleteslide/{{$item->id}}"><i class="fas fa-trash tras"></i><img class="dphotos" style="height: 90px; width:90px;" src="/storage/{{$item->slide}}" alt="Photo"></a>
                </div>  
            @endforeach
            <div class="col-sm-2 boxis"> 
                <br><br>    
            </div> 
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