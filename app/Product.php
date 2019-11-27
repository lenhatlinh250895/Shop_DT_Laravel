<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "Product";
    public $timestamps = false;

    public function GroupProduct()
    {
    	return $this->belongsto('App\GroupProduct','GroupProduct_Id','Id');
    }

    public function OrderDetail()
    {
    	return $this->hasmany('App\OrderDetail','Product_Id','Id');
    }
}
