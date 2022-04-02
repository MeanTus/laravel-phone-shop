<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $primaryKey="id";
    protected $table="bill";
    protected $fillable=['created_at','date','name','username','email','total'];
    public $timestamps=false;
}
