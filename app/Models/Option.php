<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    public function attribute(){
        return $this->belongsTo(Atribute::class, 'atribute_id' , 'id');
    }

    protected $fillable = ['name', 'price','atribute_id'];

}
