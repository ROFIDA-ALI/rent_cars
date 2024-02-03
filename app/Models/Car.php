<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'carTitle' ,'price','shortdescription', 'description','active','luggage','doors','passenger', 'image','category_id'];   //same #name in blade file 
        public function category(){
            return $this->belongsTo(Category::class,  'category_id','id');
            
        }
}
