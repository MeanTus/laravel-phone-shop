<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey="id";
    protected $table="comment";
    protected $fillable=['name','username','email','content','product_id','rating','status','created_at','updated_at'];
    public $timestamps=false;
}
