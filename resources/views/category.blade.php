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

    <div class="row justify-content-center">
        <div class="col-sm-4 col-10 col-md-8 col-lg-6 lastdiv">
            <form action="/addcategory" method="post">
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
                    <label for="exampleInputPassword1">Add Category-</label>
                    <input type="text" class="form-control" name="category" placeholder="New Category">
                </div>
        
                <button type="submit" class="btn btn-primary">Submit</button>
                {{-- <a class="text-muted ml-4" href="/registration">I have no account!</a> --}}
            </form>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Serial</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
                {{-- <th scope="col">Handle</th> --}}
              </tr>
            </thead>
            <tbody>
                @php
                    $i=0;
                @endphp
            @foreach ($category as $item)
                
            @php
                $l = DB::table('products')->where('category',$item->category)->count();
                $i++;
            @endphp
              <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->category}}- @php echo $l; @endphp</td>
                <td><a href=""><a href=""><i class="far fa-trash-alt"></i></a></td>
              </tr>
              {{-- <i class="far fa-edit"></i></a> |  --}}
            @endforeach
            @php
                if($i==0){
                    echo "<tr><td>No Data</td></tr>";
                }
            @endphp
            </tbody>

          </table>
    </div>
</div>
<style>
    .lastdiv form{
        padding: 0px 0px 0px 0px;
    }
</style>
<br><br>
@endsection