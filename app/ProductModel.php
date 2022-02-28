<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    public $table = "products";
    protected $fillable = ['title','details','image'];
}
