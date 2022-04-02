<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    protected $primaryKey="id";
    protected $table="order_detail";
    protected $fillable=['product_id','product_name','product_price','product_qty','order_id','created_at','updated_at'];
    public $timestamps=false;
}
