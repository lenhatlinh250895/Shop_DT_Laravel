<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use Cart;
use App\GroupProduct;
use App\ProductType;
use App\Product;

class CartController extends Controller
{
	public function __construct()
	{
		$GroupProduct = GroupProduct::all();
    	$ProductType = ProductType::all();
    	$Product = Product::all();
    	view()->share(['GroupProduct' =>$GroupProduct,'ProductType' => $ProductType,'Product'=>$Product]);
	}
	public function cart()
    {
    	$Content = Cart::getContent();
    	$total = Cart::getTotal();
    	return view('frontend.pages.cart',compact('Content','total'));
    }
    public function shopping($id)
    {
    	$Product = Product::where('Id',$id)->first();
    	$name = $Product->Name;
    	$price = $Product->Price;
    	$image = $Product->Image;
    	Cart::add(array('id'=>$id,'name'=>$name,'price'=>$price,'quantity'=>1,'attributes'=>array('img'=>$image)));
    	return redirect()->route('cart');
    }

    public function delCart()
    {
        if(Request::ajax())
        {
            $id = Request::get('id');
            Cart::remove($id);
            echo "oke";
        }
    }
    public function updCart()
    {
        if(Request::ajax())
        {
            $id = Request::get('id');
            $qty = Request::get('qty');
            Cart::update($id,array('quantity'=>array('relative'=>false,'value'=>$qty)));
            echo "oke";
        }
    }
}
