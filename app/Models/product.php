<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
   protected $table="products";
   protected $fillable=[
    'product_type','product_name','product_desc','price','picture'
   ];
}
