<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $primaryKey="cat_id";
    protected $table="categories";
    protected $fillable=['cat_name','cat_describe','cat_status'];
    public $timestamps=false;
}
