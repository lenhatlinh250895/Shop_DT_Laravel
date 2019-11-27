<?php

namespace App\shop\ProductTypes\Repositories\Interfaces;

use App\ProductType;

interface ProductTypeRepositoryInterface
{
    public function getAll();

    public function createProductType(array $params) :ProductType;

    //public function getById($id);

}