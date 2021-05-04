<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "Orders";

    public function orderDetail()
    {
    	return $this->hasMany(OrderDetail::class,'OrderID','ID');
    }

    public function user()
    {
    	return $this->belongsTo(User::class,'UserID','ID');
    }
}
