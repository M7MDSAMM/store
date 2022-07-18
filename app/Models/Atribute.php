<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atribute extends Model
{
    use HasFactory;
    public function options(){
        return $this->hasMany(Option::class, 'atribute_id' , 'id');
    }
    public function getIsActiveAttribute()
    {
        return $this->active == 1 ? 'Active' : 'Not Active';
    }

    protected $fillable = ['name', 'active'];

}
