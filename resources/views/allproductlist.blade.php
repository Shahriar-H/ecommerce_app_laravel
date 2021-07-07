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
        @if (Session()->get('Edited'))
    
        <div class="alert alert-danger alert-dismissible show" role="alert">
            <strong>Worning: </strong> {{Session()->get('Edited')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
    
        @endif
            <a class="btn btn-success mb-3" href="/addnewproduct">Add New</a>
            <div class="container mb-5">
                <div class="d-flex justify-content-center row">
                    @foreach ($allProduct as $item)

                        
                    <div class="col-md-10">
                        <div class="row p-2 bg-white border rounded">
                            <div class="col-md-3 mt-1">
                                @foreach ($allphoto as $photo)
                                    @if ($photo->product_id==$item->id)
                                        <img style="height: 150px !important" class="img-fluid img-responsive rounded product-image" src="/storage/{{$photo->photos}}">
                                        @php
                                            break;
                                        @endphp
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-6 mt-1">
                                <h5>{{$item->name}}</h5>
                                <div class="d-flex flex-row">
                                    <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span>310</span>
                                </div>
                                {{-- <div class="mt-1 mb-1 spec-1"><span>100% cotton</span><span class="dot"></span><span>Light weight</span><span class="dot"></span><span>Best finish<br></span></div> --}}
                                {{-- <div class="mt-1 mb-1 spec-1"><span>Unique design</span><span class="dot"></span><span>For men</span><span class="dot"></span><span>Casual<br></span></div> --}}
                                <p class="text-justify text-truncate para mb-0">{{substr($item->description,0,100)}}.<br><br></p>
                            </div>
                            <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                <div class="d-flex flex-row align-items-center">
                                    <h4 class="mr-1">${{$item->price}}</h4><span class="strike-text">${{$item->discount}}</span>
                                </div>
                                {{-- <h6 class="text-success">Free shipping</h6> --}}
                                <div class="d-flex flex-column mt-4">
                                    <a href="editproduct/{{$item->id}}" class="btn btn-primary btn-sm" type="button">Edit Details</a>
                                    <a href="/deleteproduct/{{$item->id}}" class="btn btn-danger btn-sm mt-2" type="button">Delete</a></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>            
        </div>
        @php
            $all = DB::table('products')->count();
        @endphp
        <p class="text-right">Total Products- @php echo $all; @endphp </p>
    </div>
    <span class="text-center">{{$allProduct->links()}}</span>
    <br><br><br>

</div>
<style>
    .lastdiv form{
        padding: 0px 0px 145px 0px;
    }
    .w-5{
        height: 15px;
        width: 15px;
    }

</style>
<br><br><br><br><br><br><br><br><br><br><br><br>
@endsection