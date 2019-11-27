<?php

namespace App\shop\Products\Repositories;

use App\shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Product;
use Illuminate\Support\Collection;

class ProductRepository implements ProductRepositoryInterface
{

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getAll()
    {
        return $this->product::paginate(10);
    }

}