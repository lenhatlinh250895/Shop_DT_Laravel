<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GroupProduct;
use App\ProductType;
use App\Product;

class PagesController extends Controller
{
	public function __construct()
	{
		$GroupProduct = GroupProduct::all();
    	$ProductType = ProductType::all();
    	$Product = Product::all();
    	view()->share(['GroupProduct' =>$GroupProduct,'ProductType' => $ProductType,'Product'=>$Product]);
	}

    public function Index()
    {
    	return view('frontend.pages.home');
    }

    public function Shop($id)
    {
    	$ProductTypeShop = ProductType::find($id);
    	return view('frontend.pages.shop',['ProductTypeShop' => $ProductTypeShop]);
    }

    public function shopProduct($id)
    {
    	$GroupProductShop = GroupProduct::find($id);
    	$ProductTypeShop = ProductType::find($GroupProductShop->ProductType_Id);
    	$Productnew = Product::where('GroupProduct_Id',$GroupProductShop->Id)->paginate(6);
    	return view('frontend.pages.shopProduct',['Productnew'=>$Productnew,'ProductTypeShop' => $ProductTypeShop,'GroupProductShop'=>$GroupProductShop]);
    }

    public function singleProduct($id)
    {
    	$ProductFind = Product::find($id);
    	$GroupProductFind = GroupProduct::find($ProductFind->GroupProduct_Id);
    	$ProductTypeFind = ProductType::find($GroupProductFind->ProductType_Id);
    	return view('frontend.pages.singleProduct',compact('ProductFind','GroupProductFind','ProductTypeFind'));
    }
}
