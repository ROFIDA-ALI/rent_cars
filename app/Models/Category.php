<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
   
    protected $fillable = ['categoryName'];
    protected $withCount = ['cars']; 
     public function cars(){
        return $this->hasMany(Car::class, 'category_id','id');
}

}