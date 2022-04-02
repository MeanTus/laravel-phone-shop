<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey='product_id';
    protected $table = 'products';
    protected $fillable=['product_name','product_qty','gender','type','product_intro','product_describe','product_promotion','product_image','product_status','cat_id','brand_id'];
    public $timestamps=false;
    
}
