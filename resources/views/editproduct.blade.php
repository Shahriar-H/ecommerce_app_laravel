@extends('master')

@section('content')
<br><br>
@if (Session()->get('success'))
    
<div class="alert alert-danger alert-dismissible show" role="alert">
    <strong>Worning: </strong> {{Session()->get('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>

@endif
<div class="container h-100">
    <h3 class="text-center">Add a new product</h3>
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-sm-4 col-10 col-md-8 col-lg-6 lastdiv">
            <form action="/updateproduct/{{$product['id']}}" method="post" enctype="multipart/form-data">
                @if (Session()->get('status'))
    
                <div class="alert alert-danger alert-dismissible show" role="alert">
                    <strong>Worning: </strong> {{Session()->get('status')}}
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
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" required class="form-control" name="title" value="{{$product['name']}}">
                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>

                <div class="form-group d-inline-flex w-100 ">
                    <div class="mr-1 w-50">
                        <label for="exampleInputEmail1">Price</label>
                        <input required type="text" class="form-control" name="price" value="{{$product['price']}}" placeholder="Enter Price">
                    </div>
                    <div class="ml-1 w-50">
                        <label for="exampleInputEmail1">Discount</label>
                        <input required type="text" class="form-control" name="discount" value="{{$product['discount']}}" placeholder="Enter Price">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea required type="text" class="form-control" name="description">{{$product['description']}}</textarea>
                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
                <div class="form-group d-inline-flex">
                    <div class="">
                        <label for="exampleInputEmail1">Size</label>
                        <input type="text" class="form-control" name="size" value="{{$product['size']}}" placeholder="12in, 34in...">
                    </div>
                    <div class="ml-2 mr-2">
                        <label for="exampleInputEmail1">Color</label>
                        <input type="text" class="form-control" name="color" value="{{$product['color']}}" placeholder="Red,Green...">
                    </div>
                    <div class="">
                        <label for="exampleInputEmail1">In Stock</label>
                        <input required type="text" class="form-control" value="{{$product['stock']}}" name="stock" placeholder="33pc">
                    </div>
                </div>
                <div class="form-group">
                    @php
                    $hot='';
                    $top='';
                        if($product['name']=='Hot'){
                            $hot='selected';
                        }else {
                            $top='selected';
                        }

                    @endphp
                    <label for="exampleInputPassword1">Status</label>
                    <select class="form-control" name="status">
                        <option selected disabled value="">Select Status</option>
                        <option @php echo $hot @endphp value="Hot">Hot</option>
                        <option @php echo $top @endphp value="Top">Top</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Category</label>
                    <select class="form-control" name="category">
                        <option selected disabled value="">Select Category</option>
                        @php
                            $select='';
                        @endphp
                        @foreach ($category as $cat)
                            @php
                               if($product['category']==$cat->category) {
                                   $select='selected';
                               }
                            @endphp
                            <option @php echo $select; @endphp value="{{$cat->category}}">{{$cat->category}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<style>
    .lastdiv form{
        padding: 15px 0px 100px 0px;
    }
</style>
<br><br>
@endsection