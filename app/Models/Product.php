<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "Products";

    public function productImage()
    {
    	return $this->hasMany(ImageProduct::class,'ProductID','ID');
    }
    public function orderDetail()
    {
    	return $this->hasMany(OrderDetail::class,'ProductID','ID');
    }
    public function comment()
    {
    	return $this->hasMany(CommentProduct::class,'ProductID','ID');
    }
    public function category()
    {
    	return $this->belongsTo(Category::class,'CategoryID','ID');
    }
    
    
}
