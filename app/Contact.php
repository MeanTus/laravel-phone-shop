<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $primaryKey="id";
    protected $table="contact";
    protected $fillable=['name','email','title','content','status','created_at','updated_at'];
    public $timestamps=false;
}
