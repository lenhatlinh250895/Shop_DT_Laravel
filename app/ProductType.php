<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = "ProductType";
    public $timestamps = false;

    protected $fillable = [
        'Name',
        'Order',
        'Content',
        'image',
        'Status'
    ];

    public function GroupProduct()
    {
    	return $this->hasmany('App\GroupProduct','ProductType_Id','Id');
    }

    public function Product()
    {
    	return $this->hasManyThrough('App\Product','App\GroupProduct','ProductType_Id','GroupProduct_Id','Id');
    }
}
