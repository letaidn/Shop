<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    use HasFactory;
    protected $table = "ProductImages";

    public function product()
    {
    	return $this->hasMany(Product::class,'ProductID','ID');
    }
}
