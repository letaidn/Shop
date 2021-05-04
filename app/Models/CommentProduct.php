<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentProduct extends Model
{
    use HasFactory;
    protected $table = "Comments";

    public function user()
    {
    	return $this->belongsTo(User::class,'UserID','ID');
    }

    public function product()
    {
    	return $this->belongsTo(Product::class,'ProductID','ID');
    }
}
