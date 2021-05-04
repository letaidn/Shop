<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    //
    public function getList()
    {
        $order = Order::paginate(10);
        return view('admin.order.list',['order'=>$order]);
    }

    public function getListOrderDetail($id)
    {
        $orderDetail = OrderDetail::where('OrderID',$id)->get();
        return view('admin.order.listDetail',['orderDetail'=>$orderDetail]);
    }
    public function getDelete($id)
    {
    	Order::where('ID',$id)->delete();
        return redirect('admin/Order/list')->with('thongbao','Xoá thành công');
    }
    public function getDeleteByCustomer($id)
    {
        Order::where('ID',$id)->delete();
        return redirect()->back()->with('thongbao','Xoá thành công');
    }
    public function getChangeStatus($id){
        $order = Order::where('ID',$id)->first();
        if($order->Status == 1){
            Order::where('ID',$id)->update(['Status'=>2]);
            return redirect('admin/Order/list')->with('thongbao','thay đổi thành công');
        }
        Order::where('ID',$id)->update(['Status'=> 1]);
        return redirect('admin/Order/list')->with('thongbao','thay đổi thành công');
    }
}
