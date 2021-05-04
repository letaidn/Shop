<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;
use App\Models\ImageProduct;
use Cart;

class CartController extends Controller
{
    //
    public function saveCart(Request $request){
        $productid = $request->productid_hiden;
        $quantity = $request->Quantity;
        $size = Size::where('ID',$request->size)->first();
        $image = ImageProduct::where('ProductID',$productid)->first();
        $product = Product::where('ID',$productid)->first();
        if($product->Stock < $quantity){
            return redirect()->back()->with('thongbaoStock','Sản phẩm không đủ số lượng bạn cần');
        }else{
            $cartline['id'] = $productid;
            $cartline['name'] = $product->Name;
            $cartline['qty'] = $quantity;
            $cartline['weight'] = '0';
            $cartline['price'] = $product->Price *(100 - $product->Discount) / 100;
            $cartline['options']['size'] = $size->Name;
            $cartline['options']['image'] = $image->Name;
            Cart::add($cartline);
            return redirect('cart');
        }
    }

    public function deleteCartLine($rowId)
    {
        Cart::remove($rowId);
        return redirect('cart');
    }
    public function deleteCart()
    {
        Cart::destroy();
        return redirect('cart');
    }

    public function updateCartLine(Request $request)
    {
        $this->validate($request,
            [
                'Quantity' => 'min:1'
            ],
            [
                
            ]);
    	$rowId = $request->rowId;
    	$qty = $request->Quantity;
        if(Product::where('ID',Cart::get($rowId)->id)->first()->Stock < $qty){
            return redirect()->back()->with('thongbaoStock','Sản phẩm không đủ số lượng bạn cần');
        }else{
            Cart::update($rowId,$qty);
        return redirect('cart');
        }
        
    }

    public function showCart()
    {
        return view('pages.Cart');
    }
}

