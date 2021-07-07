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
        <img style="max-width: 100px " class="imagis" src="/storage/{{Session()->get('logolink')}}" alt="logo"> 
        {{-- <h1>ngh {{Session()->get('logolink')}}</h1> --}}
        <?php
        //  echo '<pre>';var_dump(session()->all()); 
         ?>
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-sm-4 col-10 col-md-8 col-lg-6 lastdiv">
            <form action="/logoup" method="post" enctype="multipart/form-data">
                @if (Session()->get('status'))
    
                <div class="alert alert-danger alert-dismissible show" role="alert">
                    <strong>Worning: </strong> {{Session()->get('status')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                @endif

                @csrf

                <div class="form-group">
                    <label for="exampleInputPassword1">Upload Logo</label>
                    <input type="file" class="form-control" name="logo" placeholder="Logo">
                </div>
        
                <button type="submit" class="btn btn-primary">Submit</button>
                {{-- <a class="text-muted ml-4" href="/registration">I have no account!</a> --}}
            </form>
        </div>
    </div>
</div>
<style>
    .lastdiv form{
        padding: 0px 0px 145px 0px;
    }
    .imagis{
        position: absolute;
        left: 0;
        right: 0;
        margin: auto;
    }
</style>
<br><br>
@endsection