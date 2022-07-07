<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function getStockAttribute(){
        return $this->in_stock == 1 ? 'True' : 'False';
    }

    protected $fillable = ['title', 'image', 'old_price' , 'new_price' , 'description' , 'skv', 'in_stock','category_id'];



}
