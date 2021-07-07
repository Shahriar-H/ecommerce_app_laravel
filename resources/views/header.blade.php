<style>

.navbar-brand{
  position: absolute;
  left: 40px;
  top: -8px;

}
.navbar-toggler{
  position: absolute;
  right: 40px;
  top: 13px;
}

</style>


<nav class="navbar navbar-expand-lg navbar-light bg-light"  id="navbar">
  @php
        $g = session()->get('logolink')
  @endphp
    <a class="navbar-brand" style="font-weight: bold" href="/"><img style="max-width:90px;" src="/storage/{{session()->get('logolink')}}" alt="MarkCart"></a>
    <button class="navbar-toggler" onclick="mobilemenu()">
      <span class="navbar-toggler-icon"></span>
    </button>
  <script>
    function mobilemenu(){
      // document.getElementById('mobilenav').classList.toggle('collapse');
      document.getElementById('mobilenav').classList.toggle('menumobile');
    }
  </script>
    <div class="navbar-collapse menumobile" id="mobilenav">
      <br><br>
      <i onclick="seeit2()" id="bars" class="fas fa-bars text-dark getstyle"></i>
      <i onclick="seeit22()" id='times' class="fas fa-times text-dark getstyle"></i>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item dropdown" onmouseover="closeall()">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Action
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/ordertrack">Orders</a>
            <div class="dropdown-divider"></div>
            @if (Session()->get('user'))
              <a class="dropdown-item" href="/logout">Logout <sub style="font-weight:bold;">({{session()->get('user')['name']}})</sub></a>
            @else
              <a class="dropdown-item" href="/login">Login</a>
              <a class="dropdown-item" href="/registration">Registration</a>
            @endif
          </div>
        </li>

        <li class="nav-item" onmouseover="cartopen()">
          <a class="nav-link" href="/cartlist">Carts( 0
            @if (Session()->get('stat'))
              {{Session()->get('stat')}}
            @endif
            )</a>
          
          {{-- <div class="cover" id="cartbar" onmouseout="staycart()">
          <div class="modalhov">
            <h3>Cart List</h3>
            <hr style="border-top:1px solid rgb(129, 129, 129); margin-top:10px;"> --}}
            {{-- @if (Session()->get('cartedproduct'))
              @php
                  $productList = Session()->get('cartedproduct');
                  $userid = session()->get('user')['id'];
                  $allProduct = session()->get('allProduct');

              @endphp
              @foreach ($productList as $cartitem)                 
                  {{-- {{Session()->get('cartedproduct')}} --}}
                  {{-- @if ($userid==$cartitem->user_id)
                  @php
                      $productId = $cartitem->product_id;
                  @endphp
                  @foreach ($allProduct as $getCartItem)
                      @if ($getCartItem->id==$productId)
                      <div class="cartedpro mb-3">
                        <img style="height: 70px; width:100px" class="boxs" src="" alt="Product Photo">
                        <h5 class=" boxn ml-3"><a href="/details/"></a></h5>
                        <h6 class="pt-3 boxs" style="font-weight: bold">Price:</h6>
                        <a style="height:25px;padding:4px;" class="bg-primary mt-4" href="#">Buy Now</a>
                        <a style="padding-top: 2rem; width:50px" class="ml-3 boxs" href="/deletecart/">Remove</a>
                      </div> 

                      {{-- @endif
                  @endforeach
                  @endif
              @endforeach
            @endif --}}
{{--           
          </div>
            <a class="btn btn-primary btn-sm byall" href="">Buy All Product</a>
          </div> --}}
        </li>
      </ul>
      <form action="/search" method="POST" class="form-inline my-2 my-lg-0 float-right mr-5 w-50" style="margin-top: 7px !important">
        @csrf
        <input oninput="showsearch()" class="form-control mr-sm-2 w-100" name="query" type="search" placeholder="Search" aria-label="Search">
        {{-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> --}}
        <button type="submit" id="subbtn" class="btnsearch"><i onclick="seeit()" class="fas fa-search text-primary" style="font-size: 24px"></i></button>
      </form>
    </div>
  </nav>

<i onclick="seeit2()" id="bars" class="fas fa-bars text-dark getstyle micon"></i>
<i onclick="seeit22()" id='times' class="fas fa-times text-dark getstyle micon"></i>

<div class="sidenav" id="addit2" >
  @if (session()->get('category'))
    @php
        $categories = session()->get('category');
    @endphp
    @foreach ($categories as $item)
      <a href="/logo">{{$item->category}}</a>
    @endforeach
      
  @endif
</div>


<style> 
  .menumobile{
    display: none;
  }
    #times{
      display: none;
    }    
    .sidenav {
      /* height: 0px;
      width: 0px; */
      position: fixed;
      z-index: 1;
      top: 60px;
      right: -20px;
      background-color: rgb(230, 230, 230);
      box-shadow: 0px 5px 10px 1px grey;
      overflow-x: hidden;
      padding-top: 20px;
      opacity: 0;
      color: black;
      overflow-y: scroll;
      z-index: 999999999999999999999999999999;
    }
    .btnsearch{
      background-color: rgba(175, 18, 18, 0) !important;
      border: none !important;
      position: absolute;
      right: 60px;
      display: none;
    }

    .sidenav a {
      padding: 6px 8px 6px 16px;
      text-decoration: none;
      font-size: 16px;
      color: #818181;
      display: block;
    }

    .sidenav a:hover {
      color: #0e0e0e;
      text-decoration: none;
    }
    footer{
        display: none !important;
    }

    .main {
      margin-left: 160px; /* Same as the width of the sidenav */
      font-size: 28px; /* Increased text to enable scrolling */
      padding: 0px 10px;
    }

    .isit22{
            display: block;
            height: 92vh !important ;
            width: 160px !important ;
            opacity: 1;
            animation-name: sidebar1;
            animation-fill-mode: 1s;
            animation-duration: .5s;
    }
    .isit2{
            animation-name: sidebar12;
            animation-fill-mode: 1s;
            animation-duration: .5s;
    }
    @keyframes sidebar1{
      0%{
        right: -200px;
      }
      100%{
        right: -20px;
      }
    }
    @keyframes sidebar12{
      0%{
        right: -20px !important;
      }
      100%{
        right: -200px !important;
      }
    }

    .getstyle{
      position: absolute;
      top: 17px;
      right: 25px;
      font-size: 26px;
    }

    @media only screen and (max-height: 200) and (max-height: 767px) {
      .micon{
        display: none !important;
      }
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {font-size: 18px;}
    }
    /* .navbar-nav .dropdown-menu {
    position: absolute !important;
    width: 1053px !important;
    height: 400px !important;
    top: 100%;
    left: -84px;
    right: 0px;
    margin: auto;
    z-index: 9999999999999999999999;
  } */
    .fixed-top{
      position: fixed !important;
      z-index: 99999999999999999999999999;
      transition: .4s;
      animation: navscroll .4s ease-in-out;
      background-color: rgb(230, 230, 230) !important;
      box-shadow: 0px 0px 4px 0px grey;    }
    @keyframes navscroll{
      0%{opacity: 0;}
      }
      100%{
        opacity:1;
      }
    .modalhov{
      position: absolute;
      width: 95%;
      height: 450px;
      top: 15px;
      left: 0px;
      right: 0px;
      margin: auto;
      background-color: rgb(240, 239, 239);
      z-index: 999999999999;
      overflow: hidden;
      overflow-y:scroll; 
      padding: 10px 40px 10px 40px;
      box-shadow:0px 0px 5px 2px grey;
    }
    .cover{
      position: fixed;
      width: 70%;
      height: 550px;
      top: 65px;
      left: 0px;
      right: 0px;
      margin: auto;
      background-color: rgb(240, 239, 239);
      z-index: 999999999999;
      overflow: hidden;
      display: none;
      animation: anima .2s ease-in-out;
    }
    @keyframes anima{
      0%{height: 0px;}
      100%{height: 500px;}
    }
    .boxs{
      width: 20%;
    }
    .boxn{
      width: 50%;
    }
    .cartedpro{
      border-bottom: 1px solid rgba(185, 184, 184, 0.788);
      display: flex;
    }

    .cartedpro:hover{
      background-color:rgb(255, 255, 255); 
    }
    .byall{
      position: absolute;
      bottom: 40px;
      left: 110px;
    }
    .shoon{
      display: block;
    }

    @media only screen and (min-width:200px) and (max-width:991px){
      .cartedpro{
        display: block !important;
      }
    }

  

  </style>
  <script>
    function seeit2(){
        document.getElementById('addit2').classList.add('isit22');
        document.getElementById('addit2').classList.remove('isit2');
        document.getElementById('bars').style.display='none';
        document.getElementById('times').style.display='block';
    }
    function seeit22(){
        document.getElementById('addit2').classList.remove('isit22');
        document.getElementById('addit2').classList.add('isit2');
        document.getElementById('bars').style.display='block';
        document.getElementById('times').style.display='none';
    }
    function showsearch(){
      document.getElementById('subbtn').style.display='block';
    }
  </script>
  <script>
    function cartopen(){
      document.getElementById('cartbar').classList.add('d-block');
      document.getElementById('cartbar').classList.remove('d-none');
      //console.log("ok");
    }
    function staycart(){
      document.getElementById('cartbar').classList.add('d-none');
      document.getElementById('cartbar').classList.remove('d-block');

      //console.log("ok");
    }
    function closeall(){
      document.getElementById('cartbar').classList.remove('d-block');
      //console.log("ok");
    }
    
    
    var v = document.querySelectorAll('body');
    
  </script>