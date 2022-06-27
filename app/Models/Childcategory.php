<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Childcategory extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','childcategory_name','childcategory_slug','subcategory_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
}
