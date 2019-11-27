<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupProduct extends Model
{
    protected $table = "GroupProduct";
    public $timestamps = false;

    public function Product()
    {
    	return $this->hasmany('App\Product','GroupProduct_Id','Id');
    }
    public function ProductType()
    {
    	return $this->belongsto('App\ProductType','ProductType_Id','Id');
    }
}
