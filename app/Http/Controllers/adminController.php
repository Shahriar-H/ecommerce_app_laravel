<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\action;
use App\Models\Galleries;
use App\Models\Categories;
use App\Models\Slides;
use Illuminate\Support\Facades\DB;


class adminController extends Controller
{

    function adminlogin(Request $req){
        $email = $req->email;
        $pass = $req->password;
        $match = Admins::where('email',$email)->first();
        if($match){
            $valu = $match->password;
            if($pass==$valu){
                $req->session()->put('admin-log-info',$match);
                return redirect('/logo');
            }else{
                $req->session()->flash('status','Wrong Password');
                return view('/admin_system');
            }
        }else{
            $req->session()->flash('status','Wrong Email');
            return view('/admin_system');
        }
        //return view('card', ['match'=>$match]);

        //return $valu;
    }

    function adminout(Request $req){
        if($req->session()->has('admin-log-info')){
            $req->session()->forget('admin-log-info');
            return redirect('/admin_system');
        }
    }

    function headers(Request $reqis){
        if($reqis->session()->has('admin-log-info')){
            $idd = 1;
            $logos = action::find($idd)['logo'];
            $reqis->session()->put('logolink',$logos);
            return view('logo');
        }else{
            $reqis->session()->flash('status','You are not logged in!');
            return view('/admin_system');
        }
    }
    function logoup(Request $req){
        if($req->session()->has('admin-log-info')){
        if($req->logo != null){
            $idd = 1;
            $data = $req->file('logo')->store('logo');
            $logoup = action::find($idd);
            $logoup->logo = $data;
            $logoup->save();
            //return $data;
            return redirect('/logo');
        }else{
            return redirect('/logo');
        }
    }else{
        $req->session()->flash('status','You are not logged in!');
        return view('/admin_system');
    }
    }
    function copyright(Request $reqis){
        if($reqis->session()->has('admin-log-info')){
            return view('copyright');
        }else{
            $reqis->session()->flash('status','You are not logged in!');
            return view('/admin_system');
        }

    }

    function productlist(Request $reqis){
        if($reqis->session()->has('admin-log-info')){
            $allProduct = Product::paginate(10);
            $allphoto = Galleries::all();
            return view('allproductlist', ['allProduct'=>$allProduct, 'allphoto'=>$allphoto]);
        }else{
            $reqis->session()->flash('status','You are not logged in!');
            return view('/admin_system');
        }
    }
    function allorders(Request $reqis){
        if($reqis->session()->has('admin-log-info')){
            $allProduct = Order::paginate();
            return view('allorders', ['allProduct'=>$allProduct]);
        }
        else{
            $reqis->session()->flash('status','You are not logged in!');
            return view('/admin_system');
        }
    }
    function userlist(Request $reqis){
        if($reqis->session()->has('admin-log-info')){
            $allProduct = User::paginate();
            $alladmin = Admins::all();
            return view('userslist', ['allProduct'=>$allProduct, 'alladmin'=>$alladmin]);
        }else{
            $reqis->session()->flash('status','You are not logged in!');
            return view('/admin_system');
        }
    }
    function deleteUser(Request $reqis ,$du){
        if($reqis->session()->has('admin-log-info')){
            $DeleteUser = User::find($du);
            $DeleteUser->delete();
            return redirect('/userlist');
        }else{
            $reqis->session()->flash('status','You are not logged in!');
            return view('/admin_system');
        }
    }
    function addadmin(Request $req){
        if($req->session()->has('admin-log-info')){
            $addadmin = new Admins;
            $addadmin->name = $req->name;
            $addadmin->email = $req->email;
            $addadmin->mobile = $req->mobile;
            $addadmin->role = $req->role;
            $addadmin->password = $req->password;
            $addadmin->save();
            return redirect('/userlist');
        }else{
            $req->session()->flash('status','You are not logged in!');
            return view('/admin_system');
        }

    }
    function addproduct(Request $req){
        if($req->session()->has('admin-log-info')){
            $category = Categories::all();
            return view('addnewproduct', ['category'=>$category]);
        }
        else{
            $req->session()->flash('status','You are not logged in!');
            return view('/admin_system');
        }
    }
    function loadproduct(Request $req){
        if($req->session()->has('admin-log-info')){
            $product = new Product;
            $product->name=$req->title;
            $product->price=$req->price;
            $product->discount=$req->discount;
            $product->description=$req->description;
            $product->size=$req->size;
            $product->color=$req->color;
            $product->stock=$req->stock;
            $product->status=$req->status;
            $product->category=$req->category;
            $product->gallery='ddckdcmd';
            $product->save();

            return redirect('loadimage');
        }else{
            $req->session()->flash('status','You are not logged in!');
            return view('/admin_system');
        }
    }

    function upimage(Request $req){
        if($req->session()->has('admin-log-info')){
            $maxid  = DB::table('products')->max('id');
            $product = new Galleries;
            $gallery=array();
            $files = $req->file('gallery');
            if($files){
                $i=0;
            foreach($files as $file){
                // $product->product_id=$maxid;
                // $product->save();
                $file->store('gallery');
                $name = $file->store('gallery');
                $gallery[]=$name;
                $product::insert(['photos'=>$name, 'product_id'=>$maxid]);
                // $product->product_id=$maxid;
                // $product->photos=$name;
                // $product->save();
                // $i++;
                // echo $i. $name.'<br>';
            }
        }
    
        //$inputData = $req->input();
        return redirect('/allproductlist');
    }else{
        $req->session()->flash('status','You are not logged in!');
        return view('/admin_system');
    }
    }

    function editproduct(Request $reqis,$id){
        if($reqis->session()->has('admin-log-info')){
            $product = Product::find($id);
            $category = Categories::all();
            return view('editproduct', ['product'=>$product, 'category'=>$category]);
        }else{
            $reqis->session()->flash('status','You are not logged in!');
            return view('/admin_system');
        }
    }
    function updateproduct(Request $req, $id){
        if($req->session()->has('admin-log-info')){
            $allimage = Galleries::where('product_id',$id)->get();
            $product = Product::find($id);
            $product->name=$req->title;
            $product->price=$req->price;
            $product->discount=$req->discount;
            $product->description=$req->description;
            $product->size=$req->size;
            $product->color=$req->color;
            $product->stock=$req->stock;
            $product->status=$req->status;
            $product->category=$req->category;
            $product->gallery='ddckdcmd';
            $product->save();
            return view('editgallery',['idis'=>$id, 'allphoto'=>$allimage]);
        }else{
            $req->session()->flash('status','You are not logged in!');
            return view('/admin_system');
        }
        //return $allimage;
    }
    function updateimage($id, Request $req){
        if($req->session()->has('admin-log-info')){
        $editImage = new Galleries;
        $egallery=array();
        $files=$req->file('egallery');
        if($files){
            foreach($files as $file){
                $file->store('egallery');
                $name = $file->store('egallery');
                $egallery[]=$name;
                $editImage::insert(['photos'=>$name, 'product_id'=>$id]);
                // $editImage->photos=$name;
                // $editImage->product_id=$id;
                // $editImage->save();
            }
        }
        return redirect('/allproductlist');
    }else{
        $req->session()->flash('status','You are not logged in!');
        return view('/admin_system');
    }
    }

    function deletemultiple($id, Request $reqis){
        if($reqis->session()->has('admin-log-info')){
        $allimage = Galleries::where('product_id',$id)->get();
        return view('allproductphoto',['allphoto'=>$allimage]);
        }else{
            $reqis->session()->flash('status','You are not logged in!');
            return view('/admin_system');
        }
    }
    function deletephoto($id, Request $reqis){
        if($reqis->session()->has('admin-log-info')){
        $photo = Galleries::find($id);
        $photo->delete();
        return back();
        }else{
            $reqis->session()->flash('status','You are not logged in!');
            return view('/admin_system');
        }
    }

    function addcategory(Request $req){
        if($req->session()->has('admin-log-info')){
        $cat = new Categories;
        $cat->category=$req->category;
        $cat->save();
        return back();
        }else{
            $req->session()->flash('status','You are not logged in!');
            return view('/admin_system');
        }
    }
    function category(Request $reqis){
        if($reqis->session()->has('admin-log-info')){
            $cate = Categories::all();
            return view('category',['category'=>$cate]);
        }else{
            $reqis->session()->flash('status','You are not logged in!');
            return view('/admin_system');
        }
    }
    function slider(Request $reqis){
        if($reqis->session()->has('admin-log-info')){
            $slideImage = Slides::all();
            return view('slider',['slide'=>$slideImage]);
        }else{
            $reqis->session()->flash('status','You are not logged in!');
            return view('/admin_system');
        }
    }
    function slidesave(Request $req){
        if($req->session()->has('admin-log-info')){
            $slide = new Slides;
            $gallery=array();
            $files = $req->file('gallery');
        if($files){
            foreach($files as $file){
                $file->store('slider');
                $slideImage = $file->store('slider');
                $gallery[]=$slideImage;
                $slide::insert(['slide'=>$slideImage]);
            }
        }
        return back();
    }else{
        $req->session()->flash('status','You are not logged in!');
        return view('/admin_system');
    }
    }


    function deleteproduct($id){
        $product = Product::find($id);
        $product->delete();
        return redirect('/allproductlist');
    }

    function deleteslide($id){
        $product = Slides::find($id);
        $product->delete();
        return redirect('/slider');
    }




}

