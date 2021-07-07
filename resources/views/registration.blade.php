@extends('master')

@section('content')
<br><br>
<div class="container h-100">

    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-sm-4 col-10 col-md-8 col-lg-6 lastdiv">
            <form action="/register" method="post">
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
                    <label for="exampleInputEmail1">User Name</label>
                    <input type="text" required class="form-control" name="name" placeholder="Enter Username">
                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input required type="email" class="form-control" name="email" placeholder="Enter email">
                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input required type="text" class="form-control" name="mobile" placeholder="Enter Phone Number">
                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Billing Address</label>
                    <input required type="text" class="form-control" name="address" placeholder="Set Address">
                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input required type="password" class="form-control" name="password" placeholder="Password">
                </div>
        
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="text-muted ml-4" href="/login">I have a account!</a>
            </form>
        </div>
    </div>
</div>
<style>
    .lastdiv form{
        padding: 55px 0px 100px 0px;
    }
</style>
<br><br>
@endsection