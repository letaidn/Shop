<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ImageProduct;
use App\Models\Size;
use App\Models\User;
use App\Models\Order;
use App\Models\CommentProduct;

session_start();

class PageController extends Controller
{
    //
    public function Home()
    {
        $product = Product::take(6)->get();
        return view('pages.Home',['product'=>$product]);
    }

    public function login(){
        return view('pages.Login');
    }

    public function Register(){
        return view('pages.Register');
    }

    public function detailPage($id)
    {
        $product = Product::find($id);
        $sizes = Size::all();
        $listRel = Product::where('CategoryID','=', $product->CategoryID)->where('ID' ,'!=',$product->ID )->take(3)->get();
        $comments = CommentProduct::where('ProductID',$id)->orderBy('created_at','desc')->simplePaginate(5);
        return view('pages.Detail',['product'=>$product,'listRel'=>$listRel,'sizes' =>$sizes,'comments' => $comments]);
    }

    public function listPage()
    {
    	$product = Product::paginate(9);
    	$category = Category::all();
        return view('pages.ListProduct',['product'=>$product,'category' => $category]);
    }

    public function listPageByCateID($id){
        $product = Product::where('CategoryID',$id)->paginate(9);
        $category = Category::all();
        return view('pages.ListProduct',['product'=>$product,'category' => $category]);
    }

    public function listPageBySearch(Request $request){
        $product = Product::where('Name','LIKE',"%{$request->search}%")->paginate(9);
        $category = Category::all();
        return view('pages.ListProduct',['product'=>$product,'category' => $category]);
    }

    public function getContact(){
        return view('pages.contact');
    }

    public function updateInfo($id){
        $user = User::select('ID','email','FirstName','LastName','Address','Phone')->where('ID',$id)->first();
        $orders = Order::where('UserID',$id)->where('Status',1)->get();
        return view('pages.updateInfo',['user'=>$user,'orders'=>$orders]);
    }
    
}
