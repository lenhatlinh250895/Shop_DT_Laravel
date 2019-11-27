<?php

namespace App\shop\ProductTypes\Repositories;

use App\shop\ProductTypes\Repositories\Interfaces\ProductTypeRepositoryInterface;
use App\ProductType;
use Illuminate\Support\Collection;

class ProductTypeRepository implements ProductTypeRepositoryInterface
{

    public function __construct(ProductType $productType)
    {
        $this->ProductType = $productType;
    }

    public function getAll()
    {
        return $this->ProductType::paginate(10);
    }

    public function createProductType(array $params) : ProductType
    {
        
    }

}