<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey="id";
    protected $table="order";
    protected $fillable=['user_id','address','shipping','total','status','created_at','updated_at'];
    public $timestamps=false;
}
