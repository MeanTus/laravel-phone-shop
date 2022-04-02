<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wish_List extends Model
{
    protected $primaryKey="id";
    protected $table="wishlist";
    protected $fillable=['username','product_name','product_price','product_image','product_id','create_at'];
    public $timestamps=false;
}
