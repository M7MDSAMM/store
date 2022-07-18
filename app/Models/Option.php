<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model implements Atribute
{
    use HasFactory;
    public function attribute(){
        return $this->belongsTo(Atribute::class, 'atribute_id' , 'id');
    }

    public function products(){
        return $this->belongstoMany(Product::class ,'product_id', 'id');
    }
}
