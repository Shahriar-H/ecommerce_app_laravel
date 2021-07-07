<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Carts;
use App\Models\Order;
use App\Models\action;
use App\Models\Galleries;
use App\Models\Categories;
use App\Models\Slides;
use Facade\FlareClient\Time\Time;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    function index(Request $reqis){
        $idd = 1;
        $product  = Product::all();
        $slide = Slides::all();
        $allphoto = Galleries::all();
        $logos = action::find($idd)['logo'];
        // return view('product', ['product'=>$product, 'logois'=>$logos]);
        $reqis->session()->put('logolink',$logos);
        $category = Categories::all();
        $reqis->session()->put('category', $category);
        return view('product', ['product'=>$product, 'allphoto'=>$allphoto, 'slides'=>$slide]);
    }
    function details($id){
        $productdata = Product::find($id);
        $productImage = Galleries::where('product_id',$id)->get();
        return view('details',['productdata'=>$productdata, 'productImage'=>$productImage]);
        //return $productImage;
    }
    function search(Request $req2){
        $word = $req2->input('query');
        $data = Product::where('category','like', '%'.$req2->input('query').'%')->get();
        return view('search',['searcheddata'=>$data, 'searchword'=>$word]);
    }
    function cart(Request $req1, $pid){

        if($req1->session()->has('user')){
            $carted = new Carts;
            $carted->product_id = $pid;
            $carted->user_id = $req1->session()->get('user')['id'];
            $carted->save();
            return redirect('/');
        }else{
            $req1->session()->flash('status','Please Login To cart Product');
            return view('/login'); 
        }
        
    }
    function __construct(Request $reqis){
        if($reqis->session()->has('user')){
            $userid = $reqis->session()->get('user')['id'];
            $datacart =  Carts::where('user_id',$userid)->count();
            $reqis->session()->flash('stat',$datacart);
            // $cartedProduct = Carts::all();
            // $reqis->session()->flash('cartedproduct', $cartedProduct);
            // $allProduct = Product::all();
            // $reqis->session()->flash('allProduct', $allProduct);
            // //return $cartedProduct;
        }

    }
    function CartList(Request $req3){
        if($req3->session()->has('user')){
            $userssId = $req3->session()->get('user')['id'];
            $prolist = DB::table('cart')
            ->join('products','cart.product_id','=','products.id' )
            ->where('cart.user_id',$userssId)
            ->select('products.*')
            ->get();

            $product_photo = DB::table('cart')
            ->join('gallery','cart.product_id','=','gallery.product_id')
            ->where('cart.user_id',$userssId)
            ->select('gallery.*')
            ->get();
            return view('cartlist', ['prolist'=>$prolist, 'cartphoto'=>$product_photo]);
            //return $product_photo;

        }else{
            $req3->session()->flash('status','You are not loged in!');
            return view('/login');
        }
    }


    function logout(Request $req4){
        if($req4->session()->has('user')){
            $req4->session()->forget('user');
            $req4->session()->forget('price');
            return redirect('/login');
        }else{
            return redirect('/login');
        }
    }

    function deleteCart( Request $req, $id){
        $datadelete = Carts::where('product_id',$id);
        $datadelete->delete();
        // $req->session()->flash('status','Product Successfully Removed ! ');
        return redirect('/cartlist');
    }

    function buynow($proID, Request $req7){
        // if(isset($req7->session()->get('user')['id'])){
            $singleProduct = Product::find($proID);
            $manyProduct = $req7->input('quantity');
        //return $req7->input();
            $req7->session()->flash('manyProduct',$manyProduct);
            return view('checkout', ['singleData'=>$singleProduct,'manyProduct'=>$manyProduct]);
        // }else{
        //     $req7->session()->flash('status','You are not loged in!');
        //     return view('/login');
        // }
        
    }

    function checkOut($piid, Request $req5){
        if($req5->session()->has('user')){
            $userssId = $req5->session()->get('user')['id'];
            $price = DB::table('cart')
            ->join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$userssId)
            ->select('products.*')
            ->sum('price');

            $ProList = DB::table('cart')
            ->join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$userssId)
            ->select('products.*')
            ->get();
            
            session()->flash('price',$price);
            return view('checkout', ['ProList'=>$ProList]);
        }else{
            $req5->session()->flash('status','You are not loged in!');
            return view('/login');
        }
    }

    function confirmcart(Request $newreq){
        $newOrder = new Order;
        if(isset($newreq->session()->get('user')['id'])){
            $useridis = $newreq->session()->get('user')['id'];
        }else{
            $useridis=500;
        }
        $ordernum = time();
        $newOrder->user_id = $useridis;
        $newOrder->product_id = $newreq->productId;
        $newOrder->product_name = $newreq->productname;
        $newOrder->ammout = $newreq->ammount;
        $newOrder->address = $newreq->address;
        $newOrder->user_name = $newreq->firstname;
        $newOrder->email = $newreq->email;
        $newOrder->phone = $newreq->phone;
        $newOrder->city = $newreq->city;
        $newOrder->order_status = "Pending";
        $newOrder->payment_status = "Pending";
        $newOrder->payment_method = $newreq->Paymethod;
        $newOrder->qantity = $newreq->quantity;
        $newOrder->order_number = $ordernum;
        $newOrder->save();
        return redirect('/success');
    }

    
    function confirm(Request $newreq){
        if(isset($newreq->session()->get('user')['id'])){
            $useridis = $newreq->session()->get('user')['id'];
        }else{
            $useridis=500;
        }
        $totalOrder = Carts::where('user_id',$useridis)->get();
        // $totalOrders = Carts::where('user_id',$useridis)->count();
        foreach($totalOrder as $orderis){
            $newOrder = new Order;
            $pr = $orderis['product_id'];
            $aboutProduct = Product::find($pr);
        $ordernum = time();
        $newOrder->user_id = $useridis;
        $newOrder->product_id = $orderis['product_id'];
        $newOrder->product_name = $aboutProduct->name;
        $newOrder->ammout = $aboutProduct->price;
        $newOrder->address = $newreq->address;
        $newOrder->user_name = $newreq->firstname;
        $newOrder->email = $newreq->email;
        $newOrder->phone = $newreq->phone;
        $newOrder->city = $newreq->city;
        $newOrder->order_status = "Pending";
        $newOrder->payment_status = "Pending";
        $newOrder->payment_method = $newreq->Paymethod;
        $newOrder->qantity = 1;
        $newOrder->order_number = $ordernum;
        $newOrder->save();
        }
        return redirect('/success');
    }

    function cancelorder($orderId){
        $orderis = Order::find($orderId);
        $orderis->order_status = "Canceled";
        $orderis->save();
        return redirect('/ordertrack');
    }

    function orders(Request $req8){
        if($req8->session()->has('user')){
            $logedid = $req8->session()->get('user')['id'];
            $order = DB::table('orders')
            ->where('user_id', $logedid)
            ->select('orders.*')
            ->get();
            return view('/ordertrack', ['order'=>$order]);
        }else{
            $req8->session()->flash('status','You are not loged in!');
            return view('/login');
        }
    }


    

    
}