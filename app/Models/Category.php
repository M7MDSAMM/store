<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function products(){
        return $this->hasMany(Product::class,'id','category_id');
    }

    public function getIsActiveAttribute(){
        return $this->active == 1 ? 'Active' : 'Not Active';
    }
    protected $fillable = ['title', 'active'];

}
