<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $primaryKey="id";
    protected $table="slider";
    protected $fillable=['image','status'];
    public $timestamps=false;
}
