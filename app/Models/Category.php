<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Product;


class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'description' , 'image'] ;

    public function products(){
       return $this->hasMany(Product::class , 'category_id') ;
    }
}
