@extends('master')

@section('content')
<br><br>
<div class="container h-100">
    <h3 class="text-center">Add a new product</h3>
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-sm-4 col-10 col-md-8 col-lg-6 lastdiv">
            <form action="/upimage" method="post" enctype="multipart/form-data">
                @if (Session()->get('success'))
    
                <div class="alert alert-danger alert-dismissible show" role="alert">
                    <strong>Worning: </strong> {{Session()->get('success')}}
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