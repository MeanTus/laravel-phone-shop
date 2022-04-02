<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Detail extends Model
{
    protected $primaryKey="id";
    protected $table="product_detail";
    protected $fillable=['image_detail','product_id'];
    public $timestamps=false;
}
