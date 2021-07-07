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

    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-sm-4 col-10 col-md-8 col-lg-6 lastdiv">
            <form action="/login" method="post">
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
                    <label for="exampleInputPassword1">Copyright-</label>
                    <input type="text" class="form-control" name="copy" placeholder="MarkCart.com">
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
</style>
<br><br>
@endsection