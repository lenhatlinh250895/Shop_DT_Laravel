<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\GroupProduct;
use Carbon\Carbon;
use App\ProductType;
use Image;
use App\shop\Products\Repositories\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{
    public function getadd()
    {
    	$GroupProduct = GroupProduct::All();
        $ProductType = ProductType::All();
    	return view('admin.Product.AddProduct',['GroupProduct'=>$GroupProduct,'date'=>Carbon::now(),'ProductType'=>$ProductType]);
    }
    public function postadd(Request $Request)
    {
    	$this->validate($Request,
    		[
    			'Name' => 'required|unique:Product,Name|min:3|max:100'
    		]
    		,
    		[
    			'Name.required'=>'Bạn chưa nhập tên',
                'Name.unique' => 'Tên đã có',
    			'Name.min'=>'Tên phải hơn 3 kí tự',
    			'Name.max'=>'tên phải ít hơn 100 kí tự',
    		]);
    	$Product = new Product;
    	$Product->Name = $Request->Name;
    	$Product->Detail = $Request->Detail;
    	$Product->Price = $Request->Price;
    	if($Request->hasFile('Image'))
    	{
    		$file = $Request->file('Image');
    		$tail = $file->GetClientOriginalExtension();
    		if($tail != 'jpg' && $tail != 'png' && $tail != 'jpeg')
    			return redirect('admin/Product/AddProduct')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png và jpeg');
    		$name = $file->GetClientOriginalName();
    		$image = str_random(4)."_".$name;
    		while(file_exists('public/update/Product/'.$image))
    		{
    			$image = str_random(4)."_".$name;
    		}
            $image_resize = Image::make($file->getRealPath())->resize(300,300);
            $image_resize->save(public_path('update/Product/ProductThumbnail/'.$image));
    		$file->move('public/update/Product',$image);
    		$Product->Image = $image;
    	}
    	else
    		$Product->Image = "";
    	$Product->PriceNew = $Request->PriceNew;
    	$Product->Date = $Request->Date;
    	$Product->Order = $Request->Order;
    	$Product->Status = $Request->Status;
    	$Product->GroupProduct_Id = $Request->GroupProduct;
    	$Product->save();

    	return redirect('admin/Product/AddProduct')->with('thongbao','Bạn đã thêm thành công');
    }

    public function getedit($Id)
    {
    	$Product = Product::find($Id);
        $pr = $Product->GroupProduct->ProductType->Id;
        $a = ProductType::find($pr);
    	$GroupProduct = GroupProduct::All();
        $ProductType = ProductType::All();
    	return view('admin.Product.EditProduct',['Product'=>$Product,'GroupProduct'=>$GroupProduct,'ProductType'=>$ProductType,'a'=>$a]);
    }
    public function postedit(Request $Request,$Id)
    {
    	$this->validate($Request,
    		[
    			'Name' => 'required|min:3|max:100'
    		]
    		,
    		[
    			'Name.required' => 'Chưa nhập tên',
    			'Name.min' => 'Phải hơn 3 kí tự',
    			'Name.max' => 'Phải ít hơn 100 kí tự',
    		]);
    	//$Group = GroupProduct::find($Id);
    	//$Group->Name = $Request->NewName;
    	//$Group->Content = $Request->Content;
    	$gp = Product::find($Id);
    	if($Request->hasFile('Image'))
    	{
    		$file = $Request->file('Image');
    		$tail = $file->GetClientOriginalExtension();
    		if($tail != 'jpg' && $tail != 'png' && $tail != 'jpeg')
    			return redirect('admin/Product/AddProduct')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png và jpeg');
    		$name = $file->GetClientOriginalName();
    		$Image = str_random(4)."_".$name;
    		while(file_exists('public/Update/Product/'.$Image))
    		{
    			$Image = str_random(4)."_".$name;
    		}
    		$file->move('public/Update/Product',$Image);
    	}
    	else
        {
    		$Image = $gp->Image;
        }
    	Product::where('Id',$Id)->update(['Name' => $Request->Name,'Detail' => $Request->Detail,'Price' => $Request->Price,'Image' => $Image,'PriceNew' => $Request->PriceNew,'Date' => $Request->Date,'Order' => $Request->Order,'Status' => $Request->Status,'GroupProduct_Id' => $Request->GroupProduct]);
    	return redirect('admin/Product/list')->with('thongbao','Sửa thành công rồi');
    }
    public function getdelete($Id)
    {
    	Product::where('Id',$Id)->delete();
    	return redirect('admin/Product/list')->with('thongbao','Xóa thành công');
	}

	public function __construct(ProductRepositoryInterface $product)
	{
		$this->product = $product;
	}

	public function getAllPosts()
    {
        $product = $this->product->getAll();
		$GroupProduct = GroupProduct::all();
        return view('admin.Product.list',['Product' => $product,'GroupProduct'=>$GroupProduct]);
    }
}
