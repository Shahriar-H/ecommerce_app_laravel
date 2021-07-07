
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav1 {
  height: 30px;
  width: 30px;
  position: fixed;
  z-index: 1;
  top: 60px;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav1 a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 16px;
  color: #818181;
  display: block;
}

.sidenav1 a:hover {
  color: #f1f1f1;
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

.isitt{
        height: 100% !important ;
        width: 160px !important ;
        animation: sidebar .4s ease-in-out;
}

.getstyle1{
    position: absolute;
    top: 10px;
    left: 10px;
}

@media only screen and (max-height: 200) and (max-height: 767px) {
    .sidenav1 {
        padding-top: 15px;
    }

    .sidenav1 a {font-size: 18px;}
}
.bbtn{
  color: red !important;
  width: 100px
}

</style>
</head>
<body>

<div class="sidenav1" id="addit" onclick="seeit1()">
    <i class="fas fa-times text-danger getstyle1"></i>
  <a href="/logo">Header</a>
  <a href="/allproductlist">Products</a>
  <a href="/category">Category</a>
  <a href="/userlist">Clients</a>
  <a href="/allorders">Orders</a>
  <a href="/slider">Slider</a>
  <a href="/copyright">Footer</a>
  <br><br>
  @if (session()->get('admin-log-info'))
    <a class="btn btn-info bbtn" href="/adminout">Logout</a>
  @endif
</div>

<script>
    function seeit1(){
        document.getElementById('addit').classList.toggle('isitt');
    }
</script>

<div class="main">
    @yield('sidebar')
</div>
   
</body>
