<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = "OrderDetails";

    public function product()
    {
    	return $this->belongsTo(Product::class,'ProductID','ID');
    }

    public function order()
    {
    	return $this->belongsTo(Order::class,'OrderID','ID');
    }
    public function size()
    {
        return $this->belongsTo(Size::class,'SizeID','ID');
    }
}
