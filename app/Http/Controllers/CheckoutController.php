<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Size;
use App\Models\User;
use App\Models\Product;
use Cart;

class CheckoutController extends Controller
{
    //
    public function checkout(){
        $content = Cart::content();
        if($content->count() >0)
            return view('pages.Checkout');
        else
            return redirect()->back()->with('thongbao','Chưa có sản phẩm nào không thực hiện chức năng thanh toán');
    }
    public function postCheckout(Request $request){
    	
    	$this->validate($request,
            [
                'LastName' => 'required',
                'FirstName' => 'required',
                'Address' =>'required',
                'Phone' => 'required',
            ],
            [
                'LastName.required' => 'Bạn chưa nhập tên' ,
                'FirstName.required' => 'Bạn chưa nhập họ' ,
                'Address.required' => 'Bạn chưa nhập địa chỉ giao hàng' ,
                'Phone.required' => 'Bạn chưa nhập số điện thoại' ,
                
            ]);
        User::where('ID',$request->ID)->update([
        	'LastName' => $request->LastName,
        	'FirstName' => $request->FirstName,
        	'Address' => $request->Address,
        	'Phone' => $request->Phone 
        ]);
        $order = new Order;
        $order->UserID = $request->ID;
        $order->Status = 1;
        $order->save();
        $content = Cart::content();
        foreach ($content as $key => $item) {
        	$orderdetail = new OrderDetail;
        	$orderdetail->OrderID = $order->id;
        	$orderdetail->ProductID = $item->id;
        	$orderdetail->Quantity = $item->qty;
            $product = Product::where('ID',$item->id)->first();
            $stock = $product->Stock - $item->qty;
            Product::where('ID',$item->id)->update(['Stock'=>$stock]);
        	$orderdetail->SizeID = Size::where('Name',$item->options->size)->first()->ID;
        	$orderdetail->save();
        }
        Cart::destroy();
        return redirect('home')->with('thongbao','Thêm thành công');
    }
}
