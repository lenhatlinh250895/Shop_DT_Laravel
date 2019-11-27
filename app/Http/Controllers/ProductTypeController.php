<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;
use App\shop\ProductTypes\Repositories\Interfaces\ProductTypeRepositoryInterface;

class ProductTypeController extends Controller
{

	public function __construct(ProductTypeRepositoryInterface $productType)
	{
		$this->ProductType = $productType;
	}

    public function getlist()
    {
    	$productType = $this->ProductType->getAll();
    	return view('admin.ProductType.list',['ProductType'=>$productType]);
    }

    public function getadd()
    {
    	return view('admin.ProductType.AddProductType');
    }

    public function postadd(Request $Request)
    {
    	$this->validate($Request,
    		[
    			'Name' => 'required|unique:ProductType,Name|min:3|max:100'
    		]
    		,
    		[
    			'Name.required'=>'Bạn chưa nhập tên',
    			'NewName.unique' => 'Tên đã có',
    			'Name.min'=>'Tên phải hơn 3 kí tự',
    			'Name.max'=>'tên phải ít hơn 100 kí tự',
    		]);
    	$ProductType = new ProductType;
    	$ProductType->Name = $Request->Name;
    	$ProductType->Content = $Request->Content;
    	if($Request->hasFile('Image'))
    	{
    		$file = $Request->file('Image');
    		$tail = $file->GetClientOriginalExtension();
    		if($tail != 'jpg' && $tail != 'png' && $tail != 'jpeg')
    			return redirect('admin/ProductType/AddProductType')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png và jpeg');
    		$name = $file->GetClientOriginalName();
    		$hinh = str_random(4)."_".$name;
    		while(file_exists('public/Update/ProductType/'.$hinh))
    		{
    			$hinh = str_random(4)."_".$name;
    		}
    		$file->move('public/update/ProductType',$hinh);
    		$ProductType->Image = $hinh;
    	}
    	else
    	{
    		$ProductType->Image = "";
    	}
    	$ProductType->Order = $Request->Order;
    	$ProductType->Status = $Request->Status;
    	$ProductType->save();

    	return redirect('admin/ProductType/AddProductType')->with('thongbao','Thêm thành công');
    }

    public function getedit($Id)
    {
    	$ProductType = ProductType::find($Id);
    	return view('admin.ProductType.EditProductType',['ProductType'=>$ProductType]);
    }
    public function postedit(Request $Request,$Id)
    {
    	$this->validate($Request,
    		[
    			'NewName' => 'required|min:3|max:100'
    		]
    		,
    		[
    			'NewName.required' => 'Chưa nhập tên',
    			'NewName.min' => 'Phải hơn 3 kí tự',
    			'NewName.max' => 'Phải ít hơn 100 kí tự',
    		]);
    	$pt = ProductType::find($Id);
    	if($Request->hasFile('Image'))
    	{
    		$file = $Request->file('Image');
    		$tail = $file->GetClientOriginalExtension();
    		if($tail != 'jpg' && $tail != 'png' && $tail != 'jpeg')
    			return redirect('admin/ProductType/AddProductType')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png và jpeg');
    		$name = $file->GetClientOriginalName();
    		$Image = str_random(4)."_".$name;
    		while(file_exists('public/Update/ProductType/'.$Image))
    		{
    			$Image = str_random(4)."_".$name;
    		}
    		$file->move('public/Update/ProductType',$Image);
    	}
    	else
    		$Image = $pt->Image;
    	ProductType::where('Id',$Id)->update(['Name' => $Request->NewName,'Content' => $Request->Content,'Image'=>$Image,'Order'=>$Request->Order,'Status'=>$Request->Status]);
    	return redirect('admin/ProductType/EditProductType/'.$Id)->with('thongbao','Sửa thành công rồi');
    }

    public function getdelete($Id)
    {
    	$ProductType = ProductType::where('Id',$Id)->delete();
    	//$GroupProduct = GroupProduct::findOrFail($Id);
    	//$GroupProduct->delete();
    	return redirect('admin/ProductType/list')->with('thongbao','Bạn đã xóa');
    }
}
