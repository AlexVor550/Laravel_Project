<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','image','stock_quantity','description','color','category_id','rating'];

    public function category(){
        return $this->belongsTo(Category::class);
}
}
