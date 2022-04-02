<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $primaryKey="brand_id";
    protected $table="brands";
    protected $fillable=['brand_name','brand_describe','brand_status'];
    public $timestamps=false;
}
